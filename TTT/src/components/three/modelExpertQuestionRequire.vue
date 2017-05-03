<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">开启互动问答~</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <p class="tips">请填写以下的必要信息，我们将会最快的速度审核您的提交信息。</p>

            <div class="form-group">
                <label class="col-sm-10">问答主题：问答主题将作为社区问答的标题</label>
                <div class="col-sm-12">
                    <input class="form-control" type="email" placeholder="请输入问答标题" v-model="title">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-10">问答主题简介：请对问题主题进行简要描述</label>
                <div class="col-sm-12">
                    <textarea class="form-control huitieContainer" v-model="introduce" placeholder="请输入问答主题简介"></textarea>
                </div>
                <span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>
            </div>
            <button class=" btn btn-primary btn-lg btn-block" v-on:click="postMessage">确认</button>
        </div>
    </div>
</template>
<script>
    //import aaa from '../seven/inform-bottom.vue'

    export default {
        data:function(){
            return{
                title:'',
                introduce:'',
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
                return this.$store.state.gentieContentMaxLength - this.introduce.length;
            }
        },
        methods:{
            close:function() {
                this.$store.commit('modelShow',false);
                this.$store.commit('modelActive','none');
            },
            postMessage(){
                var that = this;
                var title = this.title;
                var introduce = this.introduce;

                $.ajax({
                    url:"../php/expertQuestionRequire.php",
                    data:{
                        title:title,
                        introduce:introduce,
                    },
                    type:"post",
                    success:function(data){
                        alert(data);
                        if(data=="success"){
                            alert("申请成功！");
                            that.$store.commit('modelShow',false);
                            that.$store.commit('modelActive','none');
                        }else if(data == "require exit"){
                            alert("您已经申请过了，后台正在审核");
                        }else if(data == "not expert"){
                            alert("您还不是专家，请先认证为专家")
                        }else{
                            alert(data);
                            alert("专家社区问答申请出错")
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
        height:400px;
        //text-align: center;
        position: absolute;
        left:50%;
        margin-left:-325px;
        top:50%;
        margin-top:-200px;
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
