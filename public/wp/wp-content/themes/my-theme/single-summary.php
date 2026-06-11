<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">IR / IRライブラリー</div>
		<h1 class="title">決算短信</h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<?php 
$slug = 'summary';
get_template_part( 'template-parts/contents/library-single' );
?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
