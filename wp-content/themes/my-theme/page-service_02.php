<?php
/*
Template Name: service-category-02
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
			<a target="_blank" href="https://kaiwa.cloud/"><img src="/assets/img/service/captcha001_02.png" alt="" class="cap"></a>
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

</section><!-- .service -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
