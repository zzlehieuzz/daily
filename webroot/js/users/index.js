$(function () {

});

function delUser(id) {
    if(id) {
        processPage();
        apiPost($('#hidden-url').attr('delete-url'), {id: id}, function (res) {
            closePopupConfirm();
            //window.location.reload();
            disableProcessPage();
        });
    }
}
