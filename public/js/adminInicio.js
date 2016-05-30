$(document).on("ready",function(){
  Chart.defaults.global.responsive = true;

  var ctx1 = $("#myChart1").get(0).getContext("2d");
  var data = [
              {
              value: 200,
              color:"#F7464A",
              highlight: "#FF5A5E",
              label: "Emp1"
              },
              {
              value: 50,
              color: "#46BFBD",
              highlight: "#5AD3D1",
              label: "Emp2"
              },
              {
              value: 100,
              color: "#FDB45C",
              highlight: "#FFC870",
              label: "Emp3"
              },
              {
              value: 40,
              color: "#949FB1",
              highlight: "#A8B3C5",
              label: "Emp4"
              },
              {
              value: 120,
              color: "#4D5360",
              highlight: "#616774",
              label: "Emp5"
              },
              {
              value: 38,
              color:"#768ACC",
              highlight: "#A3ADCF",
              label: "Emp6"
              },
              {
              value: 23,
              color: "#77C947",
              highlight: "#A8D190",
              label: "Emp7"
              },
              {
              value: 100,
              color: "#28A899",
              highlight: "#4EBFB2",
              label: "Emp8"
              },
              {
              value: 49,
              color: "#D9811C",
              highlight: "#D49B5B",
              label: "Emp9"
              },
              {
              value: 68,
              color: "#2F83E0",
              highlight: "#8AB4E3",
              label: "Emp10"
              }
  ];

  var options = {
                  scaleShowLabelBackdrop : true,
                  scaleBackdropColor : "rgba(255,255,255,0.75)",
                  scaleBeginAtZero : true,
                  scaleBackdropPaddingY : 2,
                  scaleBackdropPaddingX : 2,
                  scaleShowLine : true,
                  segmentShowStroke : true,
                  segmentStrokeColor : "#fff",
                  segmentStrokeWidth : 2,
                  animationSteps : 100,
                  animationEasing : "easeOutBounce",
                  animateRotate : true,
                  animateScale : false,
              };

    var myPolarAreaChart = new Chart(ctx1).PolarArea(data,options);




  var ctx2 = $("#myChart2").get(0).getContext("2d");
  var data = {
              labels: ['emp1','emp2','emp3','emp4','emp5','emp6','emp7','emp8','emp9','emp10'],
              datasets: [
                  {
                      label: "Not Top empleados",
                      fillColor: "#BE9BC9",
                      strokeColor: "#EFE6F2",
                      highlightFill: "#4A8496",
                      highlightStroke: "rgba(220,220,220,1)",
                      data: [9,9,9,5,4,4,3,3,2,1]
                  },
              ]
          };

  var options = {
                scaleBeginAtZero : true,
                scaleShowGridLines : true,
                scaleGridLineColor : "rgba(0,0,0,.05)",
                scaleGridLineWidth : 1,
                scaleShowHorizontalLines: true,
                scaleShowVerticalLines: true,
                barShowStroke : true,
                barStrokeWidth : 2,
                barValueSpacing : 5,
                barDatasetSpacing : 1,
                };

  var myChart2 = new Chart(ctx2).Bar(data, options);


});
