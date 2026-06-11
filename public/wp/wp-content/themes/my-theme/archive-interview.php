<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) { ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title">採用情報</div>
		<h1 class="title">社員インタビュー</h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<section class="interview-list sm">
	<div class="section-wrapper"><div class="section-frame large"><div class="flex">

<?php while ( have_posts() ) {
the_post(); ?>

		<a href="<?php the_permalink(); ?>" class="unit flex">
			<div class="photo"><img src="<?php echo get_field('img'); ?>" alt=""></div>
			<div class="text-column">

				<?php if ($terms = get_the_terms($post->ID, 'cat_staff_interview')) {
					echo ('<span class="category-wrapper">') ;
					foreach ( $terms as $term ) {
						echo ('<span class="category">') ;
						echo esc_html($term->name)  ;
						echo ('</span>') ;
					}
					echo ('</span>') ;
				} ?>
				<h3 class="head"><?php the_title(); ?></h3>
				<div class="name"><?php echo get_field('name'); ?>　<?php echo get_field('year'); ?>
				<?php if( get_field('kubunn') ) { ?>
				 | <?php echo get_field('kubunn'); ?>
				<?php } ?>
				 </div>
				<div class="link">詳しく見る</div>

			</div><!-- .text-column -->
		</a><!-- .unit -->

<?php } ?>

	</div><!-- .flex --></div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .interview-list -->

<?php my_the_posts_pagination(); ?>

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の採用情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_recruit', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php } ?>

</div><!-- #content -->
<?php get_footer(); ?>
