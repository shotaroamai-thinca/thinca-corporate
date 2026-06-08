<?php
/*
Template Name: IR/library
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">IR</div>
		<h1 class="title"><?php the_title(); ?></h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<section class="local-navigation section-wrapper bgnone">
	<div class="section-frame large">

<ul class="menue flex">

	<li><a href="/ir/library/irreport/">
		<div class="link-title">四半期IR資料</div>
	</a></li>

	<li><a href="/ir/library/irmovie/">
		<div class="link-title">決算説明会動画</div>
	</a></li>

	<li><a href="/ir/library/summary/">
		<div class="link-title">決算短信</div>
	</a></li>

	<li><a href="/ir/library/briefing/">
		<div class="link-title">決算説明資料</div>
	</a></li>

	<li><a href="/ir/library/securities/">
		<div class="link-title">有価証券報告書</div>
	</a></li>

	<li><a href="/ir/library/business/">
		<div class="link-title">事業報告書</div>
	</a></li>

	<li><a href="/ir/library/internal/">
		<div class="link-title">内部統制報告書</div>
	</a></li>

</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<section class="entry-content sw">
	<div class="section-frame small">

<?php the_content(); ?>

	</div><!-- .section-frame -->
</section><!-- .entry-content -->

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の投資家情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_ir', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
