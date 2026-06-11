<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title"><?php the_subtitle(); ?></div>
		<h1 class="title"><?php the_title(); ?></h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<section class="entry-content sw">
	<div class="section-frame small">

<?php the_content(); ?>

	</div><!-- .section-frame -->
</section><!-- .entry-content -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
