<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header id="page-header" class="section-wrapper">
	<div class="section-frame">
		<div class="sub-title">INTERVIEW</div>
		<h1 class="page-title">社員インタビュー</h1>
	</div><!-- .section-frame -->
</header><!-- #page-header -->

<header id="entry-thumbnail">
		<div class="photo">

<?php the_post_thumbnail( 'full' ); ?>

		</div><!-- .photo -->
</header><!-- #entry-thumbnail -->

<header id="entry-header" class="section-wrapper">
	<div class="section-frame small">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</div><!-- .section-frame -->
</header><!-- #entry-header -->

<div class="entry-content">
	<div class="section-frame small">

<?php the_content(); ?>

	</div><!-- .section-frame -->
</div><!-- .entry-content -->

<?php get_template_part( 'template-parts/navigation/navigation--post' ); ?>

<?php
if ( has_nav_menu( 'local_recruit' )){
	$args = array(
		'theme_location' => 'local_recruit',
		'container'      => false,
		'items_wrap'     =>'<ul class="menue">%3$s</ul><!-- .menue -->',
	);
	wp_nav_menu( $args ); 
};
?>

<?php get_template_part( 'widgets' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
