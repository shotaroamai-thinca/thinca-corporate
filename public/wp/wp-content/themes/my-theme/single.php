<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title sw">
	<div class="sf">

		<div class="sub-title">COLUMN</div>
		<h1 class="title">コラム</h1>

	</div><!-- .sf -->
</header><!-- .page-title -->

<header class="entry-title section-wrapper">
	<div class="section-frame">

		<h1 class="title">
			<?php the_title(); ?>
		</h1><!-- .title -->
		<time class="data"><?php the_time('Y/n/j'); ?></time>
<?php
	if ($terms = get_the_terms($post->ID, 'category')) {
		foreach ( $terms as $term ) {
			echo ('<span class="category">') ;
			echo esc_html($term->name)  ;
			echo ('</span>') ;
		}
	}
?>

	</div><!-- .section-frame -->
</header><!-- .entry-title -->

<header id="entry-thumbnail">
		<div class="img">

<?php the_post_thumbnail( 'full' ); ?>

		</div><!-- .img -->
</header><!-- #entry-thumbnail -->

<div class="entry-content">
	<div class="section-frame small">

<?php the_content(); ?>

	</div><!-- .section-frame -->
</div><!-- .entry-content -->

<?php get_template_part( 'template-parts/navigation/post-navigation' ); ?>

<?php if ( comments_open() || get_comments_number() ) {
comments_template();
} ?>

<?php get_template_part( 'widgets' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
