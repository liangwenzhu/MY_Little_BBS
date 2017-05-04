<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">专家问答申请</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
          <p class="title">{{managerData.questionTitle}}</p>
          <div class="content">
          <img v-bind:src="managerTouxiang">
          <article class="introduce">{{managerData.questionIntroduce}}</article>
        </div>
            <!--<span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>-->
          <button class="btn" v-on:click="detailEditor">详细编辑</button>
          <button class="btn keep">忽略它</button>
          <!--<button class="btn keep">保存修改</button>-->
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
          return this.$store.state.expertQuestionRequireObj;
        },
        managerTouxiang(){
          return "http://localhost:8081/luntan/php/upload/" + this.$store.state.expertQuestionRequireObj.userHead;
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
    detailEditor(){
      var that = this;
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelExpertQuestionRequireEditor',
      });
    },
    },
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
            .title{
              margin-top:40px;
              span{
                color:red;
                font-size: 12px;
                margin-left:40px;
                cursor: pointer;
              }
            }
            .content{
                margin-top:20px;
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
                vertical-align: top;
                span{
                  color:red;
                  font-size: 12px;
                  margin-left:40px;
                  cursor: pointer;
                }
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
