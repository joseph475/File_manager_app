$(document).ready(function(){ loadFiles(curpage) });
$(document).on('click', '.preview_asset', function(){
    var filetype = $(this).attr('data-type');
    var userId = $(this).attr('data-userId');
    var filename = $(this).html();
    // alert($filename);

    switch(filetype){
        case 'jpg':
            $('#modal1 .file_prev').html(`<img src="/storage/files_uploaded/${userId}/${filename}"/>`)
        break;
        case 'mp4':
            $('#modal1 .file_prev').html(`<video width="320" height="240" controls><source src="/storage/files_uploaded/${userId}/${filename}" type="video/mp4"></video>`)
        break;
        case 'pdf':
            $('#modal1 .file_prev').html(`<embed src="/storage/files_uploaded/${userId}/${filename}" width="800px" height="1000px" />`)
            
        default:
    }
    // console.log(`<img src="/storage/files_uploaded/${userId}/${filename}"/>`);
})
$(document).on('click', '#searchbtn', function(){
    let search = $('input[name="search"]').val();
    loadFiles(search);
});

$("#filetype").on('change', function () {
    loadFiles(curpage);
    $('input[name="search"]').val('');
});

$('input[name="search"]').keypress(function (e) {
    var key = e.which;
    let search = $('input[name="search"]').val();
    
    if (key == 13) { 
        e.preventDefault();
        loadFiles(curpage, search);
    }
    
});

function loadFiles(curpage, search = ''){
    sessionStorage.setItem("curpage", curpage);
    $.ajax({
        url: '/FilterMasterlist',
        data: {
            page: curpage,
            search: search,
            filter: $("#filetype").val()
        },
        type: 'get',
        dataType: 'json',
        success: function (data) {
            loopFiles(data.data);
            $.getScript("js/pagination.js", function () {  // load pagination
                createPagination(data.last_page, "loadFiles", search);
                $('#page_' + curpage).addClass("activePage");
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
};

function loopFiles(data){
    $('#myTbody').html("");
    var userid = $('.user').attr('data-userId');
    var myFiles = "";
    for (var i = 0; i < data.length; i++) {
        var id = data[i].id,
            filename = data[i].filename,
            title = data[i].title,
            description = data[i].description;
            created_at = data[i].created_at;
            filetype = data[i].filetype;

            myFiles += "<tr>" +
            // `<td><a class="blue-text" href="/storage/${userid}/${filename}" target="_blank">${filename}</a></td>` +
            `<td><a class="blue-text preview_asset modal-trigger" data-type="${filetype}" data-userId="${userid}" href="#modal1">${filename}</a></td>` +
            `<td>${title}</td>` +
            `<td>${description}</td>` +
            `<td>${format_date(created_at)}</td>` +
            '</tr>'
    }
    $('#myTbody').append(myFiles);
}


