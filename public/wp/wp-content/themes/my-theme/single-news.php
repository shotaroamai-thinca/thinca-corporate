<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="entry-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">ニュース</div>
		<h1 class="title">
			<?php the_title(); ?>
		</h1><!-- .title -->
		<time class="data"><?php the_time('Y/n/j'); ?></time>
<?php
	if ($terms = get_the_terms($post->ID, 'news_category')) {
		foreach ( $terms as $term ) {
			echo ('<span class="category">') ;
			echo esc_html($term->name)  ;
			echo ('</span>') ;
		}
	}
?>

	</div><!-- .section-frame -->
</header><!-- .entry-title -->

<div class="entry-content">
	<div class="section-frame small">

<?php the_content(); ?>


<?php if( get_field('news_type') ): ?>
		<div class="text-bg frame">

<?php while( have_rows('type','option') ): the_row();
	if( get_field('news_type') == get_sub_field('id') ):
		echo get_sub_field('text');
	endif;
endwhile; ?>

		</div><!-- .text-bg -->
<?php endif; ?>

	</div><!-- .section-frame -->
</div><!-- .entry-content -->

<section class="nav-back">
	<div class="section-frame">
		<a class="link" href="/news/">
			ニュース一覧へ戻る
		</a><!-- .link -->
	</div><!-- .section-frame -->
</section><!-- .nav-back -->

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
