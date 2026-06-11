
/* 売上高（四半期別）のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart001"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','772','715'], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','875','1825','1479'], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','1354','2528',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['938','1393','1976','3249',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 営業利益（四半期別）のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart002"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','209','138'], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','176','527','345'], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','299','708',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['172','317','431','751',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 経常利益（四半期別）のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart003"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','209','138'], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','176','527','345'], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','291','708',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['170','316','408','751',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 当期純利益（四半期別）のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart004"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','144','94'], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','124','363','236'], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','203','486',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['81','218','293','547',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 1株当たり当期純利益（四半期別）のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart005"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','15.35','9.89'], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','16.03','38.60','24.65'], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','26.29','51.67',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['10.70','28.43','36.69','58.06',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 総資産のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart006"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','','1151'], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','','882',''], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','','1016',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['391','783','898','1137',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 純資産のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart007"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','','527'], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','','342',''], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','','362',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['103','178','287','503',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 自己資本比率のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart008"), {
	type: 'line',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','','45.6'], //1Qの数字を掲載
				lineTension: 0,
				fill: false,
				borderColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','','38.4',''], //2Qの数字を掲載
				lineTension: 0,
				fill: false,
				borderColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','','35.4',''], //3Qの数字を掲載
				lineTension: 0,
				fill: false,
				borderColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['26.5','22.3','31.7','44.0',''], //通期の数字を掲載
				lineTension: 0,
				fill: false,
				borderColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 1株当たり純資産
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart009"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '通期',
				data: ['21.29','35.91','58.44','96.72',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
		legend: {
			display: false, //凡例を非表示
		},
	}
});


/* 営業活動によるキャッシュ・フローのグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart010"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','',''], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','','-29',''], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','','',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['','213','84','-72',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 投資活動によるキャッシュ・フローのグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart011"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','',''], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','','-6',''], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','','',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['','-21','-22','-19',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 財務活動によるキャッシュ・フローのグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart012"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','',''], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','','-27',''], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','','',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['','118','-4','206',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});


/* 現金及び現金同等物期末残高のグラフ
-------------------------------------------------- */

new Chart(document.getElementById("highlightChart013"), {
	type: 'bar',
	data: {
		"labels": [ //5年分の決算月を掲載
			"17/4",
			"18/4",
			"19/4",
			"20/4",
			"21/4",
		],
		datasets: [
			{
				label: '1Q',
				data: ['','','','',''], //1Qの数字を掲載
				backgroundColor: "#efc2c1",
			},
			{
				label: '2Q',
				data: ['','','','406',''], //2Qの数字を掲載
				backgroundColor: "#ea8a88",
			},
			{
				label: '3Q',
				data: ['','','','',''], //3Qの数字を掲載
				backgroundColor: "#e05a58",
			},
			{
				label: '通期',
				data: ['','412','470','585',''], //通期の数字を掲載
				backgroundColor: "#cc2926",
			},
		],
	},
	options: {
		scales: {
			xAxes: [
				{
					gridLines: {
						display: false,
					},
				}
			],
			yAxes: [
				{
					ticks: {
						callback: function(label, index, labels) {
							return label.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
						}
					},
					gridLines: {
						zeroLineColor: "#dddddd",
						color: "#dddddd",
					},
				}
			]
		},
		tooltips: {
			callbacks: {
				label: function(tooltipItem, data){
					return tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
				}
			}
		},
		maintainAspectRatio: false,
	}
});
