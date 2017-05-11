<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">专家招募</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <p class="tips">请留下您的个人简介，如姓名，熟悉的领域，所在公司，经历等。</p>
            <div class="form-group">
                <label class="col-sm-2 control-label">真实姓名：</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="您的真实姓名" v-model="relName">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">擅长领域：</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="您所擅长的领域" v-model="major">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">所在的公司：</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="您现在所在的公司" v-model="company">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">职业：</label>
                <div class="col-sm-10">
                    <input class="form-control" placeholder="您的职业" v-model="job">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-10">邮箱：我们将会在近快将结果发送到您的邮箱上</label>
                <div class="col-sm-12">
                    <input class="form-control" type="email" placeholder="请输入您的邮箱地址" v-model="email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-10">个人经历：如曾经开发了什么项目、编写了什么书籍等</label>
                <div class="col-sm-12">
                    <textarea class="form-control huitieContainer" v-model="advantage" placeholder="请输入您的个人简介"></textarea>
                </div>
            </div>
            <span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>
            <button class=" btn btn-primary btn-lg btn-block" v-on:click="postMessage">确认</button>
        </div>
    </div>
</template>
<script>
    //import aaa from '../seven/inform-bottom.vue'

    export default {
        data:function(){
            return{
                relName:'',
                major:'',
                company:'',
                job:'',
                email:'',
                advantage:'',
            }
        },
        components:{
            //aaa,
        },
        computed:{
            modelShow(){
                return this.$store.state.modelShow
            },
            modelActive(){
                return this.$store.state.modelActive
            },
            gentieContentMaxLength(){
                return this.$store.state.gentieContentMaxLength - this.advantage.length;
            }
        },
        methods:{
            close:function() {
                this.$store.commit('modelShow',false);
                this.$store.commit('modelActive','none');
            },
            postMessage(){
                var that = this;
                var relName = this.relName;
                var major = this.major;
                var company = this.company;
                var job = this.job;
                var email = this.email;
                var advantage = this.advantage;

                $.ajax({
                    url:"php/expertRequire.php",
                    data:{
                        relName:relName,
                        major:major,
                        company:company,
                        job:job,
                        email:email,
                        advantage:advantage,
                    },
                    type:"post",
                    success:function(data){
                        if(data=="success"){
                            alert("申请成功！");
                            that.$store.commit('modelShow',false);
                            that.$store.commit('modelActive','none');
                        }else if(data == "username exit"){
                            alert("您已经申请过了，后台正在审核");
                        }else{
                            alert("专家审核出错")
                        }
                    },
                    error:function(data){
                        alert("失败");
                    }
                });
            }
        },
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .huitie{
        width:650px;
        height:600px;
        //text-align: center;
        position: absolute;
        left:50%;
        margin-left:-325px;
        top:50%;
        margin-top:-300px;
        background: #ffffff;
        .container{
            width:650px;
            //height:260px;
            margin: 0 auto;
            //background: palevioletred;

            .top-title{
                overflow: hidden;
                .vote-topleft{
                    float: left;
                    margin-top:10px;
                    font-size: 16px;

                    b{
                        margin-left:5px;
                        margin-right:5px;
                        color:red;
                    }
                    img{
                        width:15px;
                        margin-right:10px;
                    }
                }
                .close{
                    width:20px;
                    position: absolute;
                    right:0px;
                    margin-right:30px;
                    margin-top:10px;
                    opacity: 1;
                }
            }
            .tips{
                font-size: 14px;
                margin-top: 30px;
            }
            .huitieContainer{
                margin-top:0px;
                min-height:100px;
            }
            .fontCountControl{
                float:right;
                margin-top:5px;
                margin-bottom:15px;
            }
            label{
                font-size: 14px;
                vertical-align: middle;
            }
            .shortLabel{
                display: inline-block;
            }
            input{
                margin-bottom:15px;
            }
            .btn{

                background-color: #3b8cff;
                border:none;
                color:white;
                &:hover{
                    .transition(0.3s);
                    background-color: #3b8cff;
                }
            }
        }
    }
</style>
