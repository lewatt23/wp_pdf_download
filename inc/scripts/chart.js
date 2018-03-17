 function createConfig(gridlines, title) {
            return {
                type: 'line',
                data: {
                    labels: ["Today"],
                    datasets: [ {
                        label: "Downloads",
                        fill: false,
                        backgroundColor: window.chartColors.blue,
                        borderColor: window.chartColors.blue,
                        data: [18, 33, 22, 19, 11, 39, 30],
                    }]
                },
                options: {
                    responsive: true,
                    title:{
                        display: true,
                        text: title
                    },
                   scales: {
            yAxes: [{
                position: "left",
                "id": "y-axis-0",
            }, {
                position: "right",
                "id": "y-axis-1",
            }]
        }
                }
            };
        }

        window.onload = function() {
            var container = document.querySelector('.container1');

            [ {
                title: 'Download  stats',
                gridLines: {
                    display: true,
                    drawBorder: true,
                    drawOnChartArea: true,
                    drawTicks: true,
                }
            }].forEach(function(details) {
                var div = document.createElement('div');
                div.classList.add('chart-container');

                var canvas = document.createElement('canvas');
                div.appendChild(canvas);
                container.appendChild(div);

                var ctx = canvas.getContext('2d');
                var config = createConfig(details.gridLines, details.title);
                new Chart(ctx, config);
            });
        };