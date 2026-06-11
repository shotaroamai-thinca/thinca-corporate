<?php
/*
Template Name: IR/Video
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">IR Videos</div>
		<h1 class="title"><?php the_title(); ?></h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->


<section class="section-wrapper bgnone">
	<div class="section-frame large">

	<ul class="video-list flex">

	<?php if( have_rows('ir_video_list') ): ?>
	<?php while( have_rows('ir_video_list') ): the_row(); ?>
		<li class="video-item">
				<div class="video">
				<?php echo get_sub_field('video'); ?>
				</div>
				<div class="title"><?php echo get_sub_field('title'); ?></div>
		</li>
	<?php endwhile; ?>
	<?php endif; ?>

	</ul><!-- .video-list --></div><!-- .section-frame -->

	</div><!-- .section-frame -->
</section><!-- .section-wrapper -->


<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の投資家情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_ir', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
