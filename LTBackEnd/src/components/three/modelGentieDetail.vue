<template>
    <!--帖子详情-->
    <div class="detail">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft"><b>详情</b></span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <section class="section-floor other-floor">
            <div class="content">

              <div class="user-information">
                <p class="user-id">{{gentieData.userName}}</p>
                <div class="user-touxiang">
                  <img v-bind:src="userHead">
                  <p class="level">亲卫队-预备军</p>
                </div>
              </div>
              <div class="question-describe">
                <div class="tiezi-Time">
                  <div class="tiezi-time"><i class="glyphicon glyphicon-user"></i>发表于<span>{{gentieData.gentieCreaterData}}</span><small class="gentieId"></small>
                    <div class="floor" id="3"><b>#{{gentieData.floorNum}}</b></div>
                  </div>
                </div>
                <div class="question-main">
                  <article>
                    <!--<blockquote v-if="item.beigentieFloorNum !=1">-->
                      <blockquote v-if="beigentieFloorNum != 1">
                      <span>引用<b class="beifloorNum">{{gentieData.beigentieFloorNum}}</b>楼<i>{{gentieData.beigentieUserName}}</i>的回复：</span><p>{{gentieData.beigentieContent}}</p>
                    </blockquote>
                    <p class="article-content">{{gentieData.gentieContent}}</p>
                  </article>
                  <div class="section-footer">
                    <div class="sign">
                      <div class="little-sign">
                        <span class="glyphicon glyphicon-pencil"></span><b></b><i>小尾巴分割线</i><b></b>
                      </div>
                      <p>{{gentieData.userSign}}</p>
                    </div>
                    <div class="operation">
                      <!--<button class="btn messag" >回帖</button>-->
                      <i class="glyphicon glyphicon-thumbs-up up" title="赞" ></i><b>【{{gentieData.dianzanCount}}】</b>
                      <i class="glyphicon glyphicon-thumbs-down down" title="踩"></i><b>【{{gentieData.caiCount}}】</b>
                      <button class="btn right-btn proven" >忽略举报</button>
                      <button class="btn right-btn delete">删除</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
          gentieContent:'',
          //tieziTitle:1
        }
    },
    components:{

    },
	computed:{
    gentieData(){
      return this.$store.state.gentieData;
    },
    beigentieFloorNum(){
      return this.$store.state.gentieData.beigentieFloorNum;
    },
    userHead(){
      return "http://localhost:8081/luntan/php/upload/" + this.$store.state.gentieData.userHead;
    },
    },
	methods:{
        close:function() {
            this.$store.commit({
              type:'modelWindow',
              modelShow:false,
              modelActive:"none",
            });

        },
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .detail{
      width:1200px;
      height:440px;
      //text-align: center;
      position: absolute;
      left:50%;
      margin-left:-600px;
      top:50%;
      margin-top:-220px;
      background: #ffffff;
      .container{
        width:100%;
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
              color: #6c6c6c;
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
        .section-floor{
          width:100%;
          //margin-top:30px;
          margin-bottom:30px;
          /*-webkit-box-shadow:0 0 5px rgba(0, 0, 0, 0.25);*/
          /*-moz-box-shadow:0 0 5px rgba(0, 0, 0, 0.25);*/
          /*box-shadow:0 0 5px rgba(0, 0, 0, 0.25);*/
          margin-top:50px;
          color:black;
          &:last-child{
            margin-bottom:20px;
          }
          .title{
            width:1175px;
            //height:31px;
            background-color: #ffffff;
            border-bottom:2px solid rgba(194, 194, 194, 0.82);
            line-height: 31px;
            color: inherit;
            font-weight: 800;
            padding-top:5px;
            padding-bottom: 5px;
            .score{
              float:right;
              //margin-right:20px;
            }
          }
          .content{
            width:1200px;
            //background-color: rgb(148, 148, 148);
            //margin-top:15px;
            //margin-left:-15px;
            margin-top: 15px;
            .user-information{
              width:220px;
              display: inline-block;
              //background-color: rgba(26, 74, 196, 0.15);
              //background: red;
              margin:0px;
              //margin-left:-20px;
              .user-id{
                width:200px;
                height:34px;
                margin: 0 auto;
                color:inherit;
                font-weight: 800;
                //background-color: #ff43e5;
                line-height: 34px;
              }
              .user-touxiang{
                width:210px;
                .border(1px,solid, rgb(194, 194, 194));
                margin: 0 auto;
                text-align: center;
                //margin-left:20px;
                img{
                  margin-top:10px;
                  width:200px;
                  height:200px;
                  background-color: rgba(255, 255, 255, 0.95);
                  padding:10px;
                }
                .level{
                  margin-top:25px;
                  padding-bottom:25px;
                  color:inherit;
                }
              }
            }
            .question-describe{
              width:950px;
              margin:0px;
              display: inline-block;
              //float:right;
              vertical-align: top;
              .tiezi-Time{
                .tiezi-time{
                  height:34px;
                  border-bottom:1px solid rgb(194, 194, 194);
                  line-height: 34px;
                  color:inherit;
                  i{
                    text-align: center;
                    font-size: 15px;
                    width:21px;
                    height:21px;
                    line-height:23px;
                    background-color: #e6005c;
                    margin-right:20px;
                  }
                  .floor{
                    float: right;
                    margin-right:15px;
                    b{
                      margin-right:30px;
                    }
                    input{
                      margin-left:10px;
                      display: inline;
                      width:60px;
                      height:21px;
                      font-size: 16px;
                    }
                  }
                }
              }
              .question-main{
                position: relative;
                min-height:320px;
                h2{
                  font-size: 20px;
                  border-bottom: 1px dashed rgb(194, 194, 194);
                  padding-bottom:20px;
                  color:inherit;
                }
                article{
                  width:920px;
                  height: 100px;
                  margin: 0 auto;
                  //background-color: #beffc4;
                  line-height: 30px;
                  letter-spacing: 1px;
                  color: inherit;
                  padding-bottom:120px;
                  blockquote{
                    font-size:14px;
                    color: rgba(0, 0, 0, 0.98);
                    padding-top:5px;
                    padding-bottom:5px;
                    background-color: rgb(233, 233, 233);
                    border-left: 5px solid #656565;
                  }
                  .article-content{
                    height:90px;
                    overflow: auto;
                  }
                }
                .section-footer{
                  position: absolute;
                  bottom:0;
                  .sign{
                    position: relative;
                    width:50%;
                    border-top:1px solid rgb(194, 194, 194);
                    padding-top: 15px;
                    .little-sign{
                      width:100%;
                      position: absolute;
                      display: block;
                      top:-25px;
                      span{
                        color:inherit;
                      }
                      b{
                        display: inline-block;
                        width:100px;
                        height:1px;
                        background-color: rgba(255, 255, 255, 0.7);
                      }
                      i{
                        vertical-align: middle;
                        margin-left:10px;
                        margin-right:10px;
                        color:inherit;
                      }
                    }
                    p{
                      color: #6c6c6c;
                      font-size: 14px;
                    }
                  }
                  .operation{
                    width:945px;
                    border-top:1px solid rgb(233, 233, 233);
                    padding-top: 15px;
                    .messag{
                      width:70px;
                      background-color: #39b3d7;
                      color:inherit;
                    }
                    .delete{

                    }
                    .right-btn{
                      float: right;
                      //width:70px;
                      .transition(0.2s);
                      background-color: white;
                      color:inherit;
                      margin-right:20px;
                      &:hover{
                        .transition(0.2s);
                        color:white;
                        background-color: #39b3d7;
                      }
                    }
                  }
                }
              }
            }
          }
        }
        .other-floor{
          color:black;
          .content{
            .question-describe{
              .tiezi-Time{
                .tiezi-time{
                  i{
                    background-color: #3b8cff;
                    color:white;
                  }
                }
              }
              .question-main{
                article{
                  margin-top:20px;
                }
                .operation{
                  i{
                    display: inline-block;
                    margin-left:20px;
                    //background-color: #ffffff;
                    color:inherit;
                    width: 25px;
                    height:25px;
                    line-height: 25px;
                    text-align: center;
                    vertical-align: middle;
                    .pic-circle(4px);
                    //cursor: pointer;
                    .transition(0.2s);
                  }
                  b{
                    color: inherit;
                  }
                  .up{
                    &:hover{
                      //background-color: #1ccdaa;
                      .transition(0.2s);
                    }
                  }
                  .down{
                    &:hover{
                      //background-color: #ff4f48;
                      .transition(0.2s);
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
</style>
