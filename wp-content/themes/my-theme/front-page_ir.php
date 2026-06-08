<?php get_header(); ?>

<div id="content" class="home">

<section class="home-main-visual section-wrapper">
	<div class="sf -l">
		<div class="visual">
			<img data-js="title1" src="/assets/img/home/home-mv-001.jpg" alt="">
		</div><!-- .visual -->

		<div class="text-area-mv">
			<h2 class="catch" data-js="title2">
				<img src="/assets/img/home/home-mv-text-001.png" alt="">
			</h2><!-- .catch -->
			<div class="read" data-js="title3">
				<span class="no-break">音声テックで、</span><span class="no-break">世界をもっとおもしろく。</span>
			</div><!-- .read -->
			<div class="button-area-mv" data-js="title4">
				<a class="button" href="/passion/"><span>PASSION</span></a>
			</div><!-- .button-area -->
		</div><!-- .text-area-mv -->

	</div><!-- .section-frame -->
</section><!-- .home-main-visual -->

<section class="link-list mb2">
	<h2 class="section-heading">
		<span class="main">NEWS</span>
		<span class="sub">お知らせ</span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="section-frame">

		<div class="unit-wrapper fw">

<?php
$args = array(
	'post_type' => 'news', 
	'no_found_rows' => true,
	'posts_per_page' => 4,
 );

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post();
?>
		<a href="<?php the_permalink(); ?>" class="unit flex hover bg">
			<div class="data"><?php the_time('Y/n/j'); ?></div>

<?php
	if ($terms = get_the_terms($post->ID, 'news_category')) {
		echo ('<span class="category-wrapper">') ;
		foreach ( $terms as $term ) {
			echo ('<span class="category">') ;
			echo esc_html($term->name)  ;
			echo ('</span>') ;
		}
		echo ('</span>') ;
	}
?>

			<div class="title<?php if( !get_the_terms($post->ID, 'cat_news') ): ?> nocat<?php endif; ?>">
				<?php the_title(); ?><svg><use xlink:href="#arrow-right"></use></svg>
			</div><!-- .title -->
		</a><!-- .unit -->
<?php
	endwhile;
endif;
wp_reset_postdata();
?>

		</div><!-- .unit-wrapper -->
		<div class="button-area">
			<a class="button" href="/news/"><span>ニュース一覧を見る</span></a>
		</div><!-- .button-area -->

	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .link-list -->

<section class="service">
	<h2 class="section-heading">
		<span class="main">SERVICE</span>
		<span class="sub">サービス</span>
	</h2><!-- .section-heading -->

	<div class="catch-lead">
		<h3 class="catch">
			<span class="no-break">音声テクノロジーを進化させ、</span><br><span class="no-break">人と人のつながりを強くする。</span>
		</h3><!-- .catch -->
	</div><!-- .catch-lead -->

	<div class="unit">
		<div class="section-wrapper"><div class="section-frame">
			<div class="text-area">
				<div class="logo"><a target="_blank" href="https://kaiwa.cloud/"><img src="/assets/img/service/logo001.png" alt="カイクラ"></a></div>
				<h3 class="head"><span class="nb">顧客情報と対応履歴を</span><span class="nb">一元管理。</span><br><span class="nb">顧客接点クラウド</span><span class="nb">「カイクラ」。</span></h3>
				<p class="text">顧客コミュニケーションを一元管理する「カイクラ」。クラウドシステムのため、お客様との円滑なコミュニケーションをチームで実現。電話着信と同時に顧客情報や対応履歴が表示、また通話録音はじめとするCTI機能の他、SMSやDM、テレビ通話機能も。テレワークでの会社固定電話対応にも活用できます。</p>
				<div class="button-area"><a class="button -nw" target="_blank" href="https://kaiwa.cloud/"><span>サービスを見る</span></a></div>
			</div><!-- .text-area -->
		</div><!-- .section-frame --></div><!-- .section-wrapper -->
		<div class="img-area">
			<img src="/assets/img/service/bg001.png" alt="" class="bg">
			<a target="_blank" href="https://kaiwa.cloud/"><img src="/assets/img/service/captcha001.png" alt="" class="cap"></a>
		</div><!-- .img-area -->
	</div><!-- .unit -->

	<div class="unit right">
		<div class="section-wrapper"><div class="section-frame">
			<div class="text-area">
				<div class="logo"><a target="_blank" href="https://kaiwa.cloud/media/"><img src="/assets/img/service/logo002.png" alt="カイクラ.mag"></a></div>
				<h3 class="head"><span class="nb">企業のありとあらゆる</span><span class="nb">会話に関わる</span><br><span class="nb">お役立ちテクノロジー情報を</span><span class="nb">配信。</span></h3>
				<p class="text">カイクラ.magとは株式会社シンカが運営するオウンドメディアです。「音声を記録し、会話を企業価値に」をモットーに、「会話」に関する様々なテクノロジーや最新情報、企業の業務効率化や社内コミュニケーションの活性化事例など、すべての企業にとってお役に立てる情報を幅広く配信しています。</p>
				<div class="button-area"><a class="button -nw" target="_blank" href="https://kaiwa.cloud/media/"><span>サービスを見る</span></a></div>
			</div><!-- .text-area -->
		</div><!-- .section-frame --></div><!-- .section-wrapper -->
		<div class="img-area">
			<img src="/assets/img/service/bg002.png" alt="" class="bg">
			<a target="_blank" href="https://kaiwa.cloud/media/"><img src="/assets/img/service/captcha002.jpg" alt="" class="cap"></a>
		</div><!-- .img-area -->
	</div><!-- .unit -->

</section><!-- .service -->

<section class="ir mb2">
	<h2 class="section-heading">
		<span class="main">IR</span>
		<span class="sub">投資家情報</span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="sf -l">
		<div class="flex">
			<div class="col1">
				<div class="head">IRニュース</div>

<!-- ########## 最新1年分 ########## -->
<?php
global $wp_query;
$query = $wp_query;
$current_id = $query->query;
$args = array(
	'post_type' => 'irnews', 
	'no_found_rows' => true,
	"posts_per_page" => 1,
 );

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post(); ?>


<!-- ########## -->


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

	<?php if( have_rows('link-list_list') ): $i = 0; ?>
	<?php while( have_rows('link-list_list') ): the_row(); $i++; ?>

<?php if( $i < 4 ): ?>
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
<?php endif; ?>

	<?php endwhile; ?>
	<?php endif; ?>

	</div><!-- .unit-wrapper -->
</section><!-- .link-list -->

	<?php $count++;
	endwhile;
endif; ?>


<!-- ########## -->


<?php
	endwhile;
endif;
wp_reset_postdata();
?>
<!-- ########## 最新1年分 ########## -->

			</div><!-- .col1 -->
			<div class="col2">
				<div class="head tg">最新IRライブラリー</div>

<!-- ########## IRトップに掲載されている項目 ########## -->
<?php
global $wp_query;
$query = $wp_query;
$current_id = $query->query;
$args = array(
	'post_type' => 'page',
	'name' => 'ir',
	'no_found_rows' => true,
	"posts_per_page" => 1,
 );

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post(); ?>

<!-- ########## -->


<?php if( have_rows('link-list_group') ):
	$count = 1;
	while( have_rows('link-list_group') ): the_row(); ?>

<section class="col2-link">
<?php if( get_sub_field('link-list_group_name') ): ?>
	<div class="link-list-heading">
		<strong><?php echo get_sub_field('link-list_group_name'); ?></strong>
	</div><!-- .link-list-heading -->
<?php endif; ?>
	<div class="col2-unit-wrapper">

	<?php if( have_rows('link-list_list') ): $i = 0; ?>
	<?php while( have_rows('link-list_list') ): the_row(); $i++; ?>

<?php if( $i < 4 ): ?>
		<a href="<?php
		if( get_sub_field('url')){
			echo get_sub_field('url');
		}
		if( get_sub_field('file') && !get_sub_field('url')){
			echo get_sub_field('file');
		}
		?>" target="_blank" class="unit flex hover">
			<?php if( get_sub_field('category') ): ?>
			<span class="category-wrapper">
				<span class="category"><strong>【<?php echo get_sub_field('category'); ?>】</strong></span>
			</span>
			<?php endif; ?>
			<div class="title<?php if( get_sub_field('pdf') ): ?> pdf<?php endif; ?><?php if( !get_sub_field('date') ): ?> nodata<?php endif; ?><?php if( !get_sub_field('category') ): ?> nocat<?php endif; ?>">
				<?php echo get_sub_field('title'); ?><svg><use xlink:href="#arrow-right"></use></svg>
			</div><!-- .title -->
		</a><!-- .unit -->
<?php endif; ?>

	<?php endwhile; ?>
	<?php endif; ?>

	</div><!-- .col2-unit-wrapper -->
</section><!-- .link-list -->

	<?php $count++;
	endwhile;
endif; ?>


<!-- ########## -->

<?php
	endwhile;
endif;
wp_reset_postdata();
?>
<!-- ########## IRトップに掲載されている項目 ########## -->

			</div><!-- .col2 -->
		</div><!-- .flex -->
		<div class="button-area">
			<a class="button" href="/ir/"><span>投資家情報一覧を見る</span></a>
		</div><!-- .button-area -->

	</div><!-- .sf --></div><!-- .section-wrapper -->
</section><!-- .ir -->

<section class="recruit mb2">
	<h2 class="section-heading">
		<span class="main">RECRUIT</span>
		<span class="sub">採用情報</span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="section-frame">

		<div class="img-area">
			<a href="/recruit/">
				<picture>
					<source media="(min-width:37.5625em)" srcset="/assets/img/home/recruit-pc.jpg">
					<source media="(max-width:37.5em)" srcset="/assets/img/home/recruit-sp.jpg"><img src="/assets/img/home/recruit-pc.jpg" alt="採用情報を見る">
				</picture>
			</a>
		</div><!-- .img-area -->

		<div class="button-area">
			<a class="button" href="/recruit/"><span>採用情報一覧を見る</span></a>
		</div><!-- .button-area -->

	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .recruit -->

<section class="local-navigation section-wrapper bgnone sm">
	<h2 class="section-heading">
		<span class="main">ABOUT</span>
		<span class="sub">企業情報</span>
	</h2><!-- .section-heading -->
	<div class="section-frame large">

		<div class="desc"><span class="nb">シンカの企業理念や会社概要、</span><span class="nb">沿革などをご紹介します。</span></div>

		<ul class="menue flex">

<?php echo my_local_navigation('local_about', 0);?>

		</ul><!-- .menue -->

		<div class="button-area">
			<a class="button" href="/about/"><span>企業情報一覧を見る</span></a>
		</div><!-- .button-area -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->


</div><!-- #content -->

<?php get_footer(); ?>
