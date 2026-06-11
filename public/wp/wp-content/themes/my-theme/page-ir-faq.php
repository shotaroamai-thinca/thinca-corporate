<?php
/*
Template Name: IR/FAQ
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

<section id="anchor-navigation" class="section-wrapper mb">
	<div class="section-frame">

		<ul class="menu flex">
			<?php if( have_rows('qa_group') ):
			$count = 1;
			while( have_rows('qa_group') ): the_row(); ?>
			<li><a href="#qa_group_<?php echo sprintf("%03d", $count); ?>">
				<svg><use xlink:href="#arrow-bottom"></use></svg>
				<?php echo get_sub_field('qa_group_name'); ?>
			</a></li>
			<?php $count++;
			endwhile;
			endif; ?>
		</ul><!-- .menu -->

	</div><!-- .section-frame -->
</section><!-- #anchor-navigation -->

<?php if( have_rows('qa_group') ):
	$count = 1;
	while( have_rows('qa_group') ): the_row(); ?>

<section id="qa_group_<?php echo sprintf("%03d", $count); ?>" class="qa_group section-margin">
	<h2 class="section-heading">
		<div class="tg"><?php echo get_sub_field('qa_group_name'); ?></div>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="section-frame small">

	<?php if( have_rows('qa_list') ): ?>
	<?php while( have_rows('qa_list') ): the_row(); ?>

		<div class="qa">
			<div class="question flex">
				<div class="q">Q.</div>
				<h3 class="text"><?php echo get_sub_field('question'); ?></h3>
			</div><!-- .question -->
			<div class="answer flex">
				<div class="a">A.</div>
				<p class="text"><?php echo get_sub_field('answer'); ?></p>
			</div><!-- .answer -->
		</div><!-- .qa -->

	<?php endwhile; ?>
	<?php endif; ?>

	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- #qa_group_<?php echo sprintf("%03d", $count); ?> -->

	<?php $count++;
	endwhile;
endif; ?>


<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の投資家情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_ir', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
