
<div id="comments" class="section-wrapper section-margin">
	<div class="section-frame xsmall">

	<div class="head">この記事へのコメント</div>

	<?php if( have_comments() ){ ?>
	<ol id="comments-list">
		<?php wp_list_comments(); ?>
	</ol>
	<?php } ?>

	<?php comment_form(); ?>

	</div><!-- .section-frame -->
</div><!-- #comments -->




