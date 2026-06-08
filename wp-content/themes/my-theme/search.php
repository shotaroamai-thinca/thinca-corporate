<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) { ?>

<header id="page-header" class="section-wrapper">
	<div class="section-frame">
		<h1 class="page-title">検索キーワード「 <?php echo get_search_query(); ?>」</h1>
	</div><!-- .section-frame -->
</header><!-- #page-header -->

<?php while ( have_posts() ) {
the_post(); ?>

<section class="article">
	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1><!-- .entry-title -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div class="section-frame small">

<?php the_content(); ?>

		</div><!-- .section-frame -->
	</div><!-- .entry-content -->
</section><!-- .article -->

<?php } ?>
<?php my_the_posts_pagination(); ?>

<?php get_template_part( 'widgets' ); ?>

<?php } ?>

</div><!-- #content -->
<?php get_footer(); ?>
