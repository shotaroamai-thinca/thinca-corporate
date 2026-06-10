
var waves = new Waves('#page-bg');

waves.render();
window.onresize = function () {
	waves.render();
};
