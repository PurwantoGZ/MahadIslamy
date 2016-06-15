function showAuthor () {
     myajax=createAjax();
     var url="../control/showInventory.php";
     url=url+"?showid=1";
     url=url+"&sid="+Math.random();
     myajax.onreadystatechange=stateChangedAuthor;
     myajax.open("GET",url,true);
     myajax.send(null);
}

function cobaAlert () {
     myajax=createAjax();
     var url="control/showInventory.php";
     url=url+"?showid=1";
     url=url+"&sid="+Math.random();
     myajax.onreadystatechange=stateChangedAuthor;
     myajax.open("GET",url,true);
     myajax.send(null);
     alert("GAGGAL");

}
var ajaxku;
function createAjax(){
    if (window.XMLHttpRequest){
    return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
function stateChangedAuthor(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("AuthorSelect").innerHTML = data
    }else{
    document.getElementById("AuthorSelect").value = "<option selected>Pilih Penulis</option>";
    }
    }
}

function stateChangedKec(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kec").innerHTML = data
    }else{
    document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
    }
    }
}

function stateChangedKel(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kel").innerHTML = data
    }else{
    document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
    }
}