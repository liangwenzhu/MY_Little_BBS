<template>
    <!--优势描述-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">申请版主</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <p class="tips">请简述您申请的理由或个人优势，我们将尽快给您答复</p>
            <textarea class="form-control huitieContainer" v-model="advantageContent" placeholder="请简略描述下您的优势"></textarea>
            <span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>
            <button class="btn btn-success huitie-btn" v-on:click="managerRequire">提交申请</button>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            advantageContent:''
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
            return this.$store.state.gentieContentMaxLength - this.advantageContent.length;
        }
    },
	methods:{
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        },
        managerRequire(){
            var that = this;
            var advantage = this.advantageContent;
            $.ajax({
                url:"../php/managerRequire.php",
                data:{
                    advantage:advantage,
                },
                type:"post",
                success:function(data){
                    if(data=="success"){
                        alert("版主申请成功，后台将进行审核");
                        that.$store.commit('modelShow',false);
                        that.$store.commit('modelActive','none');
                    }else if(data == "username exit"){
                        alert("你已经申请过了，后台正在审核中")
                    }else{
                        alert("有问题");
                        alert(data);
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
        width:600px;
        height:260px;
        //text-align: center;
        position: absolute;
        left:50%;
        margin-left:-300px;
        top:50%;
        margin-top:-130px;
        background: #ffffff;
        .container{
            width:580px;
            height:260px;
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
            }
            .huitie-btn{
                margin-top:20px;
                background-color: #3276b1;
                .transition(0.3s);
                border:none;
                &:hover{
                    .transition(0.3s);
                    background-color: #315a94;
                }
            }
        }
    }
</style>
