$(function () {
    $("#id").change(function() {
        var option = $(this).find('option:selected');
        if($(option).text()) {

            pr($('#hidden-url').attr('load-url') + '/' + $(option).text());
            processPage();
            window.location.href = $('#hidden-url').attr('load-url') + $(option).text();
        }
    });
});


