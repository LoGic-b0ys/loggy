$(document).ready(function(){
	$.ajax({
		url: "http://localhost/Web/Loggy/admin/user/datagraph",
		type: "GET",
		dataType: "json",
		contentType: "application/json",
		success: function(data){
			console.log(data);
			$("#splineArea-chart").dxChart({

				title: {visible: false},
				dataSource: data,
				commonSeriesSettings: {
					type: "splineArea",
					argumentField: "month",
					label: {visible: false}
				},
				argumentAxis: {
					valueMarginsEnabled: true
				},
				valueAxis:{
				grid:{
					color: '#9D9EA5',
					width: 0.1
					}
				},
				series: [
					{ valueField: "video", color: '#FF1942', opacity: 0.8 },
					{ valueField: "book", color: '#00b4ff', opacity: 0.8 },
					{ valueField: "music", color: '#ccc314', opacity: 0.8 }
				],
				legend: {
					visible: false
				},
				commonAxisSettings: {
					label: { font: { color: '#9D9EA5' } }
				}
			});
		},
		error: function(data){

		}
		});
});

// $("#splineArea-chart").dxChart({
		
// 		title: {visible: false},
// 		dataSource: [
// 			{ time: "Jan", y2005: 0},
// 			{ time: "Feb", y2005: 24},
// 			{ time: "Mar", y2005: 12},
// 			{ time: "Apr", y2005: 45},
// 			{ time: "May", y2005: 10},
// 			{ time: "Jun", y2005: 10},
// 			{ time: "Jul", y2005: 9},
// 			{ time: "Aug", y2005: 10},
// 			{ time: "Sep", y2005: 5},
// 			{ time: "Oct", y2005: 4},
// 			{ time: "Nov", y2005: 0}
// 		],
// 		commonSeriesSettings: {
// 			type: "splineArea",
// 		argumentField: "time",
// 			label: {visible: false},
// 		},
// 		argumentAxis:{
// 			valueMarginsEnabled: true
// 		},
// 		valueAxis:{
// 		grid:{
// 			color: '#9D9EA5',
// 			width: 0.1
// 			}
// 		},
// 		series: [
// 			{ valueField: "y2005", name: "Microsoft", color: '#FF1942', opacity: 0.8 }
// 		],
// 		legend: {
// 			/*visible: true,
// 			horizontalAlignment: 'right',
// 			verticalAlignment: 'top',
// 			position:'inside',
// 			backgroundColor: 'transparent',
// 			markerSize: 6,
// 			font: { color: '#b2b2b2' }*/
// 			visible: false
// 		},
// 		commonAxisSettings: {
// 			label: { font: { color: '#9D9EA5' } }
// 		}
		
// 	});








