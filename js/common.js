function bchome(){
    this.logo = document.querySelector('.ikealogo');
    this.init();
}
bchome.prototype = {
    init : function(){
        this.eventbind();
    },
    func : function(){
            location.href = "http://127.0.0.1/work/ikea.html";
    },
    eventbind : function(){
        addEventListener(this.logo,'click',this.func.bind(this))
    }
}
new bchome();

// 登录处显示用户名
function showuser(){
    this.exitbtn = document.querySelector('.exitlogin');
    this.init();
}
showuser.prototype = {
    init : function(){
        this.func();
    },
    func : function(){
        if(sessionStorage.zhangh){
            ishowun.innerHTML = sessionStorage.zhangh;
            this.exitbtn.className = 'exitlogin';
        }else{
            
            this.exitbtn.className += ' mhide';
        }
    }
}
new showuser();

//退出登录
function exitlogin(){
    this.exitbtn = document.querySelector('.exitlogin');
    this.init();
}
exitlogin.prototype = {
    init : function(){
        this.eventbind();
    },
    func : function(){
        delCookie('zhangh');
        delCookie('mima');
        sessionStorage.removeItem('zhangh');
        ishowun.innerHTML = '登录';
        this.exitbtn.className = 'exitlogin mhide';
    },
    eventbind : function(){
        addEventListener(this.exitbtn,'click',this.func.bind(this))
    }
}
new exitlogin();

// 搜索框
// var oInputBox = document.querySelector('.headsec .inputBox'),
// oUserList = document.querySelector('.headsec #userList');
// oInputBox.oninput = function(){
// var script = document.createElement('script');
// script.src = "http://suggest.taobao.com/sug?code=utf-8&q="+this.value+"&callback=handle";
// document.body.appendChild(script);
// script.onload = function(){
//     script.remove();
// }
// }
// function handle(data){
// console.log(data)
// }
// 
function scarchBox(){
    this.oInputBox = document.querySelector('.headsec .inputBox'),
    this.init();
}
scarchBox.prototype = {
    init : function(){
        this.eventbind();
    },
    main : function(){
        var script = document.createElement('script');
        script.src = "http://suggest.taobao.com/sug?code=utf-8&q="+this.oInputBox.value+"&callback=handle";
        document.body.appendChild(script);
        script.onload = function(){
            script.remove();
        }
    },
    // handle : function(data){
    //     console.log(data)
    // },
    eventbind : function(){
        var _this = this;
        this.oInputBox.oninput = function(){
            _this.main()
        }
    }
}
new scarchBox();

function handle(data){
    var oUserList = document.querySelector('.headsec #userList');
    var str = '';
    for(i = 0 ,  k = data.result.length ; i < k ; i++){
        str += `
            <option value="${data.result[i][0]}"></option>
        `
    }
    oUserList.innerHTML = str;
}

// http://suggestion.baidu.com/su?wd=手机&cb=回调函数名
// 点击搜索
function clickSearch(){
    this.oInputBox = document.querySelector('.headsec .inputBox'),
    this.searchBtn = document.querySelector('.searchBtn');
    this.init();
}
clickSearch.prototype = {
    init : function(){
        this.eventbind();
    },
    main : function(){
        if(this.oInputBox.value){
            var str = "https://www.baidu.com/s?wd=" + this.oInputBox.value + '%20site:www.ikea.cn'
            window.open(str);
        }
    },
    eventbind : function(){
        var _this = this;
        this.searchBtn.onclick = function(){
            _this.main();
        }
    }
}
new clickSearch();