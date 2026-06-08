<?php
/*
Template Name: recruit/number2
*/
?>
<?php get_header(); ?>

<div id="content">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="recruit-number-mv sw">
	<div class="sf -l">

		<div class="text-area">
			<div class="sub-title">RECRUIT</div>
			<h1 class="title"><?php the_title(); ?></h1>
			<div class="lead">シンカの情報をデータでご紹介します。</div>
		</div><!-- .text-area -->

	</div><!-- .sf -->
</header><!-- .recruit-number-mv -->

<section class="recruit-number sm">
	<h2 class="section-heading-002">
		<div class="sub">COMPANY</span>
		<div class="main">シンカってこんな会社</span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="section-frame large">

		<div class="unit fadein">
			<div class="head fadein">リモート比率</div>
			<div class="body flex fadein remote">

				<div class="img">

<picture>
	<source media="(min-width:768px)" srcset="/assets/img/number/item_001_02_pc.png">
	<source media="(max-width:767px)" srcset="/assets/img/number/item_001_02_sp.png">
	<img src="/assets/img/number/item_001_pc.png" alt="出社は週に3日以下 57.6%">
</picture>

				</div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="flex col2">

		<div class="unit fadein">
			<div class="head fadein">従業員数推移</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_002_02.png" alt="従業員数推移 2022年 45名"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">職場での服装</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_003.png" alt="職場での服装 私服55.6%"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

	</div><!-- .flex -->

	<div class="flex col3">

		<div class="unit fadein">
			<div class="head fadein">年間休日</div>
			<div class="body flex center fadein">
				<div class="img-i"><img src="/assets/img/number/i-001.svg" alt=""></div>
				<div class="count">
					<span class="count-num" data-to="125">0</span><span class="count-unit">日</span>
				</div>
			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">有給取得率</div>
			<div class="body flex center fadein">
				<div class="img-i"><img src="/assets/img/number/i-002.svg" alt=""></div>
				<div class="count">
					<span class="count-num" data-to="74">0</span><span class="count-unit">%</span>
				</div>
			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">産休・育休取得の復帰率</div>
			<div class="body flex center fadein">
				<div class="img-i"><img src="/assets/img/number/i-003.svg" alt=""></div>
				<div class="count">
					<span class="count-num" data-to="100">0</span><span class="count-unit">%</span>
				</div>
			</div><!-- .body -->
		</div><!-- .unit -->

	</div><!-- .flex -->

</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .recruit-number -->

<section class="recruit-number sm">
	<h2 class="section-heading-002">
		<div class="sub">MEMBER</span>
		<div class="main"><span class="nb">シンカではこのような人が</span><span class="nb">働いています</span></span>
	</h2><!-- .section-heading -->
	<div class="section-wrapper"><div class="section-frame large">
		<div class="flex col2">

		<div class="unit fadein">
			<div class="head fadein">平均年齢</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_004_02.png" alt="平均年齢 36.4歳"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">男女比率</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_005_02.png" alt="男女比率 男性社員31名 女性社員15名"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">職種比</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_006_02.png" alt="営業職 67.4%／技術職 13.0%／事務職 19.6%"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">眼鏡比率</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_007_02.png" alt="MEGANE 27%"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">つぶあん派orこしあん派</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_008.png" alt="つぶあん派52%　こしあん派48%"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">うどん派orそば派</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_009.png" alt="うどん派48%　そば派52%"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">ペット飼ってるor飼ってない</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_010.png" alt="ペット飼ってる33%　飼ってない67%"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

		<div class="unit fadein">
			<div class="head fadein">西日本出身or東日本出身</div>
			<div class="body flex fadein">

				<div class="img"><img src="/assets/img/number/item_011.png" alt="西日本出身21%　東日本出身79%"></div>

			</div><!-- .body -->
		</div><!-- .unit -->

	</div><!-- .flex -->
	<ul class="note">
		<li>※ 2022年度実績</li>
	</ul>
</div><!-- .section-frame --></div><!-- .section-wrapper -->
</section><!-- .recruit-number -->

<section class="local-navigation section-wrapper">
	<div class="section-frame large">

		<div class="sub-title">OTHER</div>
		<div class="title">その他の採用情報</div>

	<ul class="menue flex">

<?php echo my_local_navigation('local_recruit', 0);?>

	</ul><!-- .menue -->

	</div><!-- .section-frame -->
</section><!-- .local-navigation -->

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
