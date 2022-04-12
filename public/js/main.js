//新增、修改成功彈跳視窗
function success_alert(msg) {
    Swal.fire({
        title : msg,
        icon : 'success',
        timer : 1500
    });
}

//刪除彈跳視窗
function warning_alert(msg, url, returnUrl) {
    Swal.fire({
        title: msg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '確認刪除',
        cancelButtonText: '取消'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: 'delete',
                success: function() {
                    Swal.fire(
                        '刪除成功'
                    )
                    setTimeout(function() {
                        location.href = returnUrl;
                    }, 1500);
                }
            });
        }
    })
}

//錯誤訊息彈跳視窗
function errorMessage(msg)
{
    let errMsg = JSON.parse(msg.responseText)['errors'];
    let message = '';
    $.each(errMsg, function(index, value) {
        message += value+'<br>';
    });

    Swal.fire({
        title : message,
        icon : 'error'
    });
}

//圖片上傳同步顯示於img中
$('input[name="news_image"]').change(function(e) {
    readURL(e.target);
});

function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#news_img").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

//csrf
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

// $('#btnEdit').click(function() {
//     $('#infoList').hide();
//     $('#editForm').show();
// });

//首頁資訊編輯
$('#editForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);

    $.ajax({
        url: '/api/update/1',
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            success_alert('修改完成!');
        }
    });
});

$('#checkAll').click(function() {
    if ($(this).prop('checked')) {
        $('input[type="checkbox"]').prop('checked', true);
    } else {
        $('input[type="checkbox"]').prop('checked', false);
    }
});

//最新消息新增、編輯
$('#newsForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let news_id = $('#news_id').val();
    let url = '/api/news/add';
    if (news_id != '') url = '/api/news/update/'+news_id;

    $.ajax({
        url: url,
        method: 'post',
        data: formData,
        contentType : false,
        processData: false,
        success: function(response) {
            success_alert('儲存成功!');
            setTimeout(function() {
                location.href = '/news/table';
            }, 1500);
        },
        error: function(xhr) {
            errorMessage(xhr);
        }
    });
});

//最新消息刪除
$('a[name="news_delete"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();
        
        let msg = '確定要刪除"'+$(this).parent().prev().prev().prev().text()+'"消息?';
        let url = '/api' + $(this).attr('href');
        let returnUrl = '/news/table';

        warning_alert(msg, url, returnUrl);
    });
});

//多筆刪除
$('#btnDelete').click(function() {
    let news_id_array = [];
    $('input[type="checkbox"]').not($('#checkAll')).each(function() {
        if ($(this).prop('checked')) {
            news_id_array.push($(this).val());
        }
    });

    if (news_id_array.length == 0) {
        Swal.fire({
            title : '尚未勾選任何消息',
            icon : 'error',
            timer : 1500
        });
    } else {
        let msg = '確定要刪除勾選的消息?';
        let url = '/api/news/delete/'+news_id_array;
        let returnUrl = '/news/table';
        
        warning_alert(msg, url, returnUrl);

        // $.ajax({
        //     url: '/api/news/delete/'+news_id_array,
        //     method: 'delete',
        //     success: function() {
        //         success_alert('刪除成功!');
        //         setTimeout(function() {
        //             location.href = '/news/table';
        //         }, 1500);
        //     }
        // });
    }
});

//聯絡我們-發送mail
$('#contactForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let url = '/api/contact/send';

    $.ajax({
        url: url,
        method: 'post',
        data: formData,
        contentType : false,
        processData: false,
        success: function(response) {
            success_alert('信件寄出成功!');
            setTimeout(function() {
                location.href = '/contact/form';
            }, 1500);
        }
    });
});

$('#replyForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let url = '/api/contact/reply';

    $.ajax({
        url: url,
        method: 'post',
        data: formData,
        contentType : false,
        processData: false,
        success: function() {
            success_alert('回覆信件寄出成功!');
            setTimeout(function() {
                location.reload();
            }, 1500);
        }
    });
});

$('a[name="contact_delete"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();

        let msg = '確定要刪除留言??';
        let url = '/api' + $(this).attr('href');
        let returnUrl = '/contact/table';

        warning_alert(msg, url, returnUrl);
    });
});