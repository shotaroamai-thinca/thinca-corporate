<?php
global $wp_query;
global $slug;
$query = $wp_query;
$current_id = $query->query;
$args = array(
	'post_type' => $slug, 
	'no_found_rows' => true,
	"posts_per_page" => -1,
	);
?>

<section id="tab-navigation" class="section-wrapper pb">
	<div class="section-frame">

<form action="#" method="post" name="form">
<div class="select-wrap">
<select id="year" name="year" onChange="location.href=value;">
<option value="/ir/library/<?php echo $slug ?>/">決算期を選択してください</option>

<?php

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post();

	if ($post->post_name == $current_id['name']) : ?>

	<option value="<?php the_permalink(); ?>" selected><?php the_title(); ?>年12月期</option>

	<?php else: ?>

	<option value="<?php the_permalink(); ?>"><?php the_title(); ?>年12月期</option>

	<?php endif; ?>

<?php
	endwhile;
endif;
wp_reset_postdata();
?>

</select>
</div><!-- .select-wrap -->
</form>

	</div><!-- .section-frame -->
</section><!-- #tab-navigation -->

<div class="entry-content sw">
	<div class="sf">

<?php get_template_part( 'template-parts/navigation/link-list' ); ?>

<?php the_content(); ?>

	</div><!-- .sf -->
</div><!-- .entry-content -->

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の投資家情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_ir', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->
