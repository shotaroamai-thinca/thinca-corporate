<?php
/*
Template Name: recruit-category
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="recruit-top-mv section-wrapper">
	<div class="section-frame large">

		<div class="text-area">
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="sub-title"><?php the_subtitle(); ?></div>
			<div class="catch"><span class="tg">今後の10年を、<br>「もっと」おもしろくする<br>仲間、集まれ！</span></div>
		</div><!-- .text-area -->
		<div class="img-area">
			<div class="img"><img src="/assets/img/recruit/recruit-top-mv-001pc.jpg" alt=""></div>
		</div><!-- .img-area -->

	</div><!-- .section-frame -->
</header><!-- .recruit-top-mv -->

<section class="local-navigation section-wrapper bgnone">
	<div class="section-frame large">

<ul class="menue flex">

<?php echo my_local_navigation('local_recruit', 1);?>

</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<section class="local-navigation section-wrapper bgnone">
	<div class="section-frame large">

<ul class="menue flex">

<?php if( have_rows('local_navigation') ):
	$count = 1;
	while( have_rows('local_navigation') ): the_row(); ?>

	<li><a href="<?php echo get_sub_field('url'); ?>">
		<?php if( get_sub_field('link-photo') ):?>
		<div class="link-photo"><img src="<?php echo get_sub_field('link-photo'); ?>" alt=""></div>
		<?php endif; ?>
		<div class="link-title"><?php echo get_sub_field('link-title'); ?></div>
		<div class="description"><?php echo get_sub_field('description'); ?></div>
	</a></li>

	<?php $count++;
	endwhile;
endif; ?>

</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
