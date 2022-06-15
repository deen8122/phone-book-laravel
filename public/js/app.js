var token= null;

function initApp(){
    console.log("init app");
    getData();
}

function getData(){
    doRequest('/api/cards','GET',{},(result)=>{
        console.log(result);
        renderCardsList(result.data);
    });
}

function renderCardsList(dataArray){
    let html = '<table class=" table-cards">';
    for(let i = 0; i < dataArray.length ; i++){
        let obj = dataArray[i];
        html+=
            '<tr>' +
            '<td class="image">'+(obj.imageFullPath?'<img src="'+obj.imageFullPath+'" >':'')+'</td>' +
            '<td class="name">'+obj.name+'</td>' +
            '<td class="phone">'+obj.phone+'</td>' +
            '<td class="text">'+obj.description+'</td>' +
            '</tr>';
    }
    html+= '</table>';
    $('#phone_books_items').html(html);
}
$(document).ready(function(){
    initApp();
    $('.add-card-form').submit(function(){
        console.log(new FormData(this));
        doRequest('/api/cards','POST',new FormData(this),()=>{
            getData();
        },
            (error)=>{
               console.log(error);
               alert("Ощибка добавления. Проверьте входные данные");
            });
        return false;
    });
});


function doRequest(url, method, data,success, error) {
    console.log('-- doRequest ' + method + ' ' + url + ' --');
    let csrf = $('meta[name="csrf-token"]').attr('content');
    console.log('-- ' + csrf + ' --');
   // data._token = csrf;
    $.ajax({
        type: method,
        enctype: 'multipart/form-data',
        datatype: "json",
        contentType: false,
        processData:false,
        data: data, url: url,
        success: function (responce) {
            console.log(url + '-- success --');
            console.log(responce);
            if (success) {
                success(responce);
            }

        },
        error: function (responce) {
            console.log(url + '-- error --');
            console.log(responce.responseJSON);
            if (error) {
                error(responce)
            }

        }
    });
}
