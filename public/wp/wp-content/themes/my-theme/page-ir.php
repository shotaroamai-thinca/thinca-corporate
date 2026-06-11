<?php
/*
Template Name: ir-category
*/
?>
<?php get_header(); ?>

<div id="content" class="irtop">
<?php if ( have_posts() ) {
while ( have_posts() ) {
the_post(); ?>

<header class="category-title section-wrapper">
	<div class="section-frame">

		<h1 class="title" data-js="title1"><?php the_title(); ?></h1>
		<div class="sub-title" data-js="title2"><?php the_subtitle(); ?></div>

	</div><!-- .section-frame -->
</header><!-- .category-title -->

<?php if(!empty($post->post_content)) { ?>
<div style="height:1px" aria-hidden="true" class="wp-block-spacer"></div>
<div class="entry-content sw">
	<div class="sf">

<?php the_content(); ?>

	</div><!-- .sf -->
</div><!-- .entry-content -->
<?php } ?>

<main class="irTop__mainSec">
	<div class="section-wrapper">
		<div class="section-frame">
			<section class="irTop__newsSec">
				<h2 class="irTop__h2">
					<span class="irTop__h2_en">IR NEWS</span>
					<span class="irTop__h2_ja">IRニュース</span>
				</h2>
				<!-- E-IR -->
				<div class="eir" data-area-name="area_top_002"></div>
				<script type="text/javascript" src="/assets/ir/eir/eir_v5.js" charset="utf-8"></script>
				<script type="text/javascript">
				scriptLoader.setSrc(eirPassCore + 'eir_common.js');
				scriptLoader.load(
				function(){setParts('file_top_002');  }, showMaintenanceMessage);
				</script>
				<!-- /E-IR -->
				<div class="button-area">
					<a class="button" href="/ir/news/"><span>もっと見る</span></a>
				</div>
			</section>
		</div><!-- .section-frame -->
	</div>
	<section class="irTop__cardSec mb2">
		<div class="section-wrapper">
			<div class="irTop__cardSec_inner">
				<ul class="irTop__cardList irTop__cardList-3col">
					<li class="irTop__cardList_item">
						<picture class="irTop__cardList_img">
							<img src="/assets/ir/img/top/img_top_01.png" alt="">
						</picture>
						<h2 class="irTop__cardList_ttl"><a href="/ir/management/">経営情報</a></h2>
						<ul class="irTop__cardList_linkList">
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/management/">株主･投資家の皆様へ</a>
							</li>
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/management/governance/">コーポレート・ガバナンス</a>
							</li>
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/management/disclosure/">ディスクロージャーポリシー</a>
							</li>
						</ul>
					</li>
					<li class="irTop__cardList_item">
						<picture class="irTop__cardList_img">
							<img src="/assets/ir/img/top/img_top_02.png" alt="">
						</picture>
						<h2 class="irTop__cardList_ttl"><a href="/ir/library/">IRライブラリー</a></h2>
						<ul class="irTop__cardList_linkList">
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/library/">決算短信</a>
							</li>
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/library/presentation/">決算説明資料</a>
							</li>
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/library/securities/">有価証券報告書</a>
							</li>
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/library/material/">IR資料</a>
							</li>
						</ul>
					</li>
					<li class="irTop__cardList_item">
						<picture class="irTop__cardList_img">
							<img src="/assets/ir/img/top/img_top_03.png" alt="">
						</picture>
						<h2 class="irTop__cardList_ttl"><a href="/ir/stock/">株式について</a></h2>
						<ul class="irTop__cardList_linkList">
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/stock/">株式情報</a>
							</li>
							<li class="irTop__cardList_linkList_item">
								<a href="/ir/stock/meeting/">株主総会</a>
							</li>
							<li class="irTop__cardList_linkList_item">
								<a href="https://stocks.finance.yahoo.co.jp/stocks/detail/?code=149A" target="_blank">株価情報</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="irTop__cardList irTop__cardList-1col">
					<li class="irTop__cardList_item">
						<picture class="irTop__cardList_img">
							<img src="/assets/ir/img/top/img_top_04.png" alt="">
						</picture>
						<div class="irTop__cardList_linkList_wrap">
							<ul class="irTop__cardList_linkList">
								<li class="irTop__cardList_linkList_item">
									<a href="/ir/highlight/">財務ハイライト</a>
								</li>
								<li class="irTop__cardList_linkList_item">
									<a href="/ir/calendar/">IRカレンダー</a>
								</li>
								<li class="irTop__cardList_linkList_item">
									<a href="/ir/faq/">よくあるご質問</a>
								</li>
							</ul>
							<ul class="irTop__cardList_linkList">
								<li class="irTop__cardList_linkList_item">
									<a href="/ir/contact/">IRお問い合わせ</a>
								</li>
								<li class="irTop__cardList_linkList_item">
									<a href="/ir/notice/">電子公告</a>
								</li>
								<li class="irTop__cardList_linkList_item">
									<a href="/ir/disclaimer/">免責事項</a>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<div class="section-wrapper">
		<div class="section-frame large">
			<h2 class="irTop__h2">
				<span class="irTop__h2_en">IR VIDEOS</span>
				<span class="irTop__h2_ja">IR動画</span>
			</h2>

			<section class="section-wrapper bgnone">
				<div class="section-frame large">

				<ul class="video-list flex">

				<?php if( have_rows('ir_video_list') ): ?>
				<?php while( have_rows('ir_video_list') ): the_row(); ?>
					<li class="video-item">
							<div class="video">
							<?php echo get_sub_field('video'); ?>
							</div>
							<div class="title"><?php echo get_sub_field('title'); ?></div>
					</li>
				<?php endwhile; ?>
				<?php endif; ?>

				</ul><!-- .video-list --></div><!-- .section-frame -->

				</div><!-- .section-frame -->
			</section><!-- .section-wrapper -->

			<div class="button-area">
				<a class="button" href="/ir/video/"><span>もっと見る</span></a>
			</div>
		</div><!-- .section-frame -->
	</div>

</main>

<?php get_template_part( 'template-parts/navigation/cta--button' ); ?>

<?php }} ?>
</div><!-- #content -->

<?php get_footer(); ?>
