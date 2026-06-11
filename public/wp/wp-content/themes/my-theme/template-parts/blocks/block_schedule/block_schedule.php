<section class="block_schedule sm">
	<div class="schedule_title frame"><?php echo get_field('block_schedule_title'); ?></div>
	<div class="text-bg frame">

<?php if( have_rows('block_schedule_loop') ):
$count = 1;
while( have_rows('block_schedule_loop') ): the_row(); ?>

		<div class="task flex">
			<div class="time"><?php echo get_sub_field('time'); ?></div>
			<div class="name"><?php echo get_sub_field('task'); ?></div>	
		</div><!-- .task -->

<?php $count++;
endwhile;
endif; ?>

	</div><!-- .text-bg -->
</section><!-- .block_schedule -->
