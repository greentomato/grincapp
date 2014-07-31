$(function() {
    ingresosChart();
    ventasChart();
    repartosChart();
    $('#left-panel li[data-nav="home"]').addClass('active');
});

//INGRESOS NETOS Y BRUTOS
function ingresosChart () {
        var visitas = [[1, 270], [2, 340], [3, 510], [4, 480], [5, 550], [6, 650], [7, 610], [8, 700], [9, 650], [10, 750], [11, 570], [12, 590], [13, 620]],
        data = [{
            label : "Visitas",
            data : visitas,
            lines : {
                show : true,
                lineWidth : 1,
                fill : true,
                fillColor : {
                    colors : [{
                        opacity : 0.1
                    }, {
                        opacity : 0.13
                    }]
                }
            },
            points : {
                show : true
            }
        }];

        var options = {
            grid : {
                hoverable : true
            },
            colors : ["#568A89", "#3276B1"],
            tooltip : true,
            tooltipOpts : {
                content : "%s: %y",
                defaultTheme : false
            },
            xaxis : {
                ticks : [[1, "18-06"], [2, "19-06"], [3, "20-06"], [4, "21-06"], [5, "22-06"], [6, "23-06"], [7, "24-06"], [8, "25-06"], [9, "26-06"], [10, "27-06"], [11, "28-06"], [12, "29-06"], [13, "30-06&nbsp;&nbsp;"]]
            },
            yaxes : {}
        };

        var plot3 = $.plot($("#visitas"), data, options);
    }
//FIN INGRESOS NETOS Y BRUTOS

//VENTAS
function ventasChart () {
    var data_pie = [
        {label: 'Look', data:860},
        {label: 'Moda', data:550},
        {label: 'Viajes', data:1240}
    ];

    $.plot($("#categorias"), data_pie, {
        series : {
            pie : {
                show : true,
                innerRadius : 0.5,
                radius : 1,
                label : {
                    show : false,
                    radius : 2 / 3,
                    formatter : function(label, series) {
                        return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                    },
                    threshold : 0.1
                }
            }
        },
        legend : {
            show : true,
            noColumns : 1, // number of colums in legend table
            labelFormatter : null, // fn: string -> string
            labelBoxBorderColor : "#000", // border color for the little label boxes
            container : null, // container (as jQuery object) to put legend in, null means default on top of graph
            position : "ne", // position of default legend container within plot
            margin : [5, 10], // distance from grid edge to default legend container within plot
            backgroundColor : "#efefef", // null means auto-detect
            backgroundOpacity : 1 // set to 0 to avoid background
        },
        grid : {
            hoverable : true,
            clickable : true
        },
        tooltip : true,
        tooltipOpts : {
            content : "%y visitas",
            defaultTheme : false
        }
    });
}
//FIN VENTAS

//REPARTOS
function repartosChart () {
    var data = [{
        data: [[1, 300], [2, 231], [3, 411], [4, 212], [5, 264]],
        bars : {
            show : true,
            barWidth : 0.2
        }
    }]

    $.plot($("#publicidades"), data, {
        colors : ['#6595b4', "#7e9d3a", "#666", "#BBB"],
        grid : {
            show : true,
            hoverable : true,
            clickable : true,
            tickColor : "#efefef",
            borderWidth : 0,
            borderColor : "#efefef"
        },
        legend : true,
        tooltip : true,
        tooltipOpts : {
            content : '<span class="hidden">%x</span> %y clicks',
            defaultTheme : false
        },
        xaxis : {
            ticks : [[1, "Todo Viajes"], [2, "Vía Restó"], [3, "Club Cupón"], [4, "L'ORÉAL"], [5, "Revista Mía"]]
        }

    });
}
//FIN REPARTOS