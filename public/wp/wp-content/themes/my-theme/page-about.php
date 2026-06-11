<?php
/*
Template Name: about-category
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="category-title section-wrapper">
	<div class="section-frame">

		<h1 class="title" data-js="title1"><?php the_title(); ?></h1>
		<div class="sub-title" data-js="title2"><?php the_subtitle(); ?></div>

	</div><!-- .section-frame -->
</header><!-- .category-title -->

<section class="local-navigation section-wrapper bgnone">
	<div class="section-frame large">

	<ul class="menue flex">

<?php echo my_local_navigation('local_about', 1);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
