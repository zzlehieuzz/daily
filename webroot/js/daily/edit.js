$(function () {
    $('#daily-load').click(function() {
        var rowId = '';

        if($('table .selected').length <= 0) {
            openPopupAlert('No selected record');
            return false;
        }

        $('table .selected').each(function(i, v) {
            if(i == 0) {
                rowId = $(v).attr('row-id');
            } else {
                $(v).removeClass('selected');
            }
        });
        if(!rowId || rowId == '' || typeof(rowId) == undefined) {
            openPopupAlert('No selected record');
            return false;
        }

        processPage();

        apiLoad($('#url').attr('load-url'), {'id': rowId}, function(res) {
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

    $('.daily-row').click(function() {
        if($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $(this).addClass('selected');
        }
    });

    $('#daily-delete').click(function() {
        if($('table .selected').length <= 0) {
            openPopupAlert('No selected record');
            return false;
        }

        openPopupConfirm('Delete. Is it OK.');
        $('#popup-confirm #btn-popup-confirm-yes').attr('func', 'processDelete()');
    });
});

function processDelete() {
    var aryId = [];

    if($('table .selected').length <= 0) {
        return false;
    }

    $('table .selected').each(function(i, v) {
        var rowId = $(v).attr('row-id');
        if(rowId && rowId != '' && typeof(rowId) != undefined) {
            aryId.push(rowId);
        }
    });
    if(aryId.length <= 0) {
        return false;
    }
    processPage();
    apiPost($('#url').attr('delete-url'), {aryId: aryId}, function (res) {
        closePopupConfirm();
        window.location.reload();
        disableProcessPage();
    });
}


