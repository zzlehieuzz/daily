$(function() {

    var pieData = $.parseJSON($('#pie-chart-data').val());
    if(pieData.length > 0) {
        $.plot($("#flot-pie-chart"), pieData, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 0.5,
                        formatter: function (label, series) {
                            return '<div style="font-size:12pt;text-align:center;padding:2px;color:white;">' + Math.round(series.percent) + '%</div>';

                        }
                    }
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: false
        });
    }

    $('#list-year').change(function() {
        var listYearVal = $("#list-year option:selected").val();
        var listMonthVal = $("#data-p-month").val();
        if(listYearVal) {
            var urlGraph = $("#url-graph-index").val();
            processPage();
            window.location.href = urlGraph + listYearVal + '/' + listMonthVal + '/' + $('#data-p-type').val();
        }
    });

    $('#list-month').change(function() {
        var listMonthVal = $("#list-month option:selected").val();
        var listYearVal = $("#list-year option:selected").val();
        if(listYearVal && listMonthVal) {
            var urlGraph = $("#url-graph-index").val();
            processPage();
            window.location.href = urlGraph + listYearVal + '/' + listMonthVal + '/' + $('#data-p-type').val();
        }
    });

    //var barData = $.parseJSON($('#bar-chart-data').val());
    //var data1 = [
    //    {
    //        label: $('#data-year').val(),
    //        data: barData,
    //        bars: {
    //            show: true,
    //            barWidth: 12*44*60*60*300,
    //            fill: true,
    //            lineWidth:0,
    //            order: 1,
    //            fillColor:  {
    //                colors: ["#80C3FD", "#0089FF"]
    //            }
    //        },
    //        color: "#0089FF"
    //    }
    //];
    //
    //var flowBarChart = $.plot($("#flot-bar-chart"), data1, {
    //    xaxis: {
    //        min: (new Date(2016, 11, 20)).getTime(),
    //        max: (new Date(2017, 12, 30)).getTime(),
    //        mode: "time",
    //        timeformat: "%b",
    //        tickSize: [1, "month"],
    //        tickLength: 0,
    //        axisLabel: 'Month',
    //        axisLabelUseCanvas: true,
    //        axisLabelFontSizePixels: 12,
    //        axisLabelPadding: 5
    //    },
    //    yaxis: {
    //        show: false,
    //        axisLabelUseCanvas: true,
    //        axisLabelFontSizePixels: 12,
    //        axisLabelPadding: 5,
    //        tickFormatter: function (v, axis) {
    //            return moneyFormat(v);
    //        }
    //    },
    //    grid: {
    //        hoverable: true,
    //        clickable: false,
    //        borderWidth: 0,
    //        borderColor:'#f0f0f0',
    //        labelMargin: 8
    //    },
    //    series: {
    //        shadowSize: 1
    //    },
    //    legend: {
    //        show: true,
    //        noColumns: 2,
    //        container: "#legend-container"
    //    }
    //});
    //
    //$.each(flowBarChart.getData()[0].data, function(i, el){
    //    var o = flowBarChart.pointOffset({x: el[0], y: el[1]});
    //    $('<div class="data-point-label text-danger">' + moneyFormat(el[1]) + '</div>').css( {
    //        position: 'absolute',
    //        left: o.left - 20,
    //        top: o.top - 20,
    //        display: 'none'
    //    }).appendTo(flowBarChart.getPlaceholder()).fadeIn('slow');
    //});
});