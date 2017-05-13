<template>
    <div class="personal-setting" v-on:mousemove="userInformation" v-on:mouseout="none">
        <!--<jqForm src=""></jqForm>-->
        <div class="clear-touxiang">
            <img class="touxiang" v-bind:src="userHead">
            <div class="user-introduce">
                <p class="user-name">{{userName}}</p>
                <div class="self-introduce">{{userSign}}</div>
                <i class="glyphicon glyphicon-pencil self-introduce-container-icon" title="编辑个性签名" v-on:click="userSignInputStateChange(true)"></i>
                <input type="text" class="form-control userSign" placeholder="回车键入"
                       v-model="userSignInput"
                        v-show="userSignInputState"
                       v-on:keyup.enter="submitSign"
                       v-on:mouseout="userSignInputStateChange(false)"
                >
            </div>
            <form class="head-change uploadHeadForm" v-on:submit="AA">
                <label for="uploadTouxiang">更改头像</label>
                <input id="uploadTouxiang" class="uploadTouxiang hide" type="file" name="file"/>
            </form>
        </div>
        <div class="operation">
            <span><i class="glyphicon glyphicon-cog"></i>账号设置</span>
            <span class="glyphicon glyphicon-log-out" title="注销" v-on:click="logOff"></span>


        </div>
    </div>
</template>
<script>
    import '../../../lib/js/jqueryForm'
    /*暂时的AJAX上传办法*/
    function HeadFormUpload(){
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
        $(".uploadTouxiang").on("change", function() {
            $(this).parent().submit();
        });
    }
    $(function(){
        HeadFormUpload();
    })
    export default {
        data: function () {
            return {
                userSignInput: '',
                touxiangObj: '',
            }
        },
        components: {

        },
        methods: {
            userInformation: function () {
                this.$store.commit('navActive', 'userInformation');
            },
            none: function () {
                this.$store.commit('navActive', 'none');
            },
            logOff(){
                var that = this;
                if (confirm("注销账号？注销后需要重新输入账号面")) {
                    $.ajax({
                        url: "php/writtenOff.php",
                        type: "POST",
                        dataType: "text",
                        success: function (data) {
                            if (data == "success") {

                                that.$store.commit('userStateChange');

                            } else {
                                alert(data);
                            }
                        }
                    });
                } else {
                    e.preventDefault();
                }
            },
            userSignInputStateChange(state){
                this.$store.commit('userSignInputStateChange', state)
            },
            AA(){
                var that = this;
               alert("123");
            },
            userHeadSubmit(e){
                var that = this;
                /*头像上传*/
                $('.head-change').on('submit',(function(e) {
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
                        success:function(data){
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
                        error:function(data){
                            alert("上传头像出错");
                        }
                    });
                }));
            },
            userHeadUpLoadClick(){
                alert("变化")
                $('.head-change').submit();
            }
        },
        computed: {
            userName: function () {
                return this.$store.state.userName;
            },
            userSign: function () {
                return this.$store.state.userSign;
            },
            userHead: function () {
                return this.$store.state.userHead;
            },
            userSignInputState(){
                return this.$store.state.userSignInputState;
            }
        }
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    .personal-setting{
        position: absolute;
        right:0;
        top:40px;
        background-color: white;
        width:300px;
        height:200px;
        -webkit-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        -moz-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        z-index: 99;
        .clear-touxiang{
            width:250px;
            margin: 20px auto;
            .touxiang{
                display: inline;
                width:100px;
                height:100px;
            }
            .user-introduce{
                vertical-align: top;
                display: inline-block;
                width:130px;
                margin-left:15px;
                position: relative;
                .self-introduce{
                    font-size: 14px;
                    width:130px;
                }
                .self-introduce-container-icon{
                    top:70px;
                    position: absolute;
                    left:115px;
                    cursor: pointer;
                    color: #175ed9;
                }
                .userSign{
                    position: absolute;
                    top:100px;
                    left:0px;
                }
            }
            .head-change{
                font-size: 14px;
                color: #ff371e;
                label{
                    margin-top:2px;
                    cursor:pointer;
                }
                .hide{
                    display: none;
                }
            }
            .headSubmit{
                font-size: 14px;
                cursor:pointer;
                margin-left:15px;
            }
        }
        .operation{
            padding-top:10px;
            width:250px;
            margin: 0 auto;
            border-top:solid 1px rgba(112, 112, 112, 0.42);
            font-size: 15px;
            margin-top:20px;
            span{
            }
            .glyphicon-log-out{
                float: right;
                cursor: pointer;
                color: #ff6557;
            }
        }
        /*.uploadHeadForm{*/
            /*display: inline;*/
            /*//display: none;*/
            /*margin-top:-50px;*/
            /*.hide{*/
                /*display: none;*/
            /*}*/
        /*}*/
    }
</style>
