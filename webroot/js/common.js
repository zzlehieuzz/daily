$(function () {
    $('form').submit(function(e) {
        processPage();
    });

    $('a[href]:not([href^="#"], [href=""])').click(function(){
        processPage();
    });

    $('#popup-confirm #btn-popup-confirm-yes').click(function() {
        var func = $(this).attr('func');
        if(func) {
            $(this).addClass('disabled').attr('disabled', 'disabled');
            eval(func);
        }
    });

    $('.s-popup-del').click(function(e) {
        openPopupConfirm('Delete. Is it OK.');
        var func = $(this).attr('func');
        if(func) {
            $('#popup-confirm #btn-popup-confirm-yes').attr('func', func);
        }
    });

    $('#popup-confirm').on('hidden.bs.modal', function (event) {
        clearPopupConfirm();
    });
});

function checkToDelete(me) {
    openPopupConfirm('Delete. Is it OK.');
    me = $(me);
    $(me).addClass('deleting');
}

function clearPopupConfirm(name) {
    name = typeof name !== 'undefined' && name ? name : '#popup-confirm';

    $(name + ' #btn-popup-confirm-yes')
        .removeClass('disabled')
        .removeAttr('disabled')
        .removeAttr('func');
}

function apiLoad(requestPath, params, callBackFunc, obj) {
    var error500 = $('#error-url').attr('error-500');
    $.getJSON(requestPath, params, function (data, textStatus, jqXHR) {
        if (textStatus == "success") {
            if (callBackFunc) {
                callBackFunc(data, obj);
            }
        } else {
            //window.location.replace(error500);
        }
    }).fail(function (jqXHR, textStatus, error) {
        //window.location.replace(error500);
    });
}

function apiPost(requestPath, params, callBackFunc, obj) {
    var error500 = $('#error-url').attr('error-500');
    $.post(requestPath, params, function (data, textStatus, jqXHR) {
        if (textStatus == "success") {
            if (callBackFunc) {
                callBackFunc(data, obj);
            }
        } else {
            //window.location.replace(error500);
        }
    }, 'json').fail(function (jqXHR, textStatus, error) {
        //window.location.replace(error500);
    });
}

function apiPostData(requestPath, params, callBackFunc, obj) {
    var error500 = $('#error-url').attr('error-500');
    $.ajax({
        url: requestPath,
        type: 'POST',
        data:  params,
        mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        success: function(data, textStatus, jqXHR) {
            try {
                data = $.parseJSON(data);
                if (textStatus == "success") {
                    if (callBackFunc) {
                        callBackFunc(data, obj);
                    }
                } else {
                    //window.location.replace(error500);
                }
            } catch (e) {
                //window.location.replace(error500);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //window.location.replace(error500);
        }
    });
}

function openPopupAlert(msg, name) {
    name = typeof name !== 'undefined' && name ? name : '#popup-normal-alert';
    $(name).find('#msg').text(msg);
    $(name).modal('show');
}

function openPopupConfirm(msg, name) {
    name = typeof name !== 'undefined' && name ? name : '#popup-confirm';
    $(name).find('#msg').text(msg);
    $(name).modal('show');
}

function closePopupConfirm(name) {
    name = typeof name !== 'undefined' && name ? name : '#popup-confirm';
    clearPopupConfirm();
    $(name).find('#msg').text('');
    $(name).modal('hide');
}

// ファイルサイズ表示
function formatBytes(bytes, decimals) {
    if(bytes == 0) return '0 Byte';
    var k = 1000; // or 1024 for binary
    var dm = decimals + 1 || 3;
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    var i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

function processPage() {
    $('#process-content').modal('show');
}

function disableProcessPage() {
    $('#process-content').modal('hide');
}

function escapeHtml(text) {
    'use strict';
    return text.replace(/[\"&'\/<>]/g, function (a) {
        return {
            '"': '&quot;', '&': '&amp;', "'": '&#39;',
            '/': '&#47;',  '<': '&lt;',  '>': '&gt;'
        }[a];
    });
}

function moneyFormat(value) {
    var currencyType = $('#data-currency').val();
    //if(val == '¥' && v >= 100 && v < 1000) {
    //    return val + " " + v.toString().replace("0000", "百");
    //} else if(val == '¥' && v >= 1000 && v < 10000) {
    //        return val + " " + v.toString().replace("0000", "千");
    //}  else if(val == '¥' && v >= 10000 && v < 100000) {
    //        return val + " " + v.toString().replace("0000", "万");
    //} else {
        return accounting.formatMoney(value, currencyType + " ", 0);
    //}
}

function pr(msg) {
    console.log(msg);
}
