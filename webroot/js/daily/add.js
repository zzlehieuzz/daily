$(function () {
    $('#date-process').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: $.now(),
        ignoreReadonly: true
    }).change(function () {

    });
});


