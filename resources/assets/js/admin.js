var Chart = require('chart.js');
var ctx = document.getElementById("activityChart");

makeGraph();

function makeGraph()
{
    $.ajax({
        url: "/api/admin/activity_count",
        method: "GET",
    }).success(function(json) {
        console.log(json.data.chart);

        var activityChartData = json.data.chart;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: json.data.chart,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });

        console.log(myChart);
    });
}