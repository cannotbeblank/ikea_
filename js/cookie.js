//封装 添加 cookie
//'name=ws;path=/;expires=10'
function setCookie(cName,cValue,cTime){
    var d = new Date();
    d.setDate(d.getDate() + cTime);
    document.cookie = cName + '=' + cValue + ';path=/;expires=' + d.toGMTString();
}


//读取cookie
//"sex=nan; name=wangshuai; password=8888; id=1000000000; age=2"
function getCookie(cName){
    //获取所有的cookie
    var cookieStr = document.cookie;
    var cookieArr = cookieStr.split("; ");
 //遍历数组
    for(var i = 0 ,k = cookieArr.length ; i < k ; i++ ){
        if(cookieArr[i].split("=")[0] == cName){
            // console.log(cookieArr[i].split("=")[1])
            return cookieArr[i].split("=")[1]
        }
    }
}
// getCookie('time')


//删除cookie//设置成过期
function delCookie(cName){
    setCookie(cName,null,-1);
}