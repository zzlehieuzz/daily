$(function () {
    $('.daily-row').click(function() {
        processPage();
        console.log('processPage');
        apiLoad($('#url').attr('load-url'), {'int_Id': $(this).attr('row-id')}, function(res) {
            if(res.status) {
                $('#id').val(res.data.id);
                $('#category-id').val(res.data.category_id);
                $('#date-process').val(res.data.date_process);
                $('#amount').val(res.data.amount);
                $('#description').val(res.data.description);
            } else {
                window.location.reload();
            }
            disableProcessPage();
        });
    });

    $('#btn-save').click(function(e) {
        var formData = new FormData();
        var aryFormIndication = $('#edit-daily').serializeArray();

        $.each(aryFormIndication, function(index, formIndication) {
            if(formIndication.name != '_method') {
                formData.append(formIndication.name, formIndication.value);
            }
        });
        processPage();
        apiPostData($('#url').attr('process-edit-url'), formData, function(res) {
            if(res.status === true) {

            } else {

                disableProcessPage();
            }
        });
    });
});


