
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

<footer id="footer" class="minimum">
	<div class="section-wrapper"><div class="section-frame large">

	<div class="area-bottom">
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
<script src="/assets/js/vendor.js?202103251526"></script>
<script src="/assets/js/bundle.js?202103251526"></script>

<?php if ( is_page('highlight') ): ?>
<script src="/assets/js/ir_graph.js?202103251526"></script>
<?php endif; ?>

<?php if ( is_page('number') || is_page('ir') ){ ?>
<script src="/assets/js/wave2.js?202103251526"></script>
<?php } else { ?>
<script src="/assets/js/wave1.js?202103251526"></script>
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

</body>
</html>
