<?php if( have_rows('link-list_group') ):
	$count = 1;
	while( have_rows('link-list_group') ): the_row(); ?>

<section class="link-list mb">
<?php if( get_sub_field('link-list_group_name') ): ?>
	<div class="link-list-heading">
		<div class="tg"><?php echo get_sub_field('link-list_group_name'); ?></div>
	</div><!-- .link-list-heading -->
<?php endif; ?>
	<div class="unit-wrapper fw">

	<?php if( have_rows('link-list_list') ): ?>
	<?php while( have_rows('link-list_list') ): the_row(); ?>

		<a href="<?php
		if( get_sub_field('url')){
			echo get_sub_field('url');
		}
		if( get_sub_field('file') && !get_sub_field('url')){
			echo get_sub_field('file');
		}
		?>" target="_blank" class="unit flex hover bg">
			<?php if( get_sub_field('date') ): ?>
			<div class="data"><?php echo get_sub_field('date'); ?></div>
			<?php endif; ?>
			<?php if( get_sub_field('category') ): ?>
			<span class="category-wrapper">
				<span class="category"><?php echo get_sub_field('category'); ?></span>
			</span>
			<?php endif; ?>
			<div class="title<?php if( get_sub_field('pdf') ): ?> pdf<?php endif; ?><?php if( !get_sub_field('date') ): ?> nodata<?php endif; ?><?php if( !get_sub_field('category') ): ?> nocat<?php endif; ?>">
				<?php echo get_sub_field('title'); ?><svg><use xlink:href="#arrow-right"></use></svg>
			</div><!-- .title -->
		</a><!-- .unit -->

	<?php endwhile; ?>
	<?php endif; ?>

	</div><!-- .unit-wrapper -->
</section><!-- .link-list -->

	<?php $count++;
	endwhile;
endif; ?>
