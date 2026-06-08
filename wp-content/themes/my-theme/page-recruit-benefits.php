<?php
/*
Template Name: recruit/benefits
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">採用情報</div>
		<h1 class="title"><?php the_title(); ?></h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<?php if( have_rows('benefits_list') ): ?>
<?php while( have_rows('benefits_list') ): the_row(); ?>

<section class="benefits-list sm">
	<h2 class="section-heading">
		<span class="main"><?php echo get_sub_field('item_list_title'); ?></span>
		<span class="sub"><?php echo get_sub_field('item_list_sub_title'); ?></span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="section-frame large"><div class="flex">

<?php if( have_rows('item_list') ): ?>
<?php while( have_rows('item_list') ): the_row(); ?>

		<div class="unit fadein">
			<div class="fadein">
			<div class="img"><img src="<?php echo get_sub_field('img'); ?>" alt=""></div>
				<h3 class="head"><?php echo get_sub_field('head'); ?></h3>
			</div><!-- .text-column -->
			<p class="text fadein"><?php echo get_sub_field('text'); ?></p>
		</div><!-- .unit -->

<?php endwhile; ?>
<?php endif; ?>

	</div><!-- .flex --></div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .benefits-list -->

<?php endwhile; ?>
<?php endif; ?>

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の採用情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_recruit', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
