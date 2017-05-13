<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">板块详情及编辑</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
          <div class="content">
            <dl>
              <dt>板块Id</dt>
              <dd>{{managerData.sectionId}}</dd>
            </dl>
            <dl>
              <dt>板块名</dt>
              <dd>{{managerData.sectionName}}</dd>
            </dl>
            <dl>
              <dt>板块简介</dt>
              <dd>{{managerData.sectionIntroduce}}</dd>
            </dl>
            <dl>
              <dt>版主</dt>
              <dd><span class="sectionManager" v-for="item in sectionManagerDataObj">{{item.userName}}</span></dd>
            </dl>
            <dl>
              <dt>板块创建日期</dt>
              <dd>{{managerData.sectionCreatedDate}}</dd>
            </dl>

            <dl>
              <dt>板块最后一次编辑日期</dt>
              <dd>{{managerData.sectionEditordDate}}</dd>
            </dl>
          </div>
          <div class="content editorContent">
            <dl>
              <dt>板块Id</dt>
              <dd>{{managerData.sectionId}}</dd>
            </dl>
            <dl>
              <dt>板块名</dt>
              <dd><input class="form-control" v-model="sectionName"></dd>
            </dl>
            <dl>
              <dt>板块简介</dt>
              <dd><textarea class="form-control" v-model="sectionIntroduce"></textarea></dd>
            </dl>
            <dl>
              <dt>版主</dt>
              <dd><span class="sectionManager" v-for="item in sectionManagerDataObj">{{item.userName}}</span></dd>
            </dl>
            <dl>
              <dt>板块创建日期</dt>
              <dd>{{managerData.sectionCreatedDate}}</dd>
            </dl>
            <dl>
              <dt>板块最后一次修改日期</dt>
              <dd>{{managerData.sectionEditordDate}}</dd>
            </dl>
            <button class="btn" v-on:click="store">保存修改</button>
            <!--<button class="btn keepPushed"  v-on:click="pushedStore">保存修改</button>-->
            <button class="btn keep" v-on:click="showWarning(true)">删除板块</button>
          </div>
          <div class="warn" v-show="ifShowWarning">
            <span class="alarm">Tips</span>
            <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="showWarning(false)">
            <div class="warnTips">
              <p>确定删除板块<b>{{managerData.sectionName}}</b>吗？板块相关删除后不可恢复</p>
              <button class="btn warnBtn">确认删除板块</button>
              <button class="btn cancel" v-on:click="showWarning(false)">取消</button>
            </div>
          </div>
        </div>
      <p class="tips">保存修改后，用户端将被实时影响，若值为空，则默认为原内容。</p>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
          sectionName:'',
          sectionIntroduce:'',
          ifShowWarning:false
        }
    },
    components:{

    },
	computed:{

    managerData(){
      return this.$store.state.sectionObj;
    },
    sectionManagerDataObj(){
      return this.managerData.managerJsonDataObj;
    },
    c_sectionName(){
      if(this.sectionName.length == 0){
        return this.managerData.sectionName;
      }else{
        return this.sectionName;
      }
    },
    c_sectionIntroduce(){
      if(this.sectionIntroduce.length == 0){
        return this.managerData.sectionIntroduce;
      }else{
        return this.sectionIntroduce;
      }
    },
  },
	methods:{
    close:function() {
      this.$store.commit({
        type:'modelWindow',
        modelShow:false,
        modelActive:'none',
      })
    },
    /*板块信息保存方法*/
    store(){
      var that = this;
      var sectionId = this.managerData.sectionId;
      var sectionName = this.c_sectionName;
      var sectionIntroduce = this.c_sectionIntroduce;
      $.ajax({
        url:"php/backend/sectionManagerUpdate.php",
        data:{
          sectionId:sectionId,
          sectionName:sectionName,
          sectionIntroduce:sectionIntroduce,
        },
        type:"post",
        success:function(data){
          if(data=="success"){
            alert("更改成功");
//            $.ajax({
//              url:"php/backend/expertQuestionRequireManagerSelect.php",
//              data:{
//                questionRequireId:questionRequireId,
//              },
//              type:"post",
//              dataType:"json",
//              success:function(data){
//                that.$store.commit('expertQuestionRequireObj',data);
//              },
//              error:function(data){
//                alert("查询刚刚编辑的专家问题申请详细信息失败");
//              }
//            });
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
    showWarning(val){
      this.ifShowWarning = val;
    }
  },

    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .huitie{
      width:1100px;
      height:480px;
      //text-align: center;
      position: absolute;
      left:50%;
      margin-left:-550px;
      top:50%;
      margin-top:-240px;
      background: #ffffff;
      .container{
        width:100%;
        height:440px;
        margin: 0 auto;
        //background: palevioletred;
        position: relative;
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
          //min-height:460px;
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
              .sectionManager{
                margin-left:10px;
                color: #ff6932;
                &:nth-child(1){
                  margin-left:0px ;
                }
              }
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
        .keepPushed{
          background-color: #ff2b57;
          &:hover{
            background-color: rgba(255, 43, 87, 0.86);
          }
        }
        .keep{
          background-color: #ff2b57;
          float:right;
          &:hover{
            background-color: rgba(255, 43, 87, 0.86);
          }
        }
        .warn{
          width:400px;
          height:200px;
          background-color: #f1f1f1;
          position: absolute;
          left:50%;
          margin-left:-200px;
          top:50%;
          margin-top:-100px;
          overflow: hidden;
          .alarm{
            float: left;
            margin-left:10px;
            //margin-top:5px;
          }
          .close{
            background-color: red;
            opacity: 1;
          }
          .warnTips{
            margin: 0 auto;
            margin-top:60px;
            p{
              width:350px;
              margin: 0 auto;
              b{
                color: #ff2b57;
                margin-left:5px;
                margin-right:5px;
              }
            }
            .btn{
              display: inline-block;
            }
            .cancel{
              float: right;
              margin-right:50px;
            }
            .warnBtn{
              background-color: #ff2b57;
              color:white;
              float: left;
              margin-left:50px;
            }
          }
        }
      }
      .tips{
        margin-left:20px;
        color: #ff2b57;
        font-size: 14px;

      }

    }
</style>
