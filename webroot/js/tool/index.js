$(function() {
    var data =  $.parseJSON($('#data-percent').val());

    $.plot($("#flot-pie-chart"), data, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0% [ %s ]",
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });
});