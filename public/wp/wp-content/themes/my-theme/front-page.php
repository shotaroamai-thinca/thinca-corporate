<?php get_header(); ?>

<div id="content" class="home">

<section class="home-main-visual section-wrapper">
	<div class="sf -l">
		<div class="visual">
			<img data-js="title1" src="/assets/img/home/home-mv-002.jpg" alt="">
		</div><!-- .visual -->

		<div class="text-area-mv">
			<h2 class="catch" data-js="title2">
				<img src="/assets/img/home/home-mv-text-003.png" alt="">
			</h2><!-- .catch -->
			<div class="read" data-js="title3">
				<span class="no-break">ITで&nbsp;世界をもっと&nbsp;</span><span class="no-break">おもしろく</span>
			</div><!-- .read -->
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

<!-- E-IR Parts -->
<section class="link-list mb2">
	<h2 class="section-heading">
		<span class="main">IR NEWS</span>
		<span class="sub">IRニュース</span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper">
		<div class="section-frame">
			<div class="unit-wrapper fw eir__topNews">
				<!-- E-IR -->
				<div class="eir" data-area-name="area_top_001"></div>
				<script type="text/javascript" src="/assets/ir/eir/eir_v5.js" charset="utf-8"></script>
				<script type="text/javascript">
				scriptLoader.setSrc(eirPassCore + 'eir_common.js');
				scriptLoader.load(
				function(){setParts('file_top_001');  }, showMaintenanceMessage);
				</script>
				<!-- /E-IR -->
			</div><!-- .unit-wrapper -->
			<div class="button-area">
				<a class="button" href="/ir/news/"><span>IRニュース一覧を見る</span></a>
			</div><!-- .button-area -->
		</div><!-- .section-frame -->
	</div><!-- .section-wrapper -->
</section><!-- .link-list -->
<!-- /E-IR Parts -->

<section class="service">
	<h2 class="section-heading">
		<span class="main">SERVICE</span>
		<span class="sub">サービス</span>
	</h2><!-- .section-heading -->

	<div class="catch-lead">
		<h3 class="catch">
			<span class="no-break">会話を&nbsp;クラウドで&nbsp;</span><br><span class="no-break">おもしろくしよう</span>
		</h3><!-- .catch -->
	</div><!-- .catch-lead -->

	<div class="unit">
		<div class="section-wrapper"><div class="section-frame">
			<div class="text-area">
				<div class="logo"><a target="_blank" href="https://kaiwa.cloud/"><img src="/assets/img/service/logo001.png" alt="カイクラ"></a></div>
				<h3 class="head"><span class="nb">コミュニケーションプラットフォーム</span><span class="nb">「カイクラ」</span></h3>
				<p class="text">「カイクラ」は、電話/SMS/メール/ビデオ通話など、様々なコミュニケーションアプリのやりとりを一元管理できます。異なるコミュニケーション手段を用いても、顧客ごとにコミュニケーション履歴情報が整理された状態で閲覧できるので、担当者以外でもこれまで経緯を把握した上で、顧客対応することが可能になります。</p>
				<div class="button-area"><a class="button -nw" target="_blank" href="https://kaiwa.cloud/"><span>サービスを見る</span></a></div>
			</div><!-- .text-area -->
		</div><!-- .section-frame --></div><!-- .section-wrapper -->
		<div class="img-area">
			<img src="/assets/img/service/bg001.png" alt="" class="bg">
			<a target="_blank" href="https://kaiwa.cloud/"><img src="/assets/img/service/captcha001_03.png" alt="" class="cap"></a>
		</div><!-- .img-area -->
	</div><!-- .unit -->

	<div class="unit right">
		<div class="section-wrapper"><div class="section-frame">
			<div class="text-area">
				<div class="logo"><a target="_blank" href="https://kaiwa.cloud/media/"><img src="/assets/img/service/logo002_02.png" alt="カイクラ.mag"></a></div>
				<h3 class="head"><span class="nb">企業のありとあらゆる</span><span class="nb">会話に関わる</span><br><span class="nb">お役立ちテクノロジー情報を</span><span class="nb">配信。</span></h3>
				<p class="text">カイクラ.magとは株式会社シンカが運営するオウンドメディアです。「音声を記録し、会話を企業価値に」をモットーに、「会話」に関する様々なテクノロジーや最新情報、企業の業務効率化や社内コミュニケーションの活性化事例など、すべての企業にとってお役に立てる情報を幅広く配信しています。</p>
				<div class="button-area"><a class="button -nw" target="_blank" href="https://kaiwa.cloud/media/"><span>サービスを見る</span></a></div>
			</div><!-- .text-area -->
		</div><!-- .section-frame --></div><!-- .section-wrapper -->
		<div class="img-area">
			<img src="/assets/img/service/bg002.png" alt="" class="bg">
			<a target="_blank" href="https://kaiwa.cloud/media/"><img src="/assets/img/service/captcha002_02.jpg" alt="" class="cap"></a>
		</div><!-- .img-area -->
	</div><!-- .unit -->

	<div class="unit">
		<div class="section-wrapper"><div class="section-frame">
			<div class="text-area">
				<div class="logo"><a target="_blank" href="https://carconnect.jp/"><img src="/assets/img/service/logo003.webp" alt="CarConnect"></a></div>
				<h3 class="head"><span class="nb">自動車業界で働く、</span><span class="nb">すべての方へ。</h3>
				<p class="text">株式会社シンカがお届けする自動車業界向けオウンドメディア「CarConnect」。業界の最新ニュースから、新人教育にも使える用語解説、お客様への提案に役立つ情報まで。明日からの仕事に役立つ知識を、わかりやすくお届けします。</p>
				<div class="button-area"><a class="button -nw" target="_blank" href="https://carconnect.jp/"><span>サービスを見る</span></a></div>
			</div><!-- .text-area -->
		</div><!-- .section-frame --></div><!-- .section-wrapper -->
		<div class="img-area">
			<img src="/assets/img/service/bg002.png" alt="" class="bg">
			<a target="_blank" href="https://carconnect.jp/"><img src="/assets/img/service/captcha003.jpg" alt="" class="cap"></a>
		</div><!-- .img-area -->
	</div><!-- .unit -->

</section><!-- .service -->

<section class="recruit mb2">
	<h2 class="section-heading">
		<span class="main">RECRUIT</span>
		<span class="sub">採用情報</span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="section-frame">

		<div class="img-area">
			<a href="https://recruit.thinca.co.jp/" target="_blank">
				<picture>
					<source media="(min-width:37.5625em)" srcset="/assets/img/home/recruit-pc-003.jpg">
					<source media="(max-width:37.5em)" srcset="/assets/img/home/recruit-sp-003.jpg"><img src="/assets/img/home/recruit-pc-003.jpg" alt="採用情報を見る">
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
