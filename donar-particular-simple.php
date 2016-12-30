<?php /* Template Name: Donar Particulares Simplificada */ ?>
<?php get_header('simple') ?>
    <div class="container">
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <div class="article-wrapper">
                <h1 class="section-title">
                    <?php the_title(); ?>
                </h1>
                <div class="post-content clearfix">
                    <?php the_content(); ?>
                    <form id="donateForm">
                        <div class="step step-1">
                            <fieldset class="oculto">
                                <div class="form-group">
                                    <input type="hidden" name="donoFormType" value="IndividualDonor">
                                    <input type="hidden" name="drLeadType" value="Personas">
                                </div>
                            </fieldset>

                            <fieldset id="aportacionPeriodo" style="display: none;">
                                <div class="form-group">
                                    <div id="paymentFrequencyDiv" class="frecuencia radio"></div>
                                </div>
                            </fieldset>

                            <h3><span>¿Cuánto quieres donar? *</span></h3>
                            <fieldset id="aportacion">
                                <div class="form-group">
                                    <div class="cantidad radio">
                                        <label for="drAmount1"><input type="radio" id="drAmount1" checked="true" name="drAmount" value="30" onclick="jQuery('#otherAmountSpan').hide();" required> 30€</label>
                                        <label for="drAmount2"><input type="radio" id="drAmount2" name="drAmount" value="60" onclick="jQuery('#otherAmountSpan').hide();" required> 60€</label>
                                        <label for="drAmount3"><input type="radio" id="drAmount3" name="drAmount" value="120" onclick="jQuery('#otherAmountSpan').hide();" required> 120€</label>
                                        <label for="drAmount4" class="other"><input type="radio" id="drAmount4" name="drAmount" value="50" onclick="jQuery('#otherAmountSpan').show();" required> Otra</label>
                                        <label id="otherAmountSpan" for="txtAmount"><input type="number" min="1" step="1" id="txtAmount" name="txtAmount" value="" maxlength="10" placeholder="Cantidad" required>€</label>
                                    </div>
                                </div>
                            </fieldset>
                            <p><a href="#" class="btn btn-next btn-primary">Siguiente</a></p>
                        </div>
                        <div class="step step-2">
                            <h3><span>Datos personales</span></h3>
                            <fieldset id="datos-personales">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="txtName" class="obligatorio">Nombre *<input id="txtName" name="txtName" type="text" value="" maxlength="200"  title="" required></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="txtSurname" class="obligatorio">Primer apellido *<input id="txtSurname" name="txtSurname" type="text" value="" maxlength="200"  title="" required></label>
                                        </div>
                                        <div class="col-sm-3" style="display: none;">
                                            <label  for="txtSurname1" class="obligatorio">Segundo apellido <input id="txtSurname1" name="txtSurname1" type="text" value="Segundo apellido" maxlength="200" ></label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="txtNIF" class="obligatorio">DNI/NIE/Pasaporte *<input id="txtNIF" name="txtNIF" type="text" value="" maxlength="15"  title="" placeholder="Formato: 12345678Z" required></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="txtPhoneNumber" class="obligatorio">Teléfono *<input id="txtPhoneNumber" name="txtPhoneNumber" type="text" value="" maxlength="20" title="" required></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="txtEmail" class="obligatorio">Email *<input id="txtEmail" name="txtEmail" type="email" value="" maxlength="200"  title="" required></label>
                                        </div>
                                        <div class="col-sm-5" style="display: none;">
                                            <div class="form-select">
                                            <select id="drOrganization" name="drOrganization" title="">
                                                <option value="77"></option>
                                            </select></div></label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h3><span>Datos de contacto</span></h3>

                            <fieldset id="datos-contacto">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="drCountry" class="obligatorio label-select">País *
                                                <div class="form-select">
                                                <select id="drCountry" name="drCountry" title="" required>
                                                    <option value=""></option>
                                                </select>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2" style="display: none;">
                                        <label for="drStreetTypeId" class="obligatorio spaniardField label-select">Tipo de vía <div class="form-select"><select id="drStreetTypeId" name="drStreetTypeId"><option value=""></option></select></div></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="txtAddressLineOne" class="obligatorio">Dirección 1 *<input id="txtAddressLineOne" name="txtAddressLineOne" type="text" value="" maxlength="50" required="true"></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="txtPostalCode" class="obligatorio">Código postal *<input id="txtPostalCode" name="txtPostalCode" type="text" value="" maxlength="15"  title="" required></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2" style="display: none;">
                                        <label for="txtStreetNumber" class="obligatorio spaniardField">Número <input id="txtStreetNumber" name="txtStreetNumber" type="text" value="" maxlength="50" ></label>
                                    </div>
                                    <div class="col-sm-2" style="display: none;">
                                        <label for="txtFloor" class="obligatorio spaniardField">Piso <input id="txtFloor" name="txtFloor" type="text" value="" maxlength="50" ></label>
                                    </div>
                                    <div class="col-sm-2" style="display: none;">
                                        <label for="txtDoor" class="obligatorio spaniardField">Puerta <input id="txtDoor" name="txtDoor" type="text" value="" maxlength="50" ></label>
                                    </div>

                                    <div class="col-sm-3" style="display: none;"
                                        <label for="drProvincia" class="obligatorio spaniardField label-select">Provincia <div class="form-select"><select id="drProvincia" name="drProvincia"><option value=""></option></select></div></label>
                                    </div>
                                </div>
                                <div class="row" style="display: none;">
                                    <div class="col-sm-6">
                                        <label for="drMunicipalityId" class="obligatorio spaniardField label-select">Municipio <div class="form-select"><select id="drMunicipalityId" name="drMunicipalityId"><option value=""></option></select></div></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="drCityId" class="obligatorio spaniardField label-select">Ciudad <div class="form-select"><select id="drCityId" name="drCityId"><option value=""></option></select></div></label>
                                    </div>
                                </div>
                                <div class="row" style="display: none;">
                                    <div class="col-sm-6">
                                        <label for="txtOtherProvince" class="obligatorio nonSpaniardField">Provincia <input id="txtOtherProvince" name="txtOtherProvince" type="text" value="" maxlength="50" ></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="txtOtherCity" class="obligatorio nonSpaniardField">Ciudad<input id="txtOtherCity" name="txtOtherCity" type="text" value="" maxlength="50" ></label>
                                    </div>
                                </div>
                            </fieldset>
                            <h3><span>Datos bancarios</span></h3>
                            <fieldset id="opcion-pago">
                                <label for="drMethod2"><input type="radio" id="drMethod2" name="drMethod" checked value="1044"  onclick="jQuery('#bankDetailsSpan').show();"> Domiciliación bancaria (IBAN + Entidad + Oficina + DC + Cuenta)</label>
                            </fieldset>
                            <div id="bankDetailsSpan" >
                                <fieldset id="datos-bancarios">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label for="ibanExt">IBAN <span><input id="iban" name="iban" type="text" value="ES" readonly="readonly" maxlength="2" > <input id="ibanExt" name="ibanExt" type="text" maxlength="2" ></span></label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="bankCode">Entidad <input id="bankCode" name="bankCode" type="text" maxlength="4" ></label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="branchCode">Oficina <input id="branchCode" name="branchCode" type="text" maxlength="4" ></label>
                                        </div>
                                        <div class="col-sm-1">
                                            <label for="controlDigits">DC <input id="controlDigits" name="controlDigits" type="text" maxlength="2" ></label>
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="accountNumber">Cuenta <input id="accountNumber" name="accountNumber" type="text" maxlength="10" ></label>
                                        </div>
                                    </div>
                                    <p id="ibanLink" title="El código IBAN (Internacional Bank Account Number) sirve para identificar a nivel internacional una cuenta bancaria. Tiene 4 caracteres: código del país (2 dígitos) + código de control (2 dígitos). Ejemplo: ES21 (código de país 'ES' para España) + código de control ('21')">¿Qué es el código IBAN?</p>
                                </fieldset>
                            </div>
                            <fieldset id="legal">
                                <input type="checkbox" id="chkTermsAndCondition" name="chkTermsAndCondition" title="" required>
                                <label for="chkTermsAndCondition" class="inline"> He leído y acepto <a target="_blank" title="Leer las Condiciones de privacidad y pagos" href="http://porcausa.org/aviso-legal/">las condiciones de pago, política de devoluciones y de privacidad relativas a la protección de datos personales</a> *</label>
                            </fieldset>
                            <fieldset>
                                <button type="button" id="btnDonationSubmit" class="btn btn-primary">¡Quiero donar ya!</button>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
    </div>
    <style type="text/css">
        #paymentFrequencyDiv label {
            display: none !important;
        }
        #paymentFrequencyDiv label:first-of-type {
            display: block !important;
        }
    </style>
<?php get_footer('simple') ?>

