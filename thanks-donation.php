<?php
/*
Template Name: Thank donation
*/
?>
<?php
//$frBaseUrl = "http://qa.livesupport-fundraising.arivanza.com/";
$frBaseUrl = "https://fundraising.arivanza.com/";
$merchantid = "porcausa";
$secret = "7s12mV3mRe";
$frSalt = "FrArIvAnZa";
$account = "internet";

function startElement($parser, $name, $attrs)
{
    global $parentElements;
    global $currentElement;
    global $currentTSSCheck;

    array_push($parentElements, $name);
    $currentElement = join("_", $parentElements);

    foreach ($attrs as $attr => $value) {
        if ($currentElement == "RESPONSE_TSS_CHECK" and $attr == "ID") {
            $currentTSSCheck = $value;
        }

        $attributeName = $currentElement . "_" . $attr;
        // print out the attributes..
        //print "$attributeName\n";

        global $$attributeName;
        $$attributeName = $value;
    }
}

/* The "cDataHandler()" function is called when the parser encounters any text that's
   not an element. Simply places the text found in the variable that
   was last created. So using the XML example above the text "Owen"
   would be placed in the variable $RESPONSE_SOMETHING
*/

function cDataHandler($parser, $cdata)
{
    global $currentElement;
    global $currentTSSCheck;
    global $TSSChecks;

    if (trim($cdata)) {
        if ($currentTSSCheck != 0) {
            $TSSChecks["$currentTSSCheck"] = $cdata;
        }

        global $$currentElement;
        $$currentElement .= $cdata;
    }

}

// The "endElement()" function is called when the closing tag of an element is found.
// Just remove that element from the array of parent elements.
function endElement($parser, $name)
{
    global $parentElements;
    global $currentTSSCheck;

    $currentTSSCheck = 0;
    array_pop($parentElements);
}

if (isset($_POST['ORDER_ID'])) {
    // this is a post card payment method
    ?>
    <div id="container" style="color: #df4078; font-family: 'RobotoSlab-Rg';width: 880px; max-width: 100%;">
    <?php
    $timestamp = $_POST['TIMESTAMP'];
    $result = $_POST['RESULT'];
    $orderid = $_POST['ORDER_ID'];
    $message = $_POST['MESSAGE'];
    $authcode = $_POST['AUTHCODE'];
    $pasref = $_POST['PASREF'];
    $realexmd5 = $_POST['MD5HASH'];

    //check the validity of response
    $tmp = "$timestamp.$merchantid.$orderid.$result.$message.$pasref.$authcode";
    $md5hash = md5($tmp);
    $tmp = "$md5hash.$secret";
    $md5hash = md5($tmp);
    $frhash = sha1("$md5hash" . "{" . $frSalt . "}");

    //Check to see if hashes match or not
    if ($md5hash != $realexmd5) {
        //send mail about the failure
        //TODO configure client email here
        mail("porcausa@porcausa.org", "Porcausa: payment response failure", "CartID: $orderid, Posted params: ".http_build_query($_POST));
        ?>
        <!-- client can change : start -->
        <img src="http://porcausa.org/wp-content/uploads/2015/11/Gracias-porCausa.jpg"/>
        <br/>
        Respuesta sin autenticar.
        Por favor, ponte en contacto con nosotros en <a
            href="mailto:apoya@porcausa.org"><b><u>apoya@porcausa.org</u></b></a>
        <br/><br/>
        Para continuar el proceso, por favor <a href="http://porcausa.org"><b><u>haz clic aquí</u></b></a>
        <br/><br/>
        <!-- client can change : end -->
    <?php
    } else {
        if ($result == "00") {
            //check if this is auth for recurring payment
            if (isset($_POST['SCHEDULE'])) {

                // call the scheduler
                $URL = "https://remote.globaliris.com/realauth";

                $parentElements = array();
                $TSSChecks = array();
                $currentElement = 0;
                $currentTSSCheck = "";


                // In this example the values are hardcoded in, but in reality these values should be taken from a script or a database
                $amount = $_POST["AMOUNT"];
                $currency = isset($_POST["CURRENCY"]) ? $_POST["CURRENCY"] : "EUR";


                //Replace these with the values you receive from Global Iris support.(If we have not already contacted you with these details please call us)
                $scheduleref = "schedule_" . $_POST["ORDER_ID"];
                $payerref = "payer_" . $_POST["ORDER_ID"];
                $paymentmethod = "card_" . $_POST["ORDER_ID"];
                $schedule = $_POST["SCHEDULE"];


                // The Timestamp is created here and used in the digital signature
                $timestamp = strftime("%Y%m%d%H%M%S");
                mt_srand((double)microtime() * 1000000);

                // This section of code creates the sha1hash that is needed
                $tmp = "$timestamp.$merchantid.$scheduleref.$amount.$currency.$payerref.$schedule";
                $sha1 = sha1($tmp);
                $tmp = "$sha1.$secret";
                $sha1hash = sha1($tmp);


                // Create and initialise XML parser
                $xml_parser = xml_parser_create();
                xml_set_element_handler($xml_parser, "startElement", "endElement");
                xml_set_character_data_handler($xml_parser, "cDataHandler");


                //variables needed to generate the request xml that is send to Global Iris.
                $xml = "<request type='schedule-new' timestamp='$timestamp'>
                            <merchantid>$merchantid</merchantid>
                            <scheduleref>$scheduleref</scheduleref>
                            <account>$account</account>
                            <orderidstub>Porcausa</orderidstub>
                            <payerref>$payerref</payerref>
                            <paymentmethod>$paymentmethod</paymentmethod>
                            <transtype>auth</transtype>
                            <amount currency='$currency'>$amount</amount>
                            <schedule>$schedule</schedule>
                            <numtimes>-1</numtimes>
                            <autosettle flag='1'/>
                            <sha1hash>$sha1hash</sha1hash>
                        </request>";

                // Send the request array to Global Iris
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $URL);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_USERAGENT, "Porcausa donation");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                $response = curl_exec($ch);
                curl_close($ch);

                // Tidy it up
                $response = preg_replace("/\s+/", " ", $response);
                $response = preg_replace("[\n\r]", "", $response);


                // Parse the response xml
                if (!xml_parse($xml_parser, $response)) {
                    die(sprintf("XML error: %s at line %d",
                        xml_error_string(xml_get_error_code($xml_parser)),
                        xml_get_current_line_number($xml_parser)));
                }

                // garbage collect the parser.
                xml_parser_free($xml_parser);

                //check the scheduler result
                if ($RESPONSE_RESULT != "00") {
                    //send mail about the failure
                    //TODO configure client email here
                    mail("porcausa@porcausa.org", "Porcausa: payment scheduler failure", "CartID: $orderid, Message: $RESPONSE_MESSAGE");
                }
            }
            ?>
            <?php if( have_posts() ) : the_post(); ?>
                <br/><br/>
                <?php the_content(); ?>
            <?php else: ?>
                <!-- client can change : will be displayed if no posts present -->
                <img src="http://porcausa.org/wp-content/uploads/2015/11/Gracias-porCausa.jpg"/>
                <br/>
                <h3><span>Muchas gracias por tu donación.</span></h3>
                <!-- client can change : end -->
            <?php endif; ?>

            <!-- client can change : start -->
            <br/><br/>
            Para continuar con el proceso, por favor <a href="http://porcausa.org"><b><u>haz clic aquí</u></b></a>
            <br/><br/>
            <!-- client can change : end -->
        <?php
        } else {
            ?>
            <!-- client can change : start -->
            <img src="http://porcausa.org/wp-content/uploads/2015/11/Gracias-porCausa.jpg"/>
            <br/>
            Sucedió un error durante el proceso de donación.
            <br/>
            Bank responded:
            <br/>
            <?php echo $message; ?>
            <br/>
            Por favor, ponte en contacto con nosotros en
            <a href="mailto:apoya@porcausa.org"><b><u>apoya@porcausa.org</u></b></a>
            <br/><br/>
            Para continuar con el proceso, por favor <a href="http://porcausa.org"><b><u>haz clic aquí</u></b></a>
            <br/><br/>

            <!-- client can change : end -->
        <?php
        }
        //post back the payment status for the backend application
        $curlLink = $frBaseUrl . "fundraising/web-donation/confirmPayment?tenantId=1";
        // store to values to CGI using curl
        $curl = curl_init();
        $queryString = http_build_query($_POST);
        $queryString = $queryString . "&FRHASH=" . $frhash;
        curl_setopt_array($curl, array(
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $curlLink,
            CURLOPT_USERAGENT => 'Payment Gateway response',
            curl_setopt($curl, CURLOPT_POSTFIELDS, $queryString)
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // required for https urls
//        var_dump($queryString);
//        var_dump($curlLink);
        $resp = curl_exec($curl);
        curl_close($curl);

        //failsafe : send mail about the transaction
        mail("porcausa@porcausa.org", "Porcausa: post payment", "CartID: $orderid, Message: $resp");

//        echo "Postback response : \n";
//        var_dump($resp);
    ?>
        </div>
    <?php
    }
} else if ($_GET['donorId']) {
    //failsafe : send mail about the transaction
    mail("porcausa@porcausa.org", "Porcausa: post donation", "DonorID: ".$_GET['donorId']);

    ?>
    <?php get_header(); ?>
    <!--  Bank payment; say direct thanks  -->

    <?php if( have_posts() ) : the_post(); ?>
        <br/><br/>
        <?php the_content(); ?>
    <?php else: ?>
        <!-- client can change -->
        <h3><span>Muchas gracias por tu donación.</span></h3>
        <br/><br/>
        <!-- client can change : end -->
    <?php endif; ?>

    <?php get_footer(); ?>
<?php
} else {?>
    <?php get_header(); ?>
    <!--  Bank payment; say direct thanks  -->
    <div class="container">
        <?php if( have_posts() ) : the_post(); ?>
            <br/><br/>
            <?php the_content(); ?>
        <?php else: ?>
            <!-- client can change -->
            <h3><span>Muchas gracias por tu donación.</span></h3>
            <br/><br/>
            <!-- client can change : end -->
        <?php endif; ?>
    </div>

    <?php get_footer(); ?>
<?php
}
?>
