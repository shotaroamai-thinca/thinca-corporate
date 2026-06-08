<?php
/*
Template Name: service-category
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="category-title section-wrapper">
	<div class="section-frame">

		<h1 class="title" data-js="title1"><?php the_title(); ?></h1>
		<div class="sub-title" data-js="title2"><?php the_subtitle(); ?></div>

	</div><!-- .section-frame -->
</header><!-- .category-title -->

<section class="service">

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

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
