$("#switch").click(function () {
    var mycheck = ($("#switch").prop("checked") == true ? '1' : '0');
    if (mycheck == 0) {
        document.body.style.backgroundColor = 'white';
    }
    else {
        document.body.style.backgroundColor = 'black';
    }
   
});