<div id="page-top">
	<a href="#top"><svg><use xlink:href="#arrow-top"></use></svg></a>
</div><!-- #page-top -->

<?php if ( !is_front_page() ) { ?>
<section class="breadcrumbs section-wrapper">
	<div class="section-frame large">

		<?php if(function_exists('bcn_display')) {
			bcn_display();
		}?>

	</div><!-- .section-frame -->
</section><!-- .breadcrumbs -->
<?php } ?>

<?php if( have_rows('footer-banner','option') ): ?>
<div id="footer-banner" class="section-wrapper">
	<div class="section-frame large">

		<ul class="menu flex">
<?php while( have_rows('footer-banner','option') ): the_row(); ?>
			<li>
				<a href="<?php the_sub_field('url'); ?>" target="_blank" class="hover">
					<div class="flex">
						<div class="img">

<?php
$image = get_sub_field('image');
 
if(!empty($image)){
	$url = $image['url'];
	$alt = $image['alt'];
?>
<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
<?php } ?>

						</div>
						<p><?php the_sub_field('text'); ?></p>
					</div>
				</a>
			</li>
<?php endwhile; ?>
		</ul><!-- .menu -->

	</div><!-- .section-frame -->
</div><!-- #footer-banner -->
<?php endif; ?>

<footer id="footer">
	<div class="section-wrapper"><div class="section-frame large">

	<div class="flex rs3">
	<div class="area-left">

		<div class="logo">
			<a href="/" class="hover__opa"><img src="/assets/img/common/logo_thinca_002.png" alt="Thinca"></a>
		</div><!-- .logo -->
		<div class="address">
			<div class="heading">株式会社シンカ</div>
			<div class="body">
				〒101-0054<br>
				東京都千代田区神田錦町3-17<br>
				廣瀬ビル10F
			</div><!-- .body -->
		</div><!-- .address -->
		<div class="social">
			<ul class="menue flex">
				<li><a href="https://www.facebook.com/thinca0108/" target="_blank"><img src="/assets/img/common/i_facebook.svg" alt="facebook" class="hover__opa"></a></li>
				<li><a href="https://twitter.com/kaiwacloud" target="_blank"><img src="/assets/img/common/i_twitter.svg" alt="Twitter" class="hover__opa"></a></li>
				<li><a href="https://www.youtube.com/channel/UC2awT6_0j6vMVCrwzzyTo2w/featured" target="_blank"><img src="/assets/img/common/i_youtube.svg" alt="YouTube" class="hover__opa"></a></li>
			</ul><!-- .menue -->
		</div><!-- .social -->
		<div class="mark">
			<ul class="menu flex">
				<li><a href="https://privacymark.jp/" target="_blank">
					<img src="/assets/img/common/pmark_002.png" alt="" class="hover__opa">
				</a></li>
				<li><a href="https://quote.jpx.co.jp/jpx/template/quote.cgi?F=tmp/stock_detail&MKTN=T&QCODE=149A" target="_blank">
					<img src="/assets/img/common/mark_jpx_001.png" alt="" class="hover__opa">
				</a></li>
			</ul><!-- .menu -->
		</div><!-- .mark -->

	</div><!-- .area-left -->
	<div class="area-right">

		<nav class="f-nav flex">

<?php
if ( has_nav_menu( 'footer_1' )){
	$args = array(
		'theme_location' => 'footer_1',
		'container'      => false,
		'items_wrap'     =>'<ul class="menue">%3$s</ul><!-- .menue -->',
	);
	wp_nav_menu( $args ); 
};
?>

<?php
if ( has_nav_menu( 'footer_2' )){
	$args = array(
		'theme_location' => 'footer_2',
		'container'      => false,
		'items_wrap'     =>'<ul class="menue">%3$s</ul><!-- .menue -->',
	);
	wp_nav_menu( $args ); 
};
?>

<?php
if ( has_nav_menu( 'footer_3' )){
	$args = array(
		'theme_location' => 'footer_3',
		'container'      => false,
		'items_wrap'     =>'<ul class="menue">%3$s</ul><!-- .menue -->',
	);
	wp_nav_menu( $args ); 
};
?>

<?php
if ( has_nav_menu( 'footer_4' )){
	$args = array(
		'theme_location' => 'footer_4',
		'container'      => false,
		'items_wrap'     =>'<ul class="menue">%3$s</ul><!-- .menue -->',
	);
	wp_nav_menu( $args ); 
};
?>


		</nav><!-- .f-nav -->

	</div><!-- .flex -->
	</div><!-- .area-right -->

	<div class="area-bottom flex">
<?php
if ( has_nav_menu( 'footer_5' )){
	$args = array(
		'theme_location' => 'footer_5',
		'container'      => false,
		'items_wrap'     =>'<ul class="menue flex center">%3$s</ul><!-- .menue -->',
	);
	wp_nav_menu( $args ); 
};
?>
		<small class="copyright">&copy; Thinca Co.,Ltd. All Rights Reserved.</small>
	</div><!-- .area-bottom -->

	</div><!-- .section-frame --></div><!-- .section-wrapper -->
</footer><!-- #footer -->

</div><!-- #page -->

<!-- wp出力タグ -->
<?php wp_footer(); ?>

<!-- /wp出力タグ -->

<!-- JS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="/assets/js/vendor.js?202103271632"></script>
<script src="/assets/js/bundle.js?202103271632"></script>

<?php if ( is_page('highlight') ): ?>
<script src="/assets/js/ir_graph.js?202103271632"></script>
<?php endif; ?>

<?php if ( is_page('number') || is_page('ir') ){ ?>
<script src="/assets/js/wave2.js?202103271632"></script>
<?php } else { ?>
<script src="/assets/js/wave1.js?202103271632"></script>
<?php } ?>

<!-- タグ ================================================== -->
<script async="">// <![CDATA[
ytag({
  "type":"yjad_retargeting",
  "config":{
    "yahoo_retargeting_id": "UHPSUELZW0",
    "yahoo_retargeting_label": "",
    "yahoo_retargeting_page_type": "",
    "yahoo_retargeting_items":[
      {item_id: 'i1', category_id: '', price: '', quantity: ''},
      {item_id: 'i2', category_id: '', price: '', quantity: ''},
      {item_id: 'i3', category_id: '', price: '', quantity: ''}
    ]
  }
});
// ]]></script>
<!-- Mautic Tag ここから -->
<script>// <![CDATA[
  (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
    w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
    m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://kaiwa.cloud/mautic/mtc.js','mt');
 
  mt('send', 'pageview');
// ]]></script>
<!-- Mautic Tag ここまで -->
<!-- /タグ ================================================== -->

<script type='text/javascript'>
piAId = '1124233';
piCId = '';
piHostname = 'go.pardot.com';

(function() {
	function async_load(){
		var s = document.createElement('script'); s.type = 'text/javascript';
		s.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + piHostname + '/pd.js';
		var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
	}
	if(window.attachEvent) { window.attachEvent('onload', async_load); }
	else { window.addEventListener('load', async_load, false); }
})();
</script>
</body>
</html>
