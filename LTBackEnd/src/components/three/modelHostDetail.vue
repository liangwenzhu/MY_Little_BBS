<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">宣言And优势</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
          <div class="content">
            <img v-bind:src="managerTouxiang">
            <article class="introduce">{{managerData.requireReason}}</article>
          </div>
            <!--<span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>-->
          <button class="btn" v-on:click="managerConfirm" v-if="ifConfirm">设为版主</button>
          <button class="btn ignore" v-on:click="postMessage" v-if="ifConfirm">忽略它</button>
          <button class="btn ignore" v-on:click="postMessage" v-else="ifConfirm">撤销版主</button>
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
        managerData(){
          return this.$store.state.managerData;
        },
        managerTouxiang(){
          return "http://localhost:8081/luntan/php/upload/" + this.$store.state.managerData.userHead;
        },
    ifConfirm(){
      if(this.managerData.requireState != "confirmed"){
        return true
      }else{
        return false;
      }
    }
    },
	methods:{
    close:function() {
      this.$store.commit({
        type:'modelWindow',
        modelShow:false,
        modelActive:'none',
      })
    },
    managerConfirm(){
      var that = this;
      var userId = this.managerData.userId;
      var requireId = this.managerData.requireId;
      var sectionId = this.managerData.sectionId;
      var requireState = "confirmed"
      alert(userId + requireId +sectionId);
      $.ajax({
        url:"../php/backend/managerConfirm.php",
        data:{
          userId:userId,
          requireId:requireId,
          sectionId:sectionId,
          requireState:requireState,
        },
        type:"post",
        success:function(data){
          if(data=="success"){
            alert("成功");
          }else if(data =="exit"){
            alert("已经是版主");
            alert(data);
          }else{
            alert("版主确认出错");
            alert(data)
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
            .content{
                margin-top:80px;
                min-height:100px;
              img{
                display: inline-block;
                width:100px;
                height:100px;
                border: 1px solid #8b8b8b;
              }
              .introduce{
                display: inline-block;
                height:100px;
                width:430px;
                //background-color: red;
                //border-left: 1px solid #3b8cff;
                vertical-align: top;
              }
            }
          .fontCountControl{
            float:right;
            margin-top:5px;
          }
          .btn{
            margin-top:20px;
            background-color: #3b8cff;
            color:white;
            .transition(0.3s);
            &:hover{
              .transition(0.3s);
              background-color: #3b8cff;
            }
          }
          .ignore{
            float:right;
            background-color: #ff2b57;
            &:hover{
              .transition(0.3s);
              background-color: #ff2b57;
            }
          }
        }
    }
</style>
