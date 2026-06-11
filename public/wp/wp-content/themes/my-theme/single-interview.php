<?php get_header(); ?>

<div id="content" class="interview">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="interview-mv section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">INTERVIEW</div>
		<div class="photo"><img src="<?php echo get_field('img'); ?>" alt=""></div>
		<div class="text-column">
			<div class="sub-title2">INTERVIEW</div>
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="name"><?php echo get_field('name'); ?></div>
			<div class="name_furigana"><?php echo get_field('name_furigana'); ?></div>
		</div><!-- .text-column -->

	</div><!-- .section-frame -->
</header><!-- .interview-mv -->


<?php if( get_field('profile') ): ?>
<section class="profile-box sm">
	<div class="section-wrapper"><div class="section-frame">

		<div class="head">PROFILE</div>

<?php if( get_field('year') ): ?>
		<div class="year"><strong>入社　</strong><?php echo get_field('year'); ?>
		<?php if( get_field('kubunn') ) { ?>
		 | <?php echo get_field('kubunn'); ?>
		<?php } ?>
		 </div>
<?php endif; ?>
<?php if( get_field('section') ): ?>
		<div class="section"><strong>所属　</strong><?php echo get_field('section'); ?></div>
<?php endif; ?>
		<p class="profile"><?php echo get_field('profile'); ?></p>

	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .profile-box  -->
<?php endif; ?>

<div class="entry-content">
	<div class="section-frame small">

<?php the_content(); ?>

	</div><!-- .section-frame -->
</div><!-- .entry-content -->

<section class="interview-list">
	<h2 class="section-heading-002">
		<div class="sub">OTHER</div>
		<div class="main">その他の社員インタビュー</div>
	</h2><!-- .section-heading-2 -->
	<div class="section-wrapper"><div class="section-frame large"><div class="flex">

<?php
$args = array(
	'post_type' => 'interview', 
	'no_found_rows' => true,
	'posts_per_page' => 3,
 );

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post();
?>

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

<?php
	endwhile;
endif;
wp_reset_postdata();
?>

	</div><!-- .flex --></div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .interview-list -->

<section class="nav-back">
	<div class="section-frame">
		<a class="link" href="/recruit/interview/">
			社員インタビュー一覧へ戻る
		</a><!-- .link -->
	</div><!-- .section-frame -->
</section><!-- .nav-back -->

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の採用情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_recruit', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
