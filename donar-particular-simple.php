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


