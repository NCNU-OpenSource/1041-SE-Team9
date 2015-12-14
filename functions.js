var visible=false;//可種植列表的狀態(隱藏或顯示)
var tmp;//暫存
var plantid;
var growTime;
var landId;
window.onload = function(){
    for(var i=1;i<=25;i++){
        if(document.getElementById("land"+i).title=="生長中"){
            landid=i;
            var countdown = new Countdown({
                selector: "#land"+i,
                msgPattern: "{minutes} 分 {seconds} 秒",
                dateStart: new Date(),
                dateEnd: new Date((document.getElementById("land"+i).value)*1000),
                msgBefore: null,
                msgAfter: "完成",
                onEnd: function(){
                    setTimeout(function(){ location.reload(true); }, 1000);
                    /*var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            document.getElementById("demo").innerHTML = xhttp.responseText;
                            console.log("check123");
                            //location.reload(true);
                        }
                    };
                    console.log("check");
                    xhttp.open("GET", "checklandstatus.php", true);
                    xhttp.send();*/
                    //location.reload(true);
                    //location.href="main.php";
                }
            });
        }
    }
}
function checklandstatus(landid){
    /*var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //document.getElementById("demo").innerHTML = xhttp.responseText;
            location.reload(true);
        }
    };
    xhttp.open("GET", "checklandstatus.php", true);
    xhttp.send();*/
}
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
    //var landIdShow = this.getAttribute ("data");
    console.log(landIdShow);
    document.getElementById("whichland").innerHTML = landIdShow+"號農地";
    landId=landIdShow;
    if(visible==false){
        document.getElementById("plantlist").style.visibility = "visible";
        visible=!visible;
    }
    else if(visible==true){
        if(landIdShow!=tmp){
            document.getElementById("whichland").innerHTML = landIdShow+"號農地";
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
    console.log(plantid);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //document.getElementById("demo").value = xhttp.responseText;
            location.reload(true);
        }
    };
    xhttp.open("GET", "grow.php?plantid="+plantid+"&landid="+landId, true);
    xhttp.send();
}
function get(landId){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            //document.getElementById("demo").value = xhttp.responseText;
            location.reload(true);
        }
    };
    xhttp.open("GET", "get.php?landid="+landId, true);
    xhttp.send();
}