<?php
/*
Template Name: about/officers
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">企業情報</div>
		<h1 class="title"><?php the_title(); ?></h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<section class="officers sm">
	<div class="section-wrapper"><div class="section-frame">

<?php if( have_rows('about_officers') ):
	$count = 1;
	while( have_rows('about_officers') ): the_row(); ?>

		<div class="unit grid mb">
			<div class="img-area">
				<div class="photo"><img src="<?php echo get_sub_field('img'); ?>" alt=""></div>
			</div><!-- .img-area -->
			<div class="head-area">
				<div class="job"><?php echo get_sub_field('job'); ?></div>
				<h3 class="name"><?php echo get_sub_field('name'); ?></h3>
			</div><!-- .head-area -->
			<div class="text-area">
				<p class="text"><?php echo get_sub_field('text'); ?></p>
			</div><!-- .text-area -->
		</div><!-- .unit -->

	<?php $count++;
	endwhile;
endif; ?>

	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .officers -->

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の企業情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_about', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->


<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
