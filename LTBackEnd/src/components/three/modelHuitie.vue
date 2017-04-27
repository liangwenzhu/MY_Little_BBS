<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">对<b>1</b>楼，我也说一句</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <textarea class="form-control huitieContainer" v-model="gentieContent"></textarea>
            <span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>
            <button class="btn btn-success huitie-btn" v-on:click="postMessage">发表回复</button>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            gentieContent:'',
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
            return this.$store.state.gentieContentMaxLength - this.gentieContent.length;
        }
    },
	methods:{
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        },
        postMessage(){
            var that = this;
            var tieziId = this.$store.state.firstFloorObj.tieziId;
            var gentieContent = this.gentieContent;
            $.ajax({
                url:"../php/gentieFllow.php",
                data:{
                    tieziId:tieziId,
                    gentieContent:gentieContent,
                    beigentieFloorNum:1,
                },
                type:"post",
                success:function(data){
                    if(data=="success"){
                        alert("回复成功，获得5点积分奖励");
                        that.$store.commit('stateChange');
                        that.$store.commit('modelShow',false);
                        that.$store.commit('modelActive','none');
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
<style lang="less" rel="stylesheet/less" type="text/css" scope>
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
            .huitieContainer{
                margin-top:80px;
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
                &:hover{
                    .transition(0.3s);
                    background-color: #315a94;
                }
            }
        }
    }
</style>
