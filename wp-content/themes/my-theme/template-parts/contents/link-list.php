<?php if( have_rows('link-list_group') ):
	$count = 1;
	while( have_rows('link-list_group') ): the_row(); ?>

<section class="link-list mb2">
	<div class="section-wrapper"><div class="section-frame">
<?php if( get_sub_field('link-list_group_name') ): ?>
		<h2 class="link-list-heading">
			<div class="tg"><?php echo get_sub_field('link-list_group_name'); ?></div>
		</h2><!-- .link-list-heading -->
<?php endif; ?>
	</div><!-- .section-frame --></div><!-- .section-wrapper -->
	<div class="section-wrapper"><div class="section-frame"><div class="unit-wrapper">

	<?php if( have_rows('link-list_list') ): ?>
	<?php while( have_rows('link-list_list') ): the_row(); ?>

		<a href="<?php echo get_sub_field('file'); ?>" target="_blank" class="unit flex hover bg">
			<div class="data"><?php echo get_sub_field('date'); ?></div>
			<?php if( get_sub_field('category') ): ?>
			<span class="category-wrapper">
				<span class="category"><?php echo get_sub_field('category'); ?></span>
			</span>
			<?php endif; ?>
			<div class="title pdf<?php if( !get_sub_field('category') ): ?> nocat<?php endif; ?>">
				<?php echo get_sub_field('title'); ?><svg><use xlink:href="#arrow-right"></use></svg>
			</div><!-- .title -->
		</a><!-- .unit -->

	<?php endwhile; ?>
	<?php endif; ?>

	</div><!-- .unit-wrapper --></div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .link-list -->

	<?php $count++;
	endwhile;
endif; ?>
