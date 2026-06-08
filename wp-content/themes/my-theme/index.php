<?php get_header(); ?>

<div id="content">

<header class="page-title sw">
	<div class="sf">

		<div class="sub-title">COLUMN</div>
		<h1 class="title">コラム</h1>

	</div><!-- .sf -->
</header><!-- .page-title -->

<?php if ( have_posts() ) { ?>

<section id="column-list" class="sw mb">
	<div class="section-frame large"><div class="flex center">

<?php while ( have_posts() ) {
the_post(); ?>

<?php get_template_part( 'template-parts/navigation/unit/column-list' ); ?>

<?php } ?>

	</div><!-- .flex --></div><!-- .section-frame -->
</section><!-- #column-list -->

<?php my_the_posts_pagination(); ?>

<?php } ?>

<?php get_template_part( 'widgets' ); ?>

</div><!-- #content -->
<?php get_footer(); ?>
