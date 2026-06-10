

/// header-menu-trigger ////////////////////

$(document).ready(function() {
	$("#js-header-menu-trigger").click(function () {
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$(this).next().removeClass('active');
			$(this).delay(400).queue(function(){
				$(this).next().removeClass('animation');
				$(this).dequeue();
			});
			$('.overlay').removeClass('-visible');
		} else {
			$(this).addClass("active");
			$(this).next().addClass("animation");
			$(this).next().addClass("active");
			$('.overlay').addClass('-visible');
		}
	});
});
$(document).ready(function() {
	$("#g-nav a").click(function () {
		$("#js-header-menu-trigger").removeClass('active');
		$("#js-header-menu-trigger").next().removeClass('active');
		$("#js-header-menu-trigger").next().removeClass('animation');
		$('.overlay').removeClass('-visible');
	});
});

// オーバーレイをタップでモーダル閉じる
$('.overlay').on('click', function(){
		$("#js-header-menu-trigger").removeClass('active');
		$("#js-header-menu-trigger").next().removeClass('active');

 $("#js-header-menu-trigger").delay(400).queue(function(){
				 $("#js-header-menu-trigger").next().removeClass('animation');
				 $("#js-header-menu-trigger").dequeue();
			});

			$('.overlay').removeClass('-visible');
});


/// hamburger ////////////////////

$(document).ready(function(){
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 0) {
				$('#js-header-menu-trigger').addClass("animation");
			} else {
				$('#js-header-menu-trigger').removeClass("animation");
			}
		});
	});

});


/// Anker ////////////////////

$(function(){
	$('a[href^="#"]').click(function() {
		var adjust = -90;
		var speed = 400;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top + adjust;
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});
});


/// page-top ////////////////////

$(document).ready(function(){
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#page-top').addClass("visible");
			} else {
				$('#page-top').removeClass("visible");
			}
		});

		// scroll body to 0px on click
		$('#page-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});


/// waves ////////////////////

(function () {
 
	var callbackId;
 
	var pi = Math.PI;
	var pi2 = 2 * Math.PI;

	this.Waves = function (holder, options) {
		var Waves = this;

		Waves.options = extend(options || {}, {
			resize: true,
			rotation: -35,
			waves: 2,
			width: 200,
			hue: [4, 7],
			amplitude: 0.5,
			background: true,
			preload: true,
			speed: [0.004, 0.008],
			debug: false,
			fps: false,
		});

		Waves.waves = [];

		Waves.holder = document.querySelector(holder);
		Waves.canvas = document.createElement('canvas');
		Waves.ctx = Waves.canvas.getContext('2d');
		Waves.holder.appendChild(Waves.canvas);
		Waves.color = 'rgba(253, 215, 103, 0.08)';

		Waves.hue = Waves.options.hue[0];
		Waves.hueFw = false;
		Waves.stats = new Stats();

		Waves.resize();
		Waves.init(Waves.options.preload);

		if (Waves.options.resize)
			window.addEventListener('resize', function () {
				Waves.resize();
			}, false);

	};

	Waves.prototype.init = function (preload) {
		var Waves = this;
		var options = Waves.options;

		for (var i = 0; i < options.waves; i++)
			Waves.waves[i] = new Wave(Waves);

		if (preload) Waves.preload();
	};

	Waves.prototype.preload = function () {
		var Waves = this;
		var options = Waves.options;

		for (var i = 0; i < options.waves; i++) {
			for (var j = 0; j < options.width; j++) {
				Waves.waves[i].update();
			}
		}
	};

	Waves.prototype.render = function () {
		var Waves = this;
		var ctx = Waves.ctx;
		var options = Waves.options;

		Waves.clear();

		each(Waves.waves, function (wave, i) {
			wave.update();
			wave.draw();
		});
	};

	Waves.prototype.animate = function () {
		var Waves = this;

		Waves.render();

		callbackId = window.requestAnimationFrame(Waves.animate.bind(Waves));

	};

	Waves.prototype.animatestop = function () {
		var Waves = this;

		Waves.render();

		window.cancelAnimationFrame( callbackId ) ;

	};

	Waves.prototype.clear = function () {
		var Waves = this;
		Waves.ctx.clearRect(0, 0, Waves.width, Waves.height);
	};

	Waves.prototype.background = function () {
		var Waves = this;
		var ctx = Waves.ctx;

		ctx.fillStyle = '#fff';
		ctx.fillRect(0, 0, Waves.width, Waves.height);
	};

	Waves.prototype.resize = function () {
		var Waves = this;
		var width = Waves.holder.offsetWidth;
		var height = Waves.holder.offsetHeight;
		Waves.scale = window.devicePixelRatio || 1;
		Waves.width = width * Waves.scale;
		Waves.height = height * Waves.scale;
		Waves.canvas.width = Waves.width;
		Waves.canvas.height = Waves.height;
		Waves.canvas.style.width = width + 'px';
		Waves.canvas.style.height = height + 'px';
		Waves.radius = Math.sqrt(Math.pow(Waves.width, 2) + Math.pow(Waves.height, 2)) / 2;
		Waves.centerX = Waves.width / 2;
		Waves.centerY = Waves.height / 2;
		//Waves.radius /= 2; // REMOVE FOR FULLSREEN
	};

	function Wave(Waves) {
		var Wave = this;
		var speed = Waves.options.speed;

		Wave.Waves = Waves;
		Wave.Lines = [];

		Wave.angle = [
			rnd(pi2),
			rnd(pi2),
			rnd(pi2),
			rnd(pi2)
		];

		Wave.speed = [
			rnd(speed[0], speed[1]) * rnd_sign(),
			rnd(speed[0], speed[1]) * rnd_sign(),
			rnd(speed[0], speed[1]) * rnd_sign(),
			rnd(speed[0], speed[1]) * rnd_sign(),
		];

		return Wave;
	}

	Wave.prototype.update = function () {
		var Wave = this;
		var Lines = Wave.Lines;
		var color = Wave.Waves.color;

		Lines.push(new Line(Wave, color));

		if (Lines.length > Wave.Waves.options.width) {
			Lines.shift();
		}
	};

	Wave.prototype.draw = function () {
		var Wave = this;
		var Waves = Wave.Waves;

		var ctx = Waves.ctx;
		var radius = Waves.radius;
		var radius3 = radius / 3;
		var x = Waves.centerX;
		var y = Waves.centerY;
		var rotation = dtr(Waves.options.rotation);
		var amplitude = Waves.options.amplitude;
		var debug = Waves.options.debug;

		var Lines = Wave.Lines;

		each(Lines, function (line, i) {

			var angle = line.angle;

			var x1 = x - radius * Math.cos(angle[0] * amplitude + rotation);
			var y1 = y - radius * Math.sin(angle[0] * amplitude + rotation);

			var x2 = x + radius * Math.cos(angle[3] * amplitude + rotation);
			var y2 = y + radius * Math.sin(angle[3] * amplitude + rotation);
			var cpx1 = x - radius3 * Math.cos(angle[1] * amplitude * 2);
			var cpy1 = y - radius3 * Math.sin(angle[1] * amplitude * 2);
			var cpx2 = x + radius3 * Math.cos(angle[2] * amplitude * 2);
			var cpy2 = y + radius3 * Math.sin(angle[2] * amplitude * 2);

			ctx.strokeStyle = (debug) ? '#fff' : line.color;

			ctx.beginPath();
			ctx.moveTo(x1, y1);
			ctx.bezierCurveTo(cpx1, cpy1, cpx2, cpy2, x2, y2);
			ctx.stroke();

	 });
	};

	function Line(Wave, color) {
		var Line = this;

		var angle = Wave.angle;
		var speed = Wave.speed;

		Line.angle = [
			Math.sin(angle[0] += speed[0]),
			Math.sin(angle[1] += speed[1]),
			Math.sin(angle[2] += speed[2]),
			Math.sin(angle[3] += speed[3])
		];

		Line.color = color;
	}

	function Stats() {
		this.data = [];
	}

	Stats.prototype.time = function () {
		return (performance || Date)
			.now();
	};

	Stats.prototype.log = function () {
		if (!this.last) {
			this.last = this.time();
			return 0;
		}

		this.new = this.time();
		this.delta = this.new - this.last;
		this.last = this.new;

		this.data.push(this.delta);
		if (this.data.length > 10)
			this.data.shift();
	};

	Stats.prototype.fps = function () {
		var fps = 0;
		each(this.data, function (data, i) {
			fps += data;
		});

		return Math.round(1000 / (fps / this.data.length));
	};

	function each(items, callback) {
		for (var i = 0; i < items.length; i++) {
			callback(items[i], i);
		}
	}

	function extend(options, defaults) {
		for (var key in options)
			if (defaults.hasOwnProperty(key))
				defaults[key] = options[key];
		return defaults;
	}

	function dtr(deg) {
		return deg * pi / 180;
	}

	function rtd(rad) {
		return rad * 180 / pi;
	}

	function diagonal_angle(w, h) {
		var a = Math.atan2(h, w) * 1.27325;
		return a;
	}

	function rnd(a, b) {
		if (arguments.length == 1)
			return Math.random() * a;
		return a + Math.random() * (b - a);
	}

	function rnd_sign() {
		return (Math.random() > 0.5) ? 1 : -1;
	}

})();


/// タイトルのアニメーション ////////////////////

titleAnim = function() {
	const title1 = $('[data-js="title1"]')
	const title2 = $('[data-js="title2"]')
	const title3 = $('[data-js="title3"]')
	const title4 = $('[data-js="title4"]')
	const TimelinePlus = {}

	TimelinePlus.para = function() {
		const args = Array.prototype.slice.call(arguments, 0)
		return new TimelineMax().add(args)
	}

	TimelinePlus.seri = function() {
		let i, len, tl
		tl = new TimelineMax()
		len = arguments.length
		for (i = 0; i < len; i++) {
			tl.add(arguments[i])
		}
		return tl
	}

	const mytimeline = TimelinePlus.para(
		TweenMax.fromTo(
			title1,
			0.5,
			{ opacity: 0, top: '10px' },
			{ opacity: 1, top: '0px', ease: Expo.easeOut }
		).delay(0.5),
		TweenMax.fromTo(
			title2,
			0.8,
			{ opacity: 0, top: '10px' },
			{ opacity: 1, top: '0px', ease: Expo.easeOut }
		).delay(0.65),
		TweenMax.fromTo(
			title3,
			0.8,
			{ opacity: 0, top: '10px' },
			{ opacity: 1, top: '0px', ease: Expo.easeOut }
		).delay(0.8),
		TweenMax.fromTo(
			title4,
			0.8,
			{ opacity: 0, top: '10px' },
			{ opacity: 1, top: '0px', ease: Expo.easeOut }
		).delay(0.95)
	)
}

// 初期に実行する関数
$(function() {
	try {
		Typekit.load({
			active: function() {
				titleAnim()
			}
		})
	} catch (e) {
		titleAnim()
	}
})



/// fadeinのアニメーション ////////////////////
$(function(){
	$(window).on('load scroll',function (){
		$('.fadein').each(function(){
			//ターゲットの位置を取得
			var target = $(this).offset().top;
			//スクロール量を取得
			var scroll = $(window).scrollTop();
			//ウィンドウの高さを取得
			var height = $(window).height();
			//ターゲットまでスクロールするとフェードインする
			if (scroll > target - height + 160){
				//クラスを付与
				$(this).addClass('active');
			}
		});
	});
});


/// 数字のカウントアップ ////////////////////
$(window).on('load scroll', function(){
	$('.count-num').each(function(){
		var self = $(this),
			thisPosition = self.offset().top,
			scroll = $(window).scrollTop(),
			windowHeight = $(window).height(),
			countMax = self.attr('data-to'),
			thisCount = self.text(),
			countSpeed = 18,
			countTimer;

		if (scroll >= thisPosition - windowHeight + 180){

			function timer(){
				countTimer = setInterval(function(){
					var countNext = thisCount++,
						addZero = ('0' + countNext).slice(-2);

					if (countMax > 10 && countNext < 10) {
						self.text(addZero);
					} else {
						self.text(countNext);
					}

					if (countNext == countMax){
						clearInterval(countTimer);
					}
				}, countSpeed);
			}
			timer();
		}
	});
});
