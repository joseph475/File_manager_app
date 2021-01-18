var curpage = 1;
sessionStorage.setItem('cursection', 1);

function format_date(date1){
    var today = new Date(date1);
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    
    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    } 

    mydate = yyyy + '-' + mm + '-' + dd;
    return mydate;
}