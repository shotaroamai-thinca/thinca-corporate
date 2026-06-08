
<?php if ( is_active_sidebar( 'main-widget' ) ) { ?>
<div class="widgets">
	<div class="section-wrapper"><div class="section-frame"><div class="flex center">
		<?php dynamic_sidebar('main-widget'); ?>
	</div><!-- .flex --></div><!-- .section-frame --></div><!-- .section-wrapper -->
</div><!-- .widgets -->
<?php } ?>
