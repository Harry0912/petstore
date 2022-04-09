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
// function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
// }

// 最新消息新增、編輯
$('#newsForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let url = $(this).attr('action');
    let msg = "新增成功";
    if (url.indexOf("update") != -1) msg = "修改完成";

    $.ajax({
        url: url,
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function() {
            success_alert(msg);
            setTimeout(function() {
                location.href = "/news_list"
            }, 1500);
        },
        error: function(msg) {
            errorMessage(msg);
        }
    });
});

//最新消息-刪除
$('button[name="newsDelete"]').each(function() {
    $(this).click(function() {
        let id = $(this).parent().parent().find('input[name="news_id"]').val();
        let title = $(this).parent().parent().find('input[name="news_title"]').val();
        let url = '/news_delete/'+id;
        warning_alert('確定要刪除"'+title+'"消息?', url, id, "/news_list");
    });
});

//消息搜尋
$('#news_search').click(function(e) {
    e.preventDefault();

    let keyword = $('#news_keyword').val().trim();
    let url = '/news_list';
    let method = 'get';
    if (keyword != '') {
        url = '/news_search/'+keyword;
        method = 'post';
    }

    $.ajax({
        url: url,
        type: method,
        data: {keyword : keyword},
        success: function(data) {
            $('body').html(data);
            if (keyword != '') $('#news_keyword').val(keyword);
        }
    });
});

//產品分類-新增
$('#typeAddForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let url = $(this).attr('action');
    let type_name = $('input[name="type_name"]').val().trim();

    let isError = false;
    $('input[name="type_name[]"]').each(function() {
        if ($(this).val() == type_name) {
            isError = true;
            return false;
        }
    });

    if (!isError) {
        $.ajax({
            url: url,
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                success_alert("新增成功");
                setTimeout(function() {
                    location.href = '/type_list';
                }, 1500)
            },
            error: function(msg) {
                errorMessage(msg);
            }
        });
    } else {
        Swal.fire({
            title : '欄位名稱已存在',
            icon : 'error',
            timer : 1500
        });
    }
});

//分類編輯
$('#typeEditForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let url = '/type_update';

    let isError = false;
    $('input[name="type_name[]"]').each(function() {
        if ($(this).val().trim() == '') {
             isError = true;
             return false;
        }
    });

    if (!isError) {
        $.ajax({
            url: url,
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                success_alert('儲存成功');
                setTimeout(function() {
                    location.href = '/type_list';
                }, 1500);
            },
            error: function(msg){
                errorMessage(msg);
            }
        });
    } else {
        Swal.fire({
            title : '欄位不可為空',
            icon : 'error',
            timer : 1500
        });
    }
    
});

//產品分類-刪除
$('button[name="typeDelete"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();

        let id = $(this).parent().parent().find('input[name="type_id[]"]').val();
        let name = $(this).parent().parent().find('input[name="type_name[]"]').val();
        let url = '/type_delete/'+id;

        warning_alert('確定要刪除"'+name+'"類別?', url, id, "/type_list");
    });
});

//產品-新增、修改
$('#productForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let url = $(this).attr('action');
    let msg = "新增成功";
    if (url.indexOf("update") != -1) msg = "修改完成";

    let on_sale = $('input[name="on_sale"]').prop('checked');
    let discount_price = $('input[name="discount_price"]').val();
    if (on_sale && discount_price == '') {
        Swal.fire({
            title : '特價開關開啟時，特價欄位不可為空',
            icon : 'error',
            timer : 1500
        });
        return false;
    }

    $.ajax({
        url: url,
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function() {
            success_alert(msg);
            setTimeout(function() {
                location.href = "/product_list";
            }, 1500)
        },
        error: function(msg){
            errorMessage(msg);
        }
    });
});

//產品-新增
// $('#productAdd').click(function(e) {
//     e.preventDefault();
//     ajaxSetup();

//     let url = '/product_add/store';
//     let type = $('#product_type').val();
//     let title = $('#product_title').val();
//     // let intro = $('#product_intro').val();
//     let intro = $('input[name="product_intro"]:checked').val();
//     let ingredients = $('#product_ingredients').val();
//     let weight = $('#product_weight').val();
//     let content = $('#product_content').val();
//     // let image = $('#product_image').val();
//     console.log(image);
//     // return false;

//     $.ajax({
//         url: url,
//         method: 'post',
//         data: {
//             type_id : type,
//             product_title : title,
//             product_intro : intro,
//             product_ingredients : ingredients,
//             product_weight : weight,
//             product_content : content,
//             product_image : image
//         },
//         success: function() {
//             success_alert("新增成功");
//             setTimeout(function() {
//                 location.href = "/product_list";
//             }, 1500)
//         }
//     })
// });

//產品-修改
// $('#productEdit').click(function(e) {
//     e.preventDefault();
//     ajaxSetup();

//     let id = $('#product_id').val();
//     let type_id = $('#product_type').val();
//     let title = $('#product_title').val();
//     let intro = $('input[name="product_intro"]:checked').val();
//     let ingredients = $('#product_ingredients').val();
//     let weight = $('#product_weight').val();
//     let content = $('#product_content').val();
//     let url = '/product_update/'+id;

//     $.ajax({
//         url: url,
//         method: 'patch',
//         data: {
//             id : id,
//             type_id : type_id,
//             product_title : title,
//             product_intro : intro,
//             product_ingredients : ingredients,
//             product_weight : weight,
//             product_content : content,
//         },
//         success: function() {
//             success_alert("修改完成");
//             setTimeout(function() {
//                 location.href = '/product_list';
//             }, 1500)
//         }
//     })
// });

//產品-刪除
$('button[name="productDelete"]').each(function() {
    $(this).click(function(e) {
        e.preventDefault();

        let id = $(this).parent().parent().find('input[name="product_id"]').val();
        let title = $(this).parent().parent().find('input[name="product_title"]').val();
        let url = '/product_delete/'+id;
        warning_alert('確定要刪除"'+title+'"產品?', url, id, "/product_list");
    });
});

//產品圖片上傳同步顯示於img中
$('input[name="product_image"]').change(function(e) {
    readURL(e.target);
});

function readURL(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#img").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

//首頁資訊編輯
$('#btnEdit').click(function() {
    $('#infoList').hide();
    $('#infoEdit').show();
});

//首頁資訊更新
$('#btnUpdate').click(function() {
    let title = $('#title').val();
    let tel = $('#tel').val();
    let fax = $('#fax').val();
    let email = $('#email').val();
    let address = $('#address').val();

    $.ajax({
        url: '/update',
        method: 'post',
        data: {
            title : title,
            tel : tel,
            fax : fax,
            email : email,
            address : address
        },
        success: function() {
            $('#infoList').show();
            $('#infoEdit').hide();
            
            $('#info_title').text(title);
            $('#info_tel').text(tel);
            $('#info_fax').text(fax);
            $('#info_email').text(email);
            $('#info_address').text(address);
        }
    });
});

//產品搜尋
$('#product_search').click(function(e) {
    e.preventDefault();

    let keyword = $('#product_keyword').val().trim();
    let url = '/product_list';
    let method = 'get';
    if (keyword != '') {
        url = '/product_search/' + keyword;
        method = 'post';
    } 

    $.ajax({
        url: url,
        method: method,
        data: {keyword : keyword},
        success: function(data) {
            $('body').html(data);
            if (keyword != '') $('#product_keyword').val(keyword);
        }
    });
});

//聯絡我們
$('#contactForm').on('submit', function(e) {
    e.preventDefault();

    let formData = new FormData($(this)[0]);
    let url = $(this).attr('action');

    $.ajax({
        url: url,
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function() {
            success_alert('信件寄出成功!!');
            setTimeout(function() {
                location.href = '/contact';
            }, 1500);
        },
        error: function(msg){
            errorMessage(msg);
        }
    })
});

// $('#captcha_img').click(function() {
//     let url = '/captcha/default?';
//     $(this).attr('src', url + Math.random());
// });

$('#accordionFlushExample').sortable();

$('.list-group').sortable();