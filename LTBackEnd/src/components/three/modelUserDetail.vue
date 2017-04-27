<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">用户详情</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
          <div class="content">
            <img v-bind:src="userTouxiang">
            <div class="detail">
              <div class="group">
                <span>用户名：<b>{{userData.userName}}</b></span>
                <span>积分：<b>{{userData.userScore}}</b></span>
              </div>
              <div class="group">
                <span>注册日期：<b>{{userData.userCreatedData}}</b></span>
              </div>
              <div class="group">
                <span>最近活跃：<b>{{userData.userCreatedData}}</b></span>
              </div>
              <div class="group">
                <span>发帖数：<b>{{userData.userFatieCount}}</b></span>
                <span>留言数：<b>{{userData.userGentieCount}}</b></span>
              </div>
              <div class="group">
                <span>被赞数：<b>{{userData.userUpVoteCount}}</b></span>
              </div>
              <div class="group">
                <span>个性签名：<b>{{userData.userSign}}</b></span>
              </div>
            </div>
          </div>

            <!--<span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>-->
            <button class="btn">封禁用户</button>
          <!--<button class="btn" v-on:click="postMessage">忽略它</button>-->
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
    userData(){
          return this.$store.state.userData;
        },
        userTouxiang(){
          return "http://localhost:8081/luntan/php/upload/" + this.$store.state.userData.userHead;
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
                margin-top:60px;
                min-height:100px;
              img{
                display: inline-block;
                width:100px;
                height:100px;
                border: 1px solid #8b8b8b;
              }
              .detail{
                display: inline-block;
                height:100px;
                width:400px;
                //background-color: red;
                //border-left: 1px solid #3b8cff;
                vertical-align: top;
                margin-left:30px;
                .group{
                  span{
                    display: inline-block;
                    min-width:150px;
                    &:nth-child(2){
                      margin-left:90px;
                    }
                    b{
                      font-weight: 600;
                      color: #656565;
                    }
                  }
                }

              }
            }
            .fontCountControl{
                float:right;
                margin-top:5px;
            }
            .btn{
                margin-top:40px;
                background-color: #3b8cff;
              color:white;
                .transition(0.3s);
                &:hover{
                    .transition(0.3s);
                    background-color: #3b8cff;
                }
            }
        }
    }
</style>
