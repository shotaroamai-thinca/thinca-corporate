<?php
/*
Template Name: IR/電子公告
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="page-title section-wrapper">
	<div class="section-frame">

		<div class="sub-title"><?php the_subtitle(); ?></div>
		<h1 class="title"><?php the_title(); ?></h1>

	</div><!-- .section-frame -->
</header><!-- .page-title -->

<?php $has_notices = have_rows( 'notice_list', 'option' ); ?>

<?php if ( $has_notices ) : ?>
<section class="link-list mb">
	<div class="section-wrapper"><div class="section-frame">
		<div class="unit-wrapper fw">

<?php while ( have_rows( 'notice_list', 'option' ) ) : the_row();
	$date_raw = get_sub_field( 'date' );
	$title    = get_sub_field( 'title' );
	$file     = get_sub_field( 'file' );

	$file_url    = '';
	$file_format = '';
	$file_size   = '';
	$file_ext    = '';

	if ( is_array( $file ) ) {
		$file_url = isset( $file['url'] ) ? $file['url'] : '';
		$filename = isset( $file['filename'] ) ? $file['filename'] : '';

		if ( $filename ) {
			$file_ext = strtoupper( pathinfo( $filename, PATHINFO_EXTENSION ) );
		}
		if ( ! $file_ext && ! empty( $file['subtype'] ) ) {
			$file_ext = strtoupper( $file['subtype'] );
		}

		$file_format = $file_ext;

		if ( ! empty( $file['filesize'] ) ) {
			$file_size = my_format_filesize( $file['filesize'] );
		} elseif ( ! empty( $file['ID'] ) ) {
			$path = get_attached_file( $file['ID'] );
			if ( $path && file_exists( $path ) ) {
				$file_size = my_format_filesize( filesize( $path ) );
			}
		}
	}

	$is_pdf       = ( strtolower( $file_ext ) === 'pdf' );
	$display_date = $date_raw ? date_i18n( 'Y/n/j', strtotime( $date_raw ) ) : '';

	$file_meta_parts = array_filter( array( $file_format, $file_size ) );
	$file_meta       = $file_meta_parts ? implode( ' / ', $file_meta_parts ) : '';
?>
			<a href="<?php echo esc_url( $file_url ); ?>" target="_blank" rel="noopener" class="unit flex hover bg">
				<div class="data"><?php echo esc_html( $display_date ); ?></div>
				<div class="title<?php if ( $is_pdf ) : ?> pdf<?php endif; ?> nocat">
					<?php echo esc_html( $title ); ?>
					<?php if ( $file_meta ) : ?>
						<span class="filemeta">（<?php echo esc_html( $file_meta ); ?>）</span>
					<?php endif; ?>
					<svg><use xlink:href="#arrow-right"></use></svg>
				</div><!-- .title -->
			</a><!-- .unit -->
<?php endwhile; ?>

		</div><!-- .unit-wrapper -->
	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .link-list -->
<?php else : ?>

<section class="entry-content sw">
	<div class="section-frame small">

<?php the_content(); ?>

	</div><!-- .section-frame -->
</section><!-- .entry-content -->

<?php endif; ?>

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他のIR情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation( 'local_ir', 0 ); ?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
