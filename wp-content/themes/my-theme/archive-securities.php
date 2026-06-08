<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) { ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">IR / IRライブラリー</div>
		<h1 class="title">有価証券報告書</h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<?php 
$slug = 'securities';
get_template_part( 'template-parts/contents/library-archive' );
?>

<?php } ?>

</div><!-- #content -->
<?php get_footer(); ?>
