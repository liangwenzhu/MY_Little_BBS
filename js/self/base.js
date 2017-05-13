window.onload = function()
{
    if (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.split(";")[1].replace(/[ ]/g, "") == "MSIE6.0" || navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.split(";")[1].replace(/[ ]/g, "") == "MSIE7.0" || navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.split(";")[1].replace(/[ ]/g, "") == "MSIE8.0") {
        alert("对不起，检测到浏览器为IE8或以下，请升级浏览器");
        window.location.href = 'http://www.googlechromer.cn/';
    }
};

/*开启模态窗*/
$.fn.modalWindowOpen = function(windowBackground,modalFatherClass,modalWindowClass,displayNoneClass,modalShowAnimationClass){
    $(this).click(function(){
        $(windowBackground).show();//打开遮罩层
        $(modalFatherClass).children().addClass(displayNoneClass);//隐藏所有模态窗
        $("*").removeClass(modalShowAnimationClass);//重置动画
        $(modalWindowClass).removeClass(displayNoneClass);//打开所需要的模态窗
        $(modalWindowClass).addClass(modalShowAnimationClass);//添加所需要的动画类
    });
};
function PostTieZiAction(windowBackground,modalFatherClass,modalWindowClass,displayNoneClass,modalShowAnimationClass){
        $(windowBackground).show();//打开遮罩层
        $(modalFatherClass).children().addClass(displayNoneClass);//隐藏所有模态窗
        $("*").removeClass(modalShowAnimationClass);//重置动画
        $(modalWindowClass).removeClass(displayNoneClass);//打开所需要的模态窗
        $(modalWindowClass).addClass(modalShowAnimationClass);//添加所需要的动画类
}
/*关闭模态窗*/
$.fn.modalWindowClose = function(windowBackground,modalFatherClass,displayNoneClass,modalShowAnimationClass) {
    $(this).click(function () {
        $(windowBackground).hide();//关闭遮罩层
        $(modalFatherClass).children().addClass(displayNoneClass);//隐藏所有模态窗
        $("*").removeClass(modalShowAnimationClass);//重置所有动画类
        $(this).parents(".container").children("form").children(".form-group").children("input").val("");
        //alert("123");
        $(this).parent(".top-title").parent(".container").children(".table").children("tbody").children("tr").children("td").children("input").val("");
        $(this).parent(".top-title").parent(".container").children(".table").children("tbody").children("tr").children("td").children("textarea").val("");
    });
};
//IE9兼容input的placeholder属性
function placeholderForIe9(label,input){
    if(navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion .split(";")[1].replace(/[ ]/g,"")=="MSIE9.0"){
        $(label).parents(".form-group").css("position","relative");
        for(var i=0;i<$(label).length;i++){
            var left =  parseInt($(label).eq(i).siblings("input").css("paddingLeft"))+10+"px";
            var top =  $(label).eq(i).css("lineHeight");
            $(label).eq(i).css({
                "position":"absolute",
                "top":top,
                "left":left,
                "opacity":"0.5",
                "cursor":"text",
            });
        }
        $(input).focus(function(){
            $(this).siblings("label").css({
                "display":"none",
            })
        });
        $(input).blur(function(){
            if($(this).val().length == 0){
                $(this).siblings("label").css({
                    "display":"block",
                })
            }else{
                $(this).siblings("label").css({
                    "display":"none",
                })
            }
        });
        $(label).click(function(){
            $(this).siblings(input).trigger("focus");
        })
    }else{
        $(label).css("display","none");
    }
}
$(function () {
    //IE9兼容input的placeholder属性
    placeholderForIe9(
        label= ".register .form-group label",
        input = ".register .form-group input"
    );
    placeholderForIe9(
        label= ".login .form-group label",
        input = ".login .form-group input"
    );
    placeholderForIe9(
        label= ".upload .form-groups label",
        input = ".upload .form-groups input"
    );
});

$(function(){
    $(".modal-windows").children().addClass("displayNone");//将所有子模态窗的设置为display:none.
        $(".close").modalWindowClose(".modal-window",".modal-windows","displayNone","modelShowOut");
        /*注册弹窗*/
        $(".zhuce").modalWindowOpen(".modal-window",".modal-windows",".modal-window .register","displayNone","modelShowOut");
        /*登录弹窗*/
        $(".denglu").modalWindowOpen(".modal-window",".modal-windows",".modal-window .login","displayNone","modelShowOut");
        /*注册成功*/
         $(".register-complete").modalWindowOpen(".modal-window",".modal-windows",".vote-success","displayNone","modelShowOut");
        /*活动流程*/
        $(".huodongliucheng").modalWindowOpen(".modal-window",".modal-windows",".modal-window .activity-flow","displayNone","modelShowOut");
        /*活动通知*/
        $("nav ul .information").modalWindowOpen(".modal-window",".modal-windows",".modal-window .activity-information","displayNone","modelShowOut");

    /*失败情况
    $(".show button").click(function(){
        modalIni();
        $(".modal-window .vote-fail").addClass("modelShowOut");
    });*/
     /*手机顶部缩略*/
   // $(".icon-toggle").modalWindowOpen(".modal-window",".modal-windows",".mobil-toggle","displayNone","modelShowOut");
});

/*移动端导航栏进场*/
function navShow(containerClass,touchClass,topLineClass,bottomLineClass,displayNoneClass,firstAnimationClass,secondAnimationClass,thirdAnimationClass,thirdAnimationOutClass,containerAnimationOutClass,containerAnimationInClass){
    $(containerClass).addClass(displayNoneClass);//增加display:none,防止遮挡
    setTimeout(function(){
        $(containerClass).removeClass(displayNoneClass);
    },0);//移出display:none。
    $(touchClass).removeClass(thirdAnimationOutClass);//初始化动画
    $(containerClass).removeClass(containerAnimationOutClass);//初始化动画
    $(topLineClass).addClass(secondAnimationClass);//添加上横线动画类
    $(bottomLineClass).addClass(firstAnimationClass);//添加下横线动画类
    $(touchClass).addClass(thirdAnimationClass);//添加上下横线父元素动画类
    $(containerClass).addClass(containerAnimationInClass);//添加导航栏进场动画类
}

/*移动端导航栏出场*/
function navHide(containerClass,touchClass,topLineClass,bottomLineClass,displayNoneClass,firstAnimationClass,secondAnimationClass,thirdAnimationClass,thirdAnimationOutClass,containerAnimationOutClass,containerAnimationInClass){
    setTimeout(function(){
        $(containerClass).addClass(displayNoneClass);
    },500);//延迟，先让动画跑完。
    $(touchClass).removeClass(thirdAnimationClass);
    $(bottomLineClass).removeClass(firstAnimationClass);
    $(topLineClass).removeClass(secondAnimationClass);
    $(containerClass).removeClass(containerAnimationInClass);
    /* $(topLineClass).addClass(secondAnimationClass);
     $(bottomLineClass).addClass(firstAnimationClass);不需要*/
    $(touchClass).addClass(thirdAnimationOutClass);
    $(containerClass).addClass(containerAnimationOutClass);
}
/*移动端的动画*/
$(function(){
    $(".mobil-toggle").addClass("displayNone");
    var a = 0;
    $(".icon-toggle").click(function(event){
        event.stopPropagation();
        if (a==0){
            navShow(".mobil-toggle",".icon-toggle",".spangroup1",".spangroup2","displayNone","span1","span2","span3","spanout3","slideLeftToLeft","slideLeftToRight");
            a++;
        }else{
            navHide(".mobil-toggle",".icon-toggle",".spangroup1",".spangroup2","displayNone","span1","span2","span3","spanout3","slideLeftToLeft","slideLeftToRight");
            a--;
        }
    });
    $(".mobil-toggle .container ul").click(function(event){
        event.stopPropagation();
    });
    $(".mobil-toggle .container").click(function(event){
        event.stopPropagation();
        if (a==0){
            navShow(".mobil-toggle",".icon-toggle",".spangroup1",".spangroup2","displayNone","span1","span2","span3","spanout3","slideLeftToLeft","slideLeftToRight");
            a++;
        }else{
            navHide(".mobil-toggle",".icon-toggle",".spangroup1",".spangroup2","displayNone","span1","span2","span3","spanout3","slideLeftToLeft","slideLeftToRight");
            a--;
        }
    })
});

function addAnimation(controledClass,controledaddClass){
            $(controledClass).removeClass("invisible");
            $(controledClass).removeClass("displayNone");
            $(controledClass).addClass(controledaddClass);
};
function removeAnimation(controledClass,controledaddClass){
        $(controledClass).addClass("invisible");
        $(controledClass).addClass("displayNone");
        $(controledClass).removeClass(controledaddClass);
};


function myShow(hoveredClass,effectClass){
    $(hoveredClass).addClass("active");
    $(effectClass).removeClass("displayNone");
}
function myHide(hoveredClass,effectClass){
    $(hoveredClass).removeClass("active");
    $(effectClass).addClass("displayNone");
}

var myCleanSetTimeOut;
$.fn.navHover = function (hoveredClass,effectClass) {
    $(this).hover(function(){
        clearTimeout(myCleanSetTimeOut);
        myShow(hoveredClass,effectClass);
    },function(){
        myCleanSetTimeOut = setTimeout(function(){
            myHide(hoveredClass,effectClass);
        },0.1);
    })
};

$(function(){
    $(".postings-search").addClass("displayNone");
    $(".personal-setting").addClass("displayNone");
    $(".nav-window .inform").addClass("displayNone");
    $(".operation-ul li:eq(0)").navHover(".operation-ul li:eq(0)",".postings-search");
    $(".postings-search").navHover(".operation-ul li:eq(0)",".postings-search");
    $(".operation-ul li:eq(2)").navHover(".operation-ul li:eq(2)",".nav-window .inform");
    $(".nav-window .inform").navHover(".operation-ul li:eq(2)",".nav-window .inform");
    $(".operation-ul li:eq(3)").navHover(".operation-ul li:eq(3)",".personal-setting");
    $(".personal-setting").navHover(".operation-ul li:eq(3)",".personal-setting");
});




/********************************开始业务逻辑具体的AJAX********************************/
/*全局变量*/
var user_Score; //用户分数

/*输入框聚焦且按下回车事件，带一个函数作为参数*/
$.fn.myInputFocus = function(Func){
    $(this).focus(function(){
        $(this).keypress(function(e) {
            // 回车键事件
            if(e.which == 13) {
                Func();
            }
        });

    })

};

/*失去焦点事件*/
$.fn.myInputBlur = function(Func){
    $(this).blur(function(){
        Func();
    })
};

/*错误信息提示*/
function wrongAccount(effectClass,effectAnimation,time){
    $(effectClass).addClass(effectAnimation);//增加动画
    setTimeout(function(){
        $(effectClass).removeClass(effectAnimation);
    },time);
}


/*初始化顶部用户和注册登录栏*/
function yemianchushi(){
    var htmlValue = $(".user-name").html().length; //获取用户栏里的昵称长度
    if(htmlValue == 0 ){    //如果昵称长度=0
        $(".login-in").show();  //证明其没有登录，显示登录注册按钮
        $(".left-aside .personal-information p").eq(1).hide();
        $(".left-aside .personal-information p").eq(2).hide();
        $(".left-aside .personal-information p").eq(3).show();
        $(".operation-ul").hide();  //隐藏用户操作按钮
        return false;
    }else{
        $(".login-in").hide();  //如果昵称长度>0，则证明有登录，隐藏登录注册按钮。
        $(".left-aside .personal-information p").eq(1).show();
        $(".left-aside .personal-information p").eq(2).show();
        $(".left-aside .personal-information p").eq(3).hide();
        $(".operation-ul").show();  //显示用户操作按钮
        return true;
    }
}

//初始化个人信息栏
function userInformation(){
    /*个人信息框的内容查询*/
    $.ajax({
        url:"php/userInformation.php",
        dataType:"JSON",
        async: false,
        success:function(data){
            var userName = data.userName;
            var userSign = data.userSign;
            var userHead = data.userHead;
            var userScore = data.userScore;
            $(".user-name").html(userName);
            $(".self-introduce").html(userSign);
            var imgAddress = "php/upload/"+userHead;
            $(".touxiang").attr("src",imgAddress);
            $(".littleHead").attr("src",imgAddress);
            $(".left-aside .personal-information .score").html(userScore);
            $(".right-input .score").html(userScore);
            user_Score = userScore;
            yemianchushi();  //调用初始化页面方法
        }
    });
    /*初始化通知栏*/
    Tongzhi();
}

/*用户登录方法*/
function userLogin(){
    $(".login-btn").click(function(){
        var userName = $(".username-login").val();
        var passWord = $(".password-login").val();
        $.ajax({
            url:"php/login.php",
            type:"POST",
            data:{
                userName:userName,
                passWord:passWord
            },
            dataType:"text",
            success:function(data){
                if(data == "success"){
                    $(".close").trigger("click");     //后台返回登录成功信息后模拟点击模态框的关闭按钮
                    userInformation();               //后台返回登录成功信息后初始化整个人物信息栏
                }else if(data == "error"){
                    wrongAccount(".wrong-tips","wrongInput",4000);                  //后台返回登录失败信息后弹出动画，提示登录错误,参数为作用的类，动画，移除动画的定时器时间，一般等于动画持续时间。
                }
            }
        });
    });
    function triggerLoginClick(){   //定义一个模拟登录按钮点击
        $(".login-btn").trigger("click");
    }
    $(".username-login").myInputFocus(triggerLoginClick);//登录界面上用户框聚焦时回车模拟提交
    $(".password-login").myInputFocus(triggerLoginClick);//登录界面上密码框聚焦时回车模拟提交

}

/*用户注册方法*/
function userRegister(){
    $(".register-btn").click(function(){
        var userName = $(".username-register").val();
        var passWord = $(".password-register").val();
        var checkNum = /^[A-Za-z0-9]+$/;
        if(!checkNum.test(userName)){
            wrongAccount(".register-wrong-username-combination","wrongInput",2500);                  //弹出提示动画，提示注册错误,参数为作用的类，动画，移除动画的定时器时间，一般等于动画持续时间。
            return false;
        }
        if(userName.length < 6 || userName.length > 10){
            wrongAccount(".register-wrong-usernameSize","wrongInput",2500);                  //弹出提示动画，提示注册错误,参数为作用的类，动画，移除动画的定时器时间，一般等于动画持续时间。
            return false;
        }
        if(passWord.length < 6 || passWord.length > 15){
            wrongAccount(".register-wrong-passwordSize","wrongInput",2500);                  //弹出提示动画，提示注册错误,参数为作用的类，动画，移除动画的定时器时间，一般等于动画持续时间。
            return false;
        }else{
            $.ajax({
                url:"php/register.php",
                type:"POST",
                data:{
                    userName:userName,
                    passWord:passWord
                },
                dataType:"text",
                success:function(data){
                    if(data == "success"){
                        $(".close").trigger("click");     //后台返回注册成功信息后模拟点击模态框的关闭按钮
                        $(".register-complete").trigger("click");  //提示注册成功
                    }else if(data == "username exit"){
                        wrongAccount(".register-wrong-username-been-used","wrongInput",2500);                  //后台返回用户已存在信息后弹出动画，提示登录错误,参数为作用的类，动画，移除动画的定时器时间，一般等于动画持续时间。
                    }else{
                        alert(data);
                    }
                }
            });
        }

    });
    function triggerRegisterClick(){   //定义一个模拟注册按钮点击
        $(".register-btn").trigger("click");
    }
    $(".username-register").myInputFocus(triggerRegisterClick);//登录界面上用户框聚焦时回车模拟提交
    $(".password-register").myInputFocus(triggerRegisterClick);//登录界面上密码框聚焦时回车模拟提交
}

/*帖子显示*/
function tieziShow(){
    tiezishow(6,4);     //第一个参数为一页显示帖子数，第二个参数为显示的页数，要与帖子分页方法参数保持一致。
    function tiezishow(tieziMaxNum,maxPageShowNumb){
        //顶置帖子先查，查完再到普通帖子。
        $.ajax({
            url:"php/tieziSelect.php",
            data:{
                tieziMaxNum:tieziMaxNum,
            },
            type:"post",
            dataType:"JSON",
            success:function(data){
                $(".tiezibody").html(""); //清空帖子表格内容，重新加载
                for(var name in data){
                    if(data[name].tieziOverhead !=0){
                        var trOverhead = $('<tr class="overHeadTr">\
                            <td>\
                            <p><span class="overhead">【置顶】</span><a href="ziye/thread.html?'+data[name].tieziId+'">'+data[name].tieziTitle+'</a><b class="Hidden">'+data[name].tieziId+'</b></p>\
                        <td>\
                        <p>'+data[name].tieziScore+'</p>\
                        </td>\
                        <td>\
                        <p class="username"><a href="#">'+data[name].tieziCreater+'</a></p>\
                        <p class="question-data">'+data[name].tieziCreaterData+'</p>\
                        </td>\
                        <td>\
                        <p>'+data[name].tieziAnswer+'</p>\
                        </td>\
                        <td>\
                        <p class="username"><a href="#">'+data[name].tieziLastAnswer+'</a></p>\
                            <p class="question-data">'+data[name].tieziLastAnswerDate+'</p>\
                        </td>\
                        <td>\
                        <div class="control"><span>管理</span>\
                        <ul  class="displayNone">\
                        <li><button class="btn btn-danger tieziDelete">删除</button></li>\
                        <li><button class="btn btn-warning tieziOverheadCancel" title="取消置顶">取置</button></li>\
                        </ul>\
                        </div>\
                            </td>\
                            </tr>');
                        trOverhead.appendTo(".tiezibody");
                    }else{
                        var trOverhead = $('<tr class="normalTr">\
                        <td>\
                        <p><a href="ziye/thread.html?'+data[name].tieziId+'">'+data[name].tieziTitle+'</a><b class="Hidden">'+data[name].tieziId+'</b></p>\
                    <td>\
                    <p>'+data[name].tieziScore+'</p>\
                    </td>\
                    <td>\
                    <p class="username"><a href="#">'+data[name].tieziCreater+'</a></p>\
                    <p class="question-data">'+data[name].tieziCreaterData+'</p>\
                    </td>\
                    <td>\
                    <p>'+data[name].tieziAnswer+'</p>\
                    </td>\
                    <td>\
                    <p class="username"><a href="#">'+data[name].tieziLastAnswer+'</a></p>\
                        <p class="question-data">'+data[name].tieziLastAnswerDate+'</p>\
                    </td>\
                    <td>\
                    <div class="control"><span>管理</span>\
                    <ul   class="displayNone">\
                    <li><button class="btn btn-danger tieziDelete">删除</button></li>\
                    <li><button class="btn btn-success tieziOverhead">顶置</button></li>\
                    </ul>\
                    </div>\
                        </td>\
                        </tr>');
                        trOverhead.appendTo(".tiezibody");
                    }
                }
            }
        });
        /*帖子数与页数显示*/
        $.ajax({
            url:"php/tieziSelectCount.php",
            data:{
                tieziMaxNum:tieziMaxNum,
            },
            type:"post",
            dataType:"text",
            success:function(data){
                $(".bbs-pagination ul").html("");
                var pageNum = Math.ceil(data/tieziMaxNum);
                //$(".total_tieziPage span").html(pageNum);
                /*通过页数来构造页*/
                var FirstPage = $('<li class="active">首页</li> <li class="active">1</li>');
                FirstPage.appendTo($(".bbs-pagination ul"));
                //var maxShowPage = 4;
                if(pageNum>=maxPageShowNumb){
                    for(var i=2;i<=maxPageShowNumb;i++){
                        var li = $('<li>'+i+'</li>');
						//alert(i);
                        li.appendTo($(".bbs-pagination ul"));
						
                    }
                }
                /*省略页数*/
                var  omittedPage = $('<li>...</li>');
                omittedPage.appendTo($(".bbs-pagination ul"));
                /*上一页下一页*/
                var lastPageAndNextPage = $('<li>上一页</li><li>下一页</li>');
                lastPageAndNextPage.appendTo($(".bbs-pagination ul"));
                /*帖子总数，帖子页数*/
                var tieziNumAndPageNum = $('<li class="total_tieziNum">总数：<span>29574</span></li><li class="total_tieziPage">共：<span>256</span> 页</li>');
                tieziNumAndPageNum.appendTo($(".bbs-pagination ul"));
                /*帖子总数*/
                $(".total_tieziNum span").html(data);
                /*帖子页总数*/
                $(".total_tieziPage span").html(pageNum);
                /*帖子分页点击方法*/
                tieziFenye();
            }
        });
    }
}

/*帖子分页*/
function tieziFenye(){
    tiezifenye(6,4);    //第一个参数为一页显示帖子数，第二个参数为显示的页数，要与帖子显示方法参数保持一致。
    function tiezifenye(tieziMaxNum,maxShowNumb){
        $(".bbs-pagination ul li").click(function(){
            var pageNum; //点击触发页。
            var index = $(this).index(); //当前索引，用于获取当前触发页。
            var pageNow = parseInt($(this).html());
            var tieziNum = parseInt($(".total_tieziNum span").html());  //获取当前总帖子数
            var pageAll =   parseInt($(".total_tieziPage span").html());    //获取当前总页数
            /****以下是几种特殊触发页码触发事件****/
            if($(this).html()=="首页" || $(this).html()==1 ){
                $(".bbs-pagination").eq(0).find("li:lt(2)").addClass("active");
                $(".bbs-pagination").eq(0).find("li:gt(1)").removeClass("active");
                $(".bbs-pagination").eq(1).find("li:lt(2)").addClass("active");
                $(".bbs-pagination").eq(1).find("li:gt(1)").removeClass("active");
            }
            else if($(this).html()=="..."){
                var beforeNum = parseInt($(".bbs-pagination ul li").eq(index+1).html())-1;
                if(index!==2){
                    /*如果不等于2，则说明这个省略号是第一次出现，在后面。*/
                    return;
                }else{
                    var lastPageNum = parseInt($(".bbs-pagination").eq(0).find("li").eq(3).html());
                    /*省略键当后退键使用，重新分页*/
                    $(".bbs-pagination ul").html("");   //清空页码，重新分页
                    var FirstPage = $('<li>首页</li><li class="firstPage">1</li>');
                    FirstPage.appendTo($(".bbs-pagination ul"));
                    if(lastPageNum==maxShowNumb){
                        // alert("点到4了");
                        for(var i=(lastPageNum-maxShowNumb+2);i<lastPageNum+1;i++){
                            var li = $('<li>'+i+'</li>');
                            li.appendTo($(".bbs-pagination ul"));
                        }
                        /*省略*/
                        var  omittedPage = $('<li>...</li>');
                        omittedPage.appendTo($(".bbs-pagination ul"));
                        /*上一页下一页*/
                        var lastPageAndNextPage = $('<li class="back_lastPage">上一页</li><li>下一页</li>');
                        lastPageAndNextPage.appendTo($(".bbs-pagination ul"));
                        /*帖子总数，帖子页数*/
                        var tieziNumAndpageAll = $('<li class="total_tieziNum">总数：<span>29574</span></li><li class="total_tieziPage">共：<span>256</span> 页</li>');
                        tieziNumAndpageAll.appendTo($(".bbs-pagination ul"));
                        /*帖子总数*/
                        $(".total_tieziNum span").html(tieziNum);
                        /*帖子页总数*/
                        $(".total_tieziPage span").html(pageAll);
                        /*帖子分页点击方法*/
                        var finalPage = $(".back_lastPage").index()-1;
                        $(".bbs-pagination").eq(0).find("li").eq(finalPage-2).addClass("active");
                        $(".bbs-pagination").eq(0).find("li").eq(finalPage-2).siblings().removeClass("active");
                        $(".bbs-pagination").eq(1).find("li").eq(finalPage-2).addClass("active");
                        $(".bbs-pagination").eq(1).find("li").eq(finalPage-2).siblings().removeClass("active");
                        tieziFenye();
                    }else{
                        // alert("没有点到4");
                        for(var i=(lastPageNum-maxShowNumb+0);i<lastPageNum+1;i++){
                            var li = $('<li>'+i+'</li>');
                            li.appendTo($(".bbs-pagination ul"));
                        }
                        var  omittedPage = $('<li>...</li>');
                        $(".firstPage").after(omittedPage);
                        // omittedPage.after($(".firstPage"));
                        /*上一页下一页*/
                        var lastPageAndNextPage = $('<li class="back_lastPage">上一页</li><li>下一页</li>');
                        lastPageAndNextPage.appendTo($(".bbs-pagination ul"));
                        /*帖子总数，帖子页数*/
                        var tieziNumAndpageAll = $('<li class="total_tieziNum">总数：<span>29574</span></li><li class="total_tieziPage">共：<span>256</span> 页</li>');
                        tieziNumAndpageAll.appendTo($(".bbs-pagination ul"));
                        /*帖子总数*/
                        $(".total_tieziNum span").html(tieziNum);
                        /*帖子页总数*/
                        $(".total_tieziPage span").html(pageAll);
                        /*帖子分页点击方法*/
                        var finalPage = $(".back_lastPage").index()-1;
                        $(".bbs-pagination").eq(0).find("li").eq(finalPage-1).addClass("active");
                        $(".bbs-pagination").eq(0).find("li").eq(finalPage-1).siblings().removeClass("active");
                        $(".bbs-pagination").eq(1).find("li").eq(finalPage-1).addClass("active");
                        $(".bbs-pagination").eq(1).find("li").eq(finalPage-1).siblings().removeClass("active");
                        tieziFenye();
                    }
                }
            }
            else if(pageNow%maxShowNumb==0){
                /*点到某个规定的页码*/
                /*重新分页*/
                $(".bbs-pagination ul").html("");   //清空页码，重新分页
                /*保留首页*/
                var FirstPage = $('<li>首页</li> <li>1</li>');
                FirstPage.appendTo($(".bbs-pagination ul"));
                /*省略前面的页数*/
                var  omittedPage = $('<li>...</li>');
                omittedPage.appendTo($(".bbs-pagination ul"));
                /*开始动态构造页码*/
                if(pageAll>=maxShowNumb){
                    /*如果当前页+规定页大于总页，则证明余下的页不足规定页*/
                    if(pageNow+maxShowNumb>pageAll){
                        //  alert("下一个轮回不够规定页的情况");
                        for(var i=2+pageNow-2;i<=pageAll;i++){
                            var li = $('<li>'+i+'</li>');
                            li.appendTo($(".bbs-pagination ul"));
                        }
                    }else{
                        // alert("下一个轮回够规定页的情况");
                        var a =2+parseInt(pageNow)-2;
                        var b = parseInt(pageNow)+maxShowNumb;
                        for(var i=a;i<=b;i++){
                            var li = $('<li>'+i+'</li>');
                            li.appendTo($(".bbs-pagination ul"));
                        }
                    }
                }
                /*上一页下一页*/
                var lastPageAndNextPage = $('<li>上一页</li><li>下一页</li>');
                lastPageAndNextPage.appendTo($(".bbs-pagination ul"));
                /*帖子总数，帖子页数*/
                var tieziNumAndpageAll = $('<li class="total_tieziNum">总数：<span>29574</span></li><li class="total_tieziPage">共：<span>256</span> 页</li>');
                tieziNumAndpageAll.appendTo($(".bbs-pagination ul"));
                /*帖子总数*/
                $(".total_tieziNum span").html(tieziNum);
                /*帖子页总数*/
                $(".total_tieziPage span").html(pageAll);
                /*帖子分页点击方法*/
                tieziFenye();
                $(".bbs-pagination").eq(0).find("li").eq(3).addClass("active");
                $(".bbs-pagination").eq(0).find("li").eq(3).siblings().removeClass("active");
                $(".bbs-pagination").eq(1).find("li").eq(3).addClass("active");
                $(".bbs-pagination").eq(1).find("li").eq(3).siblings().removeClass("active");
            }
            else if($(this).html()=="下一页"){
                var lastPage = $(".bbs-pagination").eq(0).find("li[class=active]").index();
                /*对是否首页和第一页进行判断*/
                if($(".bbs-pagination").eq(0).find("li").eq(lastPage).html()=="首页" || $(".bbs-pagination").eq(0).find("li").eq(lastPage).html()=="1" || $(".bbs-pagination").eq(1).find("li").eq(lastPage).html()=="首页" || $(".bbs-pagination").eq(1).find("li").eq(lastPage).html()=="1"){
                    $(".bbs-pagination").eq(0).find("li").eq(lastPage+2).trigger("click");
                }else{
                    $(".bbs-pagination").eq(0).find("li").eq(lastPage+1).trigger("click");
                }
            }
            else if($(this).html()=="上一页"){
                var lastPage = $(".bbs-pagination").eq(0).find("li[class=active]").index();
                if($(".bbs-pagination").eq(0).find("li").eq(lastPage).html()=="首页" || $(".bbs-pagination").eq(0).find("li").eq(lastPage).html()=="1" || $(".bbs-pagination").eq(1).find("li").eq(lastPage).html()=="首页" || $(".bbs-pagination").eq(1).find("li").eq(lastPage).html()=="1"){
                    alert("已经是第一页了");
                    return;
                }else{
                    $(".bbs-pagination").eq(0).find("li").eq(lastPage-1).trigger("click");
                }
            }
            else if($(this).html().indexOf("总")>=0 || $(this).html().indexOf("共")>=0){
                return;
            }
            else{
                $(".bbs-pagination").eq(0).find("li").eq(index).addClass("active");
                $(".bbs-pagination").eq(0).find("li").eq(index).siblings().removeClass("active");
                $(".bbs-pagination").eq(1).find("li").eq(index).addClass("active");
                $(".bbs-pagination").eq(1).find("li").eq(index).siblings().removeClass("active");
            }
            /******ajax开始******/
            if($(this).html()=="首页" || $(this).html()=="1"){
                $(".postReload").trigger("click");   //当点到首页时，模拟点击刷新帖子。
                return;
            }else if($(this).html()=="..."){
                if(index!==2){
                    /*如果不等于2，则说明这个省略号是第一次出现，在后面。*/
                    return;
                }else{
                    pageNum=beforeNum;
                }
            }else{
                pageNum = parseInt($(this).html());
            }
            $.ajax({
                url:"php/tieziFenyeSelect.php",
                data:{
                    pageNum:pageNum,
                    tieziMaxNum:tieziMaxNum,
                },
                type:"post",
                dataType:"JSON",
                success:function(data){
                    $(".tiezibody").html(""); //清空帖子表格内容，重新加载
                    for(var name in data){
                        if(data[name].tieziOverhead !=0){
                            var trOverhead = $('<tr class="overHeadTr">\
                            <td>\
                            <p><span class="overhead">【置顶】</span><a href="ziye/thread.html?'+data[name].tieziId+'">'+data[name].tieziTitle+'</a><b class="Hidden">'+data[name].tieziId+'</b></p>\
                        <td>\
                        <p>'+data[name].tieziScore+'</p>\
                        </td>\
                        <td>\
                        <p class="username"><a href="#">'+data[name].tieziCreater+'</a></p>\
                        <p class="question-data">'+data[name].tieziCreaterData+'</p>\
                        </td>\
                        <td>\
                        <p>'+data[name].tieziAnswer+'</p>\
                        </td>\
                        <td>\
                        <p class="username"><a href="#">'+data[name].tieziLastAnswer+'</a></p>\
                            <p class="question-data">'+data[name].tieziLastAnswerDate+'</p>\
                        </td>\
                        <td>\
                        <div class="control"><span>管理</span>\
                        <ul  class="displayNone">\
                        <li><button class="btn btn-danger tieziDelete">删除</button></li>\
                        <li><button class="btn btn-warning tieziOverheadCancel" title="取消置顶">取置</button></li>\
                        </ul>\
                        </div>\
                            </td>\
                            </tr>');
                            trOverhead.appendTo(".tiezibody");
                        }else{
                            var trOverhead = $('<tr class="normalTr">\
                        <td>\
                        <p><a href="ziye/thread.html?'+data[name].tieziId+'">'+data[name].tieziTitle+'</a><b class="Hidden">'+data[name].tieziId+'</b></p>\
                    <td>\
                    <p>'+data[name].tieziScore+'</p>\
                    </td>\
                    <td>\
                    <p class="username"><a href="#">'+data[name].tieziCreater+'</a></p>\
                    <p class="question-data">'+data[name].tieziCreaterData+'</p>\
                    </td>\
                    <td>\
                    <p>'+data[name].tieziAnswer+'</p>\
                    </td>\
                    <td>\
                    <p class="username"><a href="#">'+data[name].tieziLastAnswer+'</a></p>\
                        <p class="question-data">'+data[name].tieziLastAnswerDate+'</p>\
                    </td>\
                    <td>\
                    <div class="control"><span>管理</span>\
                    <ul   class="displayNone">\
                    <li><button class="btn btn-danger tieziDelete">删除</button></li>\
                    <li><button class="btn btn-success tieziOverhead">顶置</button></li>\
                    </ul>\
                    </div>\
                        </td>\
                        </tr>');
                            trOverhead.appendTo(".tiezibody");
                        }
                    }
                }
            });
        });
    }
}

/*发表帖子*/
function PostTiezi() {
    /*发帖必须先登录*/
    $(".post").click(function(){
        if(yemianchushi()==false){ //查询是否应登录
            alert("发帖请先进行登录");
        }else{
            PostTieZiAction(".modal-window",".modal-windows",".modal-window .fatie","displayNone","modelShowOut");
        }
    });
    $(".postTiezi").click(function(){
        var tieziTitle = $(".input-tiezi-title").val();
        var tieziContent = $(".input-tiezi-content").val();
        var tieziTag = $(".input-tiezi-tag").val();
        var tieziSection = $(".input-tiezi-section").val();
        var tieziScore = $(".input-tiezi-score").val();
        user_Score = parseInt(user_Score); //拥有的分数
        var userScore = user_Score - parseInt(tieziScore)*0.5; //剩余积分
        /*发帖条件*/
        /*检测标题字数是否足够*/
        if(tieziTitle.length<4 || tieziTitle.length > 30){
            alert("标题字数必须在4和30之间");
            return;
        }else if(tieziContent.length<10 || tieziTitle.length > 400){
            alert("内容字数必须在10和400之间");
            return;
        }else if(tieziTag.length<1 || tieziTag.length>10){
            alert("标签字数必须在1和10之间");
            return;
            /*检测分数是否足够*/
        }else if(user_Score < tieziScore){
            alert("分数不足，请重新填写分数");
            return;
        }else if(tieziScore.length==0){
            alert("分数不允许为空。但可以为0");
            return;
        }
            /*条件通过后开始发帖*/
            $.ajax({
                url: "php/fatie.php",
                type: "POST",
                data: {
                    tieziTitle: tieziTitle,
                    tieziContent: tieziContent,
                    tieziTag: tieziTag,
                    tieziSection: tieziSection,
                    tieziScore: tieziScore,
                    userScore: userScore,
                },
                dataType: "text",
                success: function (data) {
                    if (data == "success") {
                        alert("发帖成功，恭喜获得积分奖励");
                        $(".close").trigger("click");     //后台返回注册成功信息后模拟点击模态框的关闭按钮
                        tieziShow();       //调用刷新帖子方法。
                        userInformation(); //调用个人信息刷新方法。
                    } else if (data == "tieziname exit") {
                        alert("发帖失败");
                        //wrongAccount(".register-wrong-username-been-used", "wrongInput", 2500);                  //后台返回用户已存在信息后弹出动画，提示登录错误,参数为作用的类，动画，移除动画的定时器时间，一般等于动画持续时间。
                    } else {
                        alert(data);
                    }
                }
            });
    });
}

/*帖子顶置*/
function tieziOverhead(e){
    var tieziId = $(e.target).parents("tr").children("td").eq(0).children("p").children("b").html(); //获取帖子ID
    $.ajax({
        url:"php/tieziOverhead.php",
        type:"GET",
        data:{
            tieziId:tieziId
        },
        dataType:"text",
        success:function(data){
            if(data == "success"){
                alert("顶置帖子成功！");
                tieziShow();
            }
        }
    });
}

/*帖子取消顶置*/
function tieziOverheadCancel(e){
    var tieziId = $(e.target).parents("tr").children("td").eq(0).children("p").children("b").html(); //获取帖子ID
    $.ajax({
        url:"php/tieziOverheadCancel.php",
        type:"GET",
        data:{
            tieziId:tieziId
        },
        dataType:"text",
        success:function(data){
            if(data == "success"){
                alert("取消顶置成功！");
                tieziShow();
            }
        }
    });
}

/*帖子删除*/
function tieziDelete(e){
    if (confirm("确定删除帖子？")) {
        var tieziId = $(e.target).parent().parent().parent().parent().parent().children("td").eq(0).children("p").children("b").html(); //获取帖子ID
        $.ajax({
            url:"php/tieziDelete.php",
            type:"GET",
            data:{
                tieziId:tieziId
            },
            dataType:"text",
            success:function(data){
                if(data == "success"){
                    alert("删除帖子成功！");
                    tieziShow();
                }else{
                    alert(data);
                }
            }
        });
    }else{
        return;
    }

}

/*帖子管理事件委托*/
function shiJianWeituo(){

    /*****帖子管理事件委托开始******/
    $(".tiezibody").on('mouseenter',".control span",function(e){ //管理按钮鼠标移入事件委托
        $(e.target).parent().children("ul").show();
    });
    $(".tiezibody").on('mouseout',".control span",function(e){ //管理按钮鼠标移出事件委托
       $(e.target).parent().children("ul").hide();
    });
    $(".tiezibody").on('mouseenter',".control ul",function(e){ //管理按钮组鼠标移入事件委托
        $(e.target).parents(".control").children("ul").show();
    });
    $(".tiezibody").on('mouseout',".control ul",function(e){ //管理按钮组鼠标移出事件委托
        $(e.target).parents(".control").children("ul").hide();
    });
    $(".tiezibody").on('mouseenter',".control ul > li",function(e){  //管理按钮组鼠标移入事件委托
        $(e.target).parents("ul").show();
    });
    $(".tiezibody").on('mouseenter',".control ul li > button",function(e){  //管理按钮组鼠标移入事件委托
        $(e.target).parents("ul").show();
    });

    $(".tiezibody").on("click",".tieziOverheadCancel",function(e){ //取消帖子置顶事件委托
        tieziOverheadCancel(e);
    });
    $(".tiezibody").on("click",".tieziOverhead",function(e){     //帖子置顶按钮事件委托
        tieziOverhead(e);
    });
    $(".tiezibody").on("click",".tieziDelete",function(e){     //帖子删除按钮事件委托
        tieziDelete(e);
    });
    /*****帖子管理事件委托结束*****/
}

/*帖子刷新*/
function tieziReload(){
    $(".postReload").click(function(){
        tieziShow();
    })
}

/*注销方法*/
function logOff(){
    $(".glyphicon-log-out").click(function(e){
        if (confirm("注销账号？注销后需要重新输入账号面")) {
            $.ajax({
                url:"php/writtenOff.php",
                type:"POST",
                dataType:"text",
                success:function(data){
                    if(data == "success"){
                        $(".user-name").html("");
                        userInformation();               //注销成功后初始化整个人物信息栏
                    }else{
                        alert(data);
                    }
                }
            });
        }else {
            e.preventDefault();
        }
    });
}

/*模拟个性签名编辑按钮点击事件*/
function selfSignTrigger(){
    $(".self-introduce-container-icon").trigger("click");
}

/*更新签名方法*/
function updateSign(){
    var userSign = $(".userSign").val();
    $.ajax({
        url:"php/updateUserSign.php",
        type:"GET",
        data:{
            userSign:userSign
        },
        dataType:"text",
        success:function(data){
            if(data == "success"){
                userInformation(); //更新完后初始化用户栏信息
            }
        }
    });
}

/*编辑个性签名*/
function editorUserSign() {
    $(".userSign").hide(); //签名输入框隐藏
    var a = 0;
    $(".self-introduce-container-icon").click(function(){
        if(a == 0){
            $(".userSign").show(); //签名输入框显示
            $(".userSign").focus();
            a = 1;
        }else{
            $(".userSign").hide(); //签名输入框隐藏
            a = 0;
        }
    });
    $(".userSign").myInputFocus(updateSign); //调用输入框聚焦方法，将更新签名的方法传入。
    $(".userSign").myInputBlur(selfSignTrigger);   //调用输入框失去聚焦方法输入框失去焦点事件
}

/*头像上传*/
function HeadFormUpload(){
    /*模拟点击了被隐藏的上传按钮，目的是变相改变上传按钮样式*/
    $(".head-change").click(function(){
        $(".head-upload").trigger("click");
    });
    /*头像上传*/
    $('.uploadHeadForm').on('submit',(function(e) {
        e.preventDefault();
        //序列化表单
        var serializeData = $(this).serialize();
        // var formData = new FormData(this);
        $(this).ajaxSubmit({
            type:'POST',
            url: 'php/uploadUserHead.php',
            data: serializeData,
            contentType: false,
            cache: false,
            processData:false,
            beforeSubmit: function() {//上传前的操作
            },
            uploadProgress: function (event, position, total, percentComplete){//上传中的操作
                //alert("上传中");
            },
            success:function(data){//服务器返回操作
                if(data == "error format"){
                    alert("格式错误");
                }else if(data == "error size"){
                    alert("图片必须小于100kb");
                }else if(data == "error"){
                    alert("出现未知错误");
                }else{
                    var picName = data;
                    var imgAddress = "php/upload/"+picName;
                    $(".touxiang").attr("src",imgAddress);
                    $(".littleHead").attr("src",imgAddress);
                }
            },
            error:function(data){//JS代码有错
                alert(data);
            }
        });
    }));
    //绑定文件选择事件，一选择了图片，就让`form`提交。
    $(".head-upload").on("change", function() {
        $(this).parent().submit();
    });
}

/*检测还可以输入字符数方法*/
$.fn.checkLength = function(maxInputLength,Color,changeColor){
    $(this).bind('input propertychange ',function(){
        // var myColor = $(this).parent("td").children("span").children("i").css("color");
        // var changeColor = "red";
        var length = $(this).val().length;
        var surplusLength = maxInputLength - length;
        $(this).parent("td").children("span").children("b").html(surplusLength);
        /*颜色变换*/
        if(surplusLength < 10){
            $(this).parent("td").children("span").children("b").css("color",changeColor);
        }else{
            $(this).parent("td").children("span").children("b").css("color",Color);
        }
    } );
};

/*通知查询*/
function Tongzhi(){
    /*通知条目查询*/
    $.ajax({
        url:"php/tongzhiCount.php",
        success:function(data){
            $(".inform-container .count b").html(data);
        },
        error:function(data){
            alert("出错");
            alert(data);
        }
    });
    /*通知内容查询*/
    $.ajax({
        url:"php/tongzhiSelect.php",
        type:"post",
        dataType:"JSON",
        success:function(data){
            $(".inform-container .inform-list").html("");
            for(var name in data){
                var tongzhiList = $('<div class="inform-list-children">\
                    <i class="glyphicon glyphicon-star icon"></i><p class="inform-content"><a href="ziye/thread.html?'+data[name].tieziId+'">'+data[name].tieziTitle+'</a><span class="ignore">忽略</span></p>\
                <p class="count-time"><b>'+data[name].tieziAnswer+'<span>条新回复</span></b><i class="tieziId displayNone">'+data[name].tieziId+'</i><span class="inform-time">'+data[name].tieziLastAnswerDate+'</span></p>\
                </div>');
                tongzhiList.appendTo($(".inform-container .inform-list"));
            }
            /*忽略单条通知*/
            var tieZiId = parseInt($(".inform-list-children .count-time .tieziId").html());
            $(".inform-list-children .ignore").click(function(){
                $.ajax({
                    url:"php/tongzhiDelete.php",
                    data:{
                        tieziId:tieZiId,
                    },
                    type:"POST",
                    success:function(data){
                        if(data=="success"){
                            //alert("忽略成功");
                            Tongzhi(); //回调通知函数。
                        }else{
                            alert("进去但有错");
                            alert(data);
                        }
                    },
                    error:function(data){
                        alert(data);
                    }
                })
            });
            /*忽略全部通知*/
            $(".inform-container .count .ignore-all").click(function(){
               $.ajax({
                   url:"php/tongzhiDeleteAll.php",
                   success:function(data){
                       if(data=="success"){
                           Tongzhi(); //回调通知函数。
                           //alert("成功");
                       }else{
                           alert("失败");
                           alert(data);
                       }
                   },
                   error:function(data){
                       alert(data);
                   }
               })
            });
            /*检测通知栏是否有内容*/
            if($(".inform-container .inform-list").html().length<1){
               $(".noInformation").show();
               $(".inform-bell i").hide();
            }else{
                $(".noInformation").hide();
                $(".inform-bell i").show();
            }
        }
    });
}

/*用户模块*/
function User(){
    /*初始化用户整个界面*/
    userInformation();
    /*登录*/
    userLogin();
    /*注册*/
    userRegister();
    /*头像上传*/
    HeadFormUpload();
    /*用户注销*/
    logOff();
    /*编辑个性签名*/
    editorUserSign();
}

/*首页帖子模块*/
function Tiezi(){
    /*帖子管理事件委托*/
    shiJianWeituo();
    /*帖子初始化*/
    tieziShow();
    /*发帖*/
    PostTiezi();
    /*帖子刷新*/
    tieziReload();
    /*控制剩余输入字符*/
    $(".input-tiezi-title").checkLength(30,"#3385ff","red");
    $(".input-tiezi-content").checkLength(400,"#3385ff","red");
}
/*执行方法*/
$(function(){
    /*首页用户模块*/
    User();
    /*首页帖子模块*/
    Tiezi()

});
