$(document).on("ready",function(){


Chart.defaults.global.responsive = true;

  
var ctx = $("#chartDia").get(0).getContext("2d");

        var data = {
                    labels: ["8", "9", "10", "11", "12", "14", "15"], //horas de trabajo
                    datasets: [          
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
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

        var myLineChart = new Chart(ctx).Line(data, options);

    var ctx1 = $("#chartMeses").get(0).getContext("2d");

    var data1 = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    };


      var options1= {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero : true,

    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - If there is a stroke on each bar
    barShowStroke : true,

    //Number - Pixel width of the bar stroke
    barStrokeWidth : 2,

    //Number - Spacing between each of the X value sets
    barValueSpacing : 5,

    //Number - Spacing between data sets within X values
    barDatasetSpacing : 1,

    };

    var myBarChart = new Chart(ctx1).Bar(data1, options1);


    var ctx6 = $("#chartSemanas").get(0).getContext("2d");

      var data2 = [
                  {
                      value: 300,
                      color:"#F7464A",
                      highlight: "#FF5A5E",
                      label: "Red"
                  },
                  {
                      value: 50,
                      color: "#46BFBD",
                      highlight: "#5AD3D1",
                      label: "Green"
                  },
                  {
                      value: 100,
                      color: "#FDB45C",
                      highlight: "#FFC870",
                      label: "Yellow"
                  }
              ];


        var options2 = 
        {
                segmentShowStroke : true,
                segmentStrokeColor : "#fff",
                segmentStrokeWidth : 2,
                percentageInnerCutout : 50, // This is 0 for Pie charts
                animationSteps : 100,
                animationEasing : "easeOutBounce",
                animateRotate : true,
                animateScale : false,
        };

      var myDoughnutChart = new Chart(ctx6).Doughnut(data2,options2);

   
});

   function openEvent(evt, cityName) {
     var i, tabcontent, tablinks;
     tabcontent = document.getElementsByClassName("tabcontent");
        
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
    
    tablinks = document.getElementsByClassName("tablinks");
     
        for (i = 0; i < tabcontent.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
    
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
   }