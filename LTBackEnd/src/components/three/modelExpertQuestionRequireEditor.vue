<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">专家问答申请编辑</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
          <div class="content">
            <dl>
              <dt>用户名</dt>
              <dd>{{managerData.userName}}</dd>
            </dl>
            <dl>
              <dt>专家名</dt>
              <dd>{{managerData.relName}}</dd>
            </dl>
            <dl>
              <dt>活动主题</dt>
              <dd>{{managerData.questionTitle}}</dd>
            </dl>
            <dl>
              <dt>活动时间</dt>
              <dd>{{managerData.questionShowTime}}</dd>
            </dl>
            <dl>
              <dt>问答简单介绍</dt>
              <dd>{{managerData.questionIntroduce}}</dd>
            </dl>
            <dl>
              <dt>问答详细介绍</dt>
              <dd>{{managerData.questionDetailIntroduce}}</dd>
            </dl>
            <dl>
              <dt>专家简介</dt>
              <dd>{{managerData.advantage}}</dd>
            </dl>
            <dl>
              <dt>最后一次编辑时间</dt>
              <dd>{{managerData.questionEditTime}}</dd>
            </dl>
          </div>
          <div class="content editorContent">
            <dl>
              <dt>用户名</dt>
              <dd>{{managerData.userName}}</dd>
            </dl>
            <dl>
              <dt>专家名</dt>
              <dd>{{managerData.relName}}</dd>
            </dl>
            <dl>
              <dt>活动主题</dt>
              <dd><input class="form-control" v-model="questionTitle"></dd>
            </dl>
            <dl>
              <dt>活动时间</dt>
              <dd><input class="form-control" v-model="questionShowTime"></dd>
            </dl>
            <dl>
              <dt>问答简单介绍</dt>
              <dd><textarea class="form-control" v-model="questionIntroduce"></textarea></dd>
            </dl>
            <dl>
              <dt>问答详细介绍</dt>
              <dd><textarea class="form-control" v-model="questionDetailIntroduce"></textarea></dd>
            </dl>
            <dl>
              <dt>专家简介</dt>
              <dd><textarea class="form-control" v-model="advantage"></textarea></dd>
            </dl>
            <button class="btn" v-on:click="store">保存修改</button>
            <button class="btn keep">通过审核，发布</button>
          </div>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
          questionTitle:'',
          questionShowTime:'',
          questionIntroduce:'',
          questionDetailIntroduce:'',
          advantage:'' ,
          questionRequireStatus:'modified',
        }
    },
    components:{

    },
	computed:{
    managerData(){
      return this.$store.state.expertQuestionRequireObj;
    },
    managerTouxiang(){
      return "http://localhost:8081/luntan/php/upload/" + this.$store.state.expertQuestionRequireObj.userHead;
    },
    c_userId(){
      return this.managerData.userId;
    },
    c_expertId(){
      return this.managerData.expertId;
    },
    c_questionRequireId(){
      return this.managerData.questionRequireId;
    },
    c_questionTitle(){
      if(this.questionTitle.length == 0){
        return this.managerData.questionTitle;
      }else{
        return this.questionTitle;
      }
    },
    c_questionShowTime(){
      if(this.questionTitle.length == 0){
        return this.managerData.questionShowTime;
      }else{
        return this.questionShowTime;
      }
    },
    c_questionIntroduce(){
      if(this.questionIntroduce.length == 0){
        return this.managerData.questionIntroduce;
      }else{
        return this.questionIntroduce;
      }
    },
    c_questionDetailIntroduce(){
      if(this.questionDetailIntroduce.length == 0){
        return this.managerData.questionDetailIntroduce;
      }else{
        return this.questionDetailIntroduce;
      }
    },
    c_advantage(){
      if(this.advantage.length == 0){
        return this.managerData.advantage;
      }else{
        return this.advantage;
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
    store(){
      var that = this;
      var userId = this.c_userId;
      var expertId = this.c_expertId;
      var questionRequireId = this.c_questionRequireId;
      var questionTitle = this.c_questionTitle;
      var questionShowTime = this.c_questionShowTime;
      var questionIntroduce = this.c_questionIntroduce;
      var questionDetailIntroduce = this.c_questionDetailIntroduce;
      var advantage = this.c_advantage;
      var questionRequireStatus = this.questionRequireStatus;
      $.ajax({
        url:"php/backend/expertQuestionRequireManagerUpdate.php",
        data:{
          userId:userId,
          expertId:expertId,
          questionRequireId:questionRequireId,
          questionTitle:questionTitle,
          questionShowTime:questionShowTime,
          questionIntroduce:questionIntroduce,
          questionDetailIntroduce:questionDetailIntroduce,
          advantage:advantage,
          questionRequireStatus:questionRequireStatus,
        },
        type:"post",
        success:function(data){
          if(data=="success"){
            alert("更改成功");
            /*嵌套查询，查询刚更改的最新的数据，并传给vuex*/
            $.ajax({
              url:"php/backend/expertQuestionRequireManagerSelect.php",
              data:{
                questionRequireId:questionRequireId,
              },
              type:"post",
              dataType:"json",
              success:function(data){
                that.$store.commit('expertQuestionRequireObj',data);
              },
              error:function(data){
                alert("查询刚刚编辑的专家问题申请详细信息失败");
              }
            });
            //嵌套查询结束
          }else{
            alert("不是success");
            alert(data);
          }
        },
        error:function(data){
          alert("编辑专家问题申请详细信息失败");
        }
      });
    },
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .huitie{
      width:1100px;
      height:600px;
      //text-align: center;
      position: absolute;
      left:50%;
      margin-left:-550px;
      top:50%;
      margin-top:-300px;
      background: #ffffff;
      .container{
        width:100%;
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
        .editorContent{
          margin-left:40px;
        }
        .content{
          margin-top: 20px;
          width:510px;
          //height:260px;
          //background-color: #949494;
          display: inline-block;
          vertical-align: top;
          dl{
            margin-bottom: 10px;
            dt{
              font-size:15px;
            }
            dd{
              font-size: 14px;
              text-align: justify;
            }
          }
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
        .keep{
          background-color: #ff2b57;
          float:right;
          &:hover{
            background-color: rgba(255, 43, 87, 0.86);
          }
        }
      }
    }
</style>
