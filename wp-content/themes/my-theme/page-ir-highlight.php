<?php
/*
Template Name: IR/highlight
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

<section id="anchor-navigation" class="section-wrapper pb">
	<div class="section-frame">
		<ul class="menu flex">
			
			<li><a href="#ir-highlight_001">
				<svg><use xlink:href="#arrow-bottom"></use></svg>
				経営成績
			</a></li>

			<li><a href="#ir-highlight_002">
				<svg><use xlink:href="#arrow-bottom"></use></svg>
				財政状態
			</a></li>

			<li><a href="#ir-highlight_003">
				<svg><use xlink:href="#arrow-bottom"></use></svg>
				キャッシュフローの状況
			</a></li>

			<li><a href="#ir-highlight_004">
				<svg><use xlink:href="#arrow-bottom"></use></svg>
				配当状況
			</a></li>
			
		</ul><!-- .menu -->
	</div><!-- .section-frame -->
</section><!-- #anchor-navigation -->

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
