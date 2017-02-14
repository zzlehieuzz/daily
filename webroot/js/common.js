$(function () {
    $('form').submit(function(e) {
        processPage();
    });

    $("#header-text").text($("#title-header").text());
});

function checkToDelete(me) {
    openPopupConfirm('Delete. Is it OK.');
    me = $(me);
    $(me).addClass('deleting');
}

// AJAXのGETリクエスト
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

// AJAXのPOSTリクエスト
function apiPost(requestPath, params, callBackFunc, obj) {
    var error500 = $('#error-url').attr('error-500');
    $.post(requestPath, params, function (data, textStatus, jqXHR) {
        if (textStatus == "success") {
            if (callBackFunc) {
                callBackFunc(data, obj);
            }
        } else {
            window.location.replace(error500);
        }
    }, 'json').fail(function (jqXHR, textStatus, error) {
        window.location.replace(error500);
    });
}

// DataのPOSTリクエスト
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

// ポップアップメッセージを表示する
function openPopupAlert(msg, name) {
    name = typeof name !== 'undefined' && name ? name : '#popup-normal-alert';
    $(name).find('#msg').text(msg);
    $(name).modal('show');
}

// ポップアップ確認メッセージを表示する
function openPopupConfirm(msg, name) {
    name = typeof name !== 'undefined' && name ? name : '#popup-confirm';
    $(name).find('#msg').text(msg);
    $(name).modal('show');
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

// ローディングアイコン表示
function processPage() {
    $('#process-content').show();
}

// ローディングアイコン非表示
function disableProcessPage() {
    $('#process-content').hide();
}

// escapeHTML文字
function escapeHtml(text) {
    'use strict';
    return text.replace(/[\"&'\/<>]/g, function (a) {
        return {
            '"': '&quot;', '&': '&amp;', "'": '&#39;',
            '/': '&#47;',  '<': '&lt;',  '>': '&gt;'
        }[a];
    });
}

