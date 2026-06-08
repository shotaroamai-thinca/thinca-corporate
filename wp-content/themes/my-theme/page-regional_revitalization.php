<?php
/*
Template Name: regional_revitalization
*/
?>
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

<?php if ( !empty($post->post_content) ): ?>
<div class="entry-content sw">
	<div class="section-frame small">

<?php the_content(); ?>

	</div><!-- .section-frame -->
</div><!-- .entry-content -->
<?php endif; ?>

<section class="cta-main">
	<div class="section-wrapper"><div class="section-frame">
		<h2 class="catch">
			地方銀行さまへ
		</h2><!-- .catch -->
		<p class="lead">
			<span class="nb">ITを活用した</span><span class="nb">地域経済の活性化について</span><span class="nb">お考えの地方銀行さまは、</span><span class="nb">ぜひお問い合わせください。</span>
		</p><!-- .lead -->
		<div class="button-area">
			<a href="/contact/" class="button -l"><span>お問い合わせ</span></a>
		</div><!-- .button-area -->
		<p class="tel">
			<span class="no-break">お電話でのお問い合わせ:&nbsp;</span><span class="no-break tel-number">03-6721-0415</span>
		</p><!-- .tel -->
	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .cta-main -->

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
