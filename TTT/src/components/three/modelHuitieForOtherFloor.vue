<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">对<b>{{floorNum}}</b>楼，我也说一句</span>
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
            gentieContent:''
        }
    },
    components:{

    },
	computed:{
        floorNum(){
            return this.$store.state.floorNum;
        },
        beiGentieContent(){
            return this.$store.state.beiGentieContent;
        },
        beiGentieUserName(){
            return this.$store.state.beiGentieObj.userName;
        },
        firstFloorObj(){
            return this.$store.state.firstFloorObj;
        },
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
            var gentieContent = this.gentieContent;
            var thisFloor = this.floorNum;
            var tieziId = this.$store.state.firstFloorObj.tieziId;
            var beiGentieContent = this.beiGentieContent;
            var beiGentieUserName = this.beiGentieUserName;
            var tieziCreater = this.firstFloorObj.tieziCreater; //楼主ID,被跟帖表使用
            var tieziTitle =  this.firstFloorObj.tieziTitle;
            $.ajax({
                url:("../php/gentieFllow.php"),
                type:"post",
                data:{
                    gentieContent:gentieContent,
                    beigentieFloorNum:thisFloor,
                    beiGentieContent:beiGentieContent,
                    beiGentieUserName:beiGentieUserName,
                    tieziId:tieziId,
                },
                success:function(data){
                    if(data=="success"){
                        alert("回帖成功");
                        that.$store.commit('stateChange');
                        that.$store.commit('modelShow',false);
                        that.$store.commit('modelActive','none');
                        $.ajax({
                            url:("../php/tongzhiFllow.php"),
                            type:"post",
                            data:{
                                tieziId:tieziId,
                                tieziCreater:tieziCreater,
                                tieziTitle:tieziTitle,
                            },
                            success:function(data){
                                if(data=="tongzhisuccess"){
                                    alert("插入数据成功");
                                }else if(data=="selfMessage"){
                                    alert("自己留的言");
                                }else{
                                    alert("成功进入但失败");
                                    alert(data);
                                }
                            },
                            error:function(data){
                                alert("失败");
                                alert(data);
                            }
                        })
                    }else{
                        alert(data);
                        alert("有问题")
                    }
                },
                error:function(data){
                    alert("出错");
                    alert(data);
                }
            })
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
