<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) { ?>

<header class="category-title section-wrapper">
	<div class="section-frame">

		<h1 class="title" data-js="title1"><?php the_archive_title(); ?></h1>
		<div class="sub-title" data-js="title2">ニュース</div>

	</div><!-- .section-frame -->
</header><!-- .category-title -->

<section id="tab-navigation" class="section-wrapper pb">
	<div class="section-frame">

		<ul class="menu flex">
			<li class="current-cat"><a href="/news/">全て</a></li>
<?php wp_list_categories('title_li=&taxonomy=news_category'); ?>
		</ul><!-- .menu -->

	</div><!-- .section-frame -->
</section><!-- #tab-navigation -->

<section class="link-list mb">
	<div class="section-wrapper"><div class="section-frame">
		<div class="unit-wrapper fw">

<?php while ( have_posts() ) {
the_post(); ?>
		<a href="<?php the_permalink(); ?>" class="unit flex hover bg">
			<div class="data"><?php the_time('Y/n/j'); ?></div>

<?php
	if ($terms = get_the_terms($post->ID, 'news_category')) {
		echo ('<span class="category-wrapper">') ;
		foreach ( $terms as $term ) {
			echo ('<span class="category">') ;
			echo esc_html($term->name)  ;
			echo ('</span>') ;
		}
		echo ('</span>') ;
	}
?>

			<div class="title<?php if( !get_the_terms($post->ID, 'cat_news') ): ?> nocat<?php endif; ?>">
				<?php the_title(); ?><svg><use xlink:href="#arrow-right"></use></svg>
			</div><!-- .title -->
		</a><!-- .unit -->
<?php } ?>

		</div><!-- .unit-wrapper -->
	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .link-list -->

<?php my_the_posts_pagination(); ?>

<?php } ?>

</div><!-- #content -->
<?php get_footer(); ?>
