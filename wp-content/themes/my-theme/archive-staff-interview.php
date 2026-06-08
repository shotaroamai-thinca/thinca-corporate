<?php get_header(); ?>

<div id="content">

<header id="page-header" class="section-wrapper">
	<div class="section-frame">
		<div class="sub-title">INTERVIEW</div>
		<h1 class="page-title">社員インタビュー</h1>
	</div><!-- .section-frame -->
</header><!-- #page-header -->

<header id="entry-header" class="section-wrapper">
	<div class="section-frame small">
		<h1 class="entry-title"><?php the_archive_title(); ?></h1>
	</div><!-- .section-frame -->
</header><!-- #entry-header -->

<?php if ( have_posts() ) { ?>

<section id="case-l" class="section-wrapper section-margin">
	<div class="section-frame large"><div class="flex center">

<?php while ( have_posts() ) {
the_post(); ?>

<?php get_template_part( 'template-parts/navigation/unit--column-list' ); ?>

<?php } ?>

	</div><!-- .flex --></div><!-- .section-frame -->
</section><!-- #case-l -->

<?php my_the_posts_pagination(); ?>

<?php } ?>

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

</div><!-- #content -->
<?php get_footer(); ?>
