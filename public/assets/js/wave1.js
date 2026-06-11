// 80秒(80000ミリセカンド)後にアニメーション停止
var timeout = '80000';

var waves = new Waves('#page-bg');

function wavesAnimate(){
	waves.animate();

	var me_animate = function(){
		waves.animate();
	}
	var me_animatestop = function(){
		waves.animatestop();
	}

	var o_atanimatestop = function(){
		waves.animatestop();
	}

	$(function(){
		$('#page').mouseleave(function(){
			me_animatestop();
		});
	});

	$(function(){
		$('#page').mouseenter(function(){
			me_animatestop();
			me_animate();
			setTimeout(o_atanimatestop, timeout);
		});
	});

	window.onresize = function () {
		waves.render();
	};

	setTimeout(o_atanimatestop, timeout);
}

var userAgent = window.navigator.userAgent.toLowerCase();

if(userAgent.indexOf('msie') != -1 || userAgent.indexOf('trident') != -1) {
	//IE向けの記述
	waves.render();
	window.onresize = function () {
		waves.render();
	};
}else if(userAgent.indexOf('edge') != -1) {
	//旧Edge向けの記述
	waves.render();
	window.onresize = function () {
		waves.render();
	};
}else if(userAgent.indexOf('chrome') != -1) {
	//Google Chrome向けの記述
	wavesAnimate();
}else if(userAgent.indexOf('safari') != -1) {
	//Safari向けの記述
	wavesAnimate();
}else if(userAgent.indexOf('firefox') != -1) {
	//FireFox向けの記述
	wavesAnimate();
}else{
	wavesAnimate();
}

