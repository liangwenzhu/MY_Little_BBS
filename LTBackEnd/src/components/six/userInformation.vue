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
            <span class="head-change" v-on:click="touxiangChange">更改头像</span>
        </div>
        <div class="operation">
            <span><i class="glyphicon glyphicon-cog"></i>账号设置</span>
            <span class="glyphicon glyphicon-log-out" title="注销" v-on:click="logOff"></span>
            <!--<form class="uploadHeadForm" >-->
                <!--<input class="head-upload" type="file" name="file" id="file" v-on:change="AA"/>-->
                <!--&lt;!&ndash;<input type="submit" name="submit" value="Submit" v-on:click="AA"/>&ndash;&gt;-->
                <!--&lt;!&ndash;<button v-on:click="AA"></button>&ndash;&gt;-->
            <!--</form>-->
            <form class="uploadHeadForm" action="http://localhost:8081/luntan/php/uploadUserHead.php" method="post" enctype="multipart/form-data">
                <label for="file">Filename:</label>
                <input id="uploadTouxiang" type="file" name="file" v-on:change="uploadTouxiang"/>
                <br />
                <input id="uploadTouxiangSubmit" type="submit" name="submit" value="Submit" />
            </form>
        </div>
    </div>
</template>
<script>
    //var a = require('../../../lib/js/jqueryForm.js');
    //import jqForm from '../../../lib/js/jqueryForm.js'
    module.exports = {
        data: function () {
            return {
                userSignInput: '',
                touxiangObj: '',
            }
        },
        components: {
//             jqForm
        },
        methods: {
//            AA(e){
//                e.preventDefault();
//                //序列化表单
//                alert("123");
//                var serializeData = $('.uploadHeadForm').serialize();
//                // var formData = new FormData(this);
//                $('.uploadHeadForm').ajaxSubmit({
//                    type:'POST',
//                    url: 'php/uploadUserHead.php',
//                    //dataType: 'json',
//                    data: serializeData,
//                    // data: formData,
//                    //attention!!!
//                    contentType: false,
//                    cache: false,
//                    processData:false,
//                    beforeSubmit: function() {
//                        alert("123");
//                        //上传前的操作
//                    },
//                    uploadProgress: function (event, position, total, percentComplete){//上传中的操作
//                        alert("上传中");
//                    },
//                    success:function(data){//服务器返回操作
//                        if(data == "error format"){
//                            alert("格式错误");
//                        }else if(data == "error size"){
//                            alert("图片必须小于100kb");
//                        }else if(data == "error"){
//                            alert("出现未知错误");
//                        }else{
//                           alert(data);
//                        }
//                    },
//                    error:function(data){//JS代码有错
//                        alert(data);
//                    }
//                });
//            },

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
            submitSign(){
                var that = this;
                $.ajax({
                    url: "php/updateUserSign.php",
                    type: "GET",
                    data: {
                        userSign: that.userSignInput
                    },
                    dataType: "text",
                    success: function (data) {
                        if (data == "success") {
                            alert("成功")
                            that.$store.commit('userStateChange');
                        } else {
                            alert("签名变更出错")
                        }
                    }
                });
            },

            touxiangChange(){
                $("#uploadTouxiang").trigger("click");
            },
            uploadTouxiang(){
                $("#uploadTouxiangSubmit").trigger("click");
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
                cursor:pointer;
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
        .uploadHeadForm{
            display: none;
            margin-top:-50px;
        }
    }
</style>
