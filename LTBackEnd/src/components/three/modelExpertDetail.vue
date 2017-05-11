<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">专家申请详情及简介</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
          <div class="content">
            <img v-bind:src="managerTouxiang">
            <div class="introduce">
              <article>{{managerData.advantage}}</article>
              <p class="email">邮箱：<span>{{managerData.email}}</span></p>
            </div>
          </div>
            <!--<span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>-->
          <button class="btn" v-on:click="beExpert" v-if="ifBtnShow">设为专家</button>
          <button class="btn ignore" v-if="ifBtnShow">忽略它</button>
          <button class="btn ignore" v-else>撤销专家</button>
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
    ifBtnShow(){
          if(this.managerData.requireState == "waiting"){
            return true
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
    beExpert(){
      var that = this;
      var requireId = this.managerData.requireId;
      var userId = this.managerData.userId;
      var relName = this.managerData.relName;
      var major = this.managerData.major;
      var company = this.managerData.company;
      var email = this.managerData.email;
      var advantage = this.managerData.advantage;
      var requireDate = this.managerData.requireDate;

      $.ajax({
        url:"php/backend/expertManagerComfirm.php",
        data:{
          requireId:requireId,
          userId:userId,
        },
        type:"post",
        success:function(data){
          if(data=="success"){
            alert("设置成功");
            this.$store.commit({
              type:'modelWindow',
              modelShow:false,
              modelActive:'none',
            })
          }else if(data=="username exit"){
            alert("已经是专家了")
          }else{
            alert(data);
            alert("专家确认有问题");
            //alert(data);
          }
        },
        error:function(data){
          alert("失败");
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
                //border-left: 1px solid #3b8cff;
                vertical-align: top;
                article{
                  height:80px;
                }
                .email{
                  //display: inline-block;
                  //width:430px;
                  //color:Red;
                  //background-color: red;
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
