//新增、修改成功彈跳視窗
function success_alert(msg) {
    Swal.fire({
        title : msg,
        icon : 'success'
    });
}

//刪除彈跳視窗
function warning_alert(msg, url, id, returnUrl) {
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
                data: {'id' : id},
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

//csrf
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

$('#btnEdit').click(function() {
    $('#infoList').hide();
    $('#editForm').show();
});

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
            setTimeout(function() {
                // $('#infoList').show();
                // $('#editForm').hide();
            }, 1500);
        }
    });
});

$('#newsForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);

    $.ajax({
        url: '/api/news/add',
        method: 'post',
        data: formData,
        contentType : false,
        processData: false,
        success: function(response) {
            console.log(response);
            console.log(JSON.stringify(response));
            // return false;
        }
    });
});

//產品圖片上傳同步顯示於img中
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