$(document).on("ready",function(){
  Chart.defaults.global.responsive = true;

  var ctx3 = $("#myChart3").get(0).getContext("2d");
  var data = {
              labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
              datasets: [
                  {
                      label: "Ventas por dias",
                      fillColor: "#ABD4B6",
                      strokeColor: "rgba(220,220,220,1)",
                      pointColor: "rgba(220,220,220,1)",
                      pointStrokeColor: "#fff",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "rgba(220,220,220,1)",
                      data: [65, 59, 80, 81, 56, 55, 40]
                  }
              ]
          };

  var options = {
                  scaleShowGridLines : true,
                  scaleGridLineColor : "rgba(0,0,0,.05)",
                  scaleGridLineWidth : 1,
                  scaleShowHorizontalLines: true,
                  scaleShowVerticalLines: true,
                  bezierCurve : true,
                  bezierCurveTension : 0.4,
                  pointDot : true,
                  pointDotRadius : 4,
                  pointDotStrokeWidth : 1,
                  pointHitDetectionRadius : 20,
                  datasetStroke : true,
                  datasetStrokeWidth : 2,
                  datasetFill : true,
              };

  var myLineChart3 = new Chart(ctx3).Line(data, options);


  var ctx4 = $("#myChart4").get(0).getContext("2d");
  var data = {
              labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
              datasets: [
                  {
                      label: "My First dataset",
                      fillColor: "#4795ED",
                      strokeColor: "rgba(220,220,220,1)",
                      pointColor: "rgba(220,220,220,1)",
                      pointStrokeColor: "#fff",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "rgba(220,220,220,1)",
                      data: [65, 59, 90, 81, 56, 55, 40]
                  }
              ]
          };

  var options = {
                  scaleShowLine : true,
                  angleShowLineOut : true,
                  scaleShowLabels : false,
                  scaleBeginAtZero : true,
                  angleLineColor : "rgba(0,0,0,.1)",
                  angleLineWidth : 1,
                  pointLabelFontFamily : "'Arial'",
                  pointLabelFontStyle : "normal",
                  pointLabelFontSize : 10,
                  pointLabelFontColor : "#666",
                  pointDot : true,
                  pointDotRadius : 3,
                  pointDotStrokeWidth : 1,
                  pointHitDetectionRadius : 20,
                  datasetStroke : true,
                  datasetStrokeWidth : 2,
                  datasetFill : true,
              };

  var myRadarChart = new Chart(ctx4).Radar(data, options);
});
