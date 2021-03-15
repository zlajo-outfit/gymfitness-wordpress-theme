<?php get_header(); ?>
<!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<main class="container page section with-sidebar">
<div class="page-content">
    <?php get_template_part('template-parts/page', 'loop'); ?>
</div><!--page-content-->
<?php get_sidebar(); ?><!--ovako pozivamo sidebar wp ocekuje sidebar.php-->
</main><!--main-->

<?php get_footer(); ?>
