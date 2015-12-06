var visible=false;//可種植列表的狀態(隱藏或顯示)
var tmp;//暫存
var plantid;
var landId;
function unlock(landIdShow) {//解鎖農地
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //document.getElementById("demo").innerHTML = xhttp.responseText;
            location.reload(true);
        }
    };
    xhttp.open("GET", "unlock.php?landid="+landIdShow, true);
    xhttp.send();
}
function show(landIdShow){//顯示可種植列表
    //var land=document.getElementById("land"+landid);
    document.getElementById("whichland").innerHTML = landIdShow+1 +"號農地";
    landId=landIdShow;
    if(visible==false){
        document.getElementById("plantlist").style.visibility = "visible";
        visible=!visible;
    }
    else if(visible==true){
        if(landIdShow!=tmp){
            document.getElementById("whichland").innerHTML = landIdShow+1 +"號農地";
            landId=landIdShow;
        }
        else{
            document.getElementById("plantlist").style.visibility = "hidden";
            visible=!visible;
        }
    }
    tmp=landIdShow;
}
function getValue(Value){//取得玩家要種植哪一個作物
    plantid=Value;
}
function grow(){//種植作物
    console.log(landId);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("demo").innerHTML = xhttp.responseText;
            //location.reload(true);
        }
    };
    xhttp.open("GET", "grow.php?plantid="+plantid+"&landid="+landId, true);
    xhttp.send();
}