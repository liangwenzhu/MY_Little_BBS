<template>
    <div class="backendContent">
        <div class="content-header">
            <div class="search">
                <button class="btn" v-on:click="addManager">添加管理员</button>
                <!--<button class="btn">发布文章</button>-->
                <input type="search" placeholder="搜索用户">
                <span class="glyphicon glyphicon-search"></span>
            </div>
          <!--<img class="touxiang" v-bind:src="touxiang">-->
        </div>
        <div class="introduce">
            <!--<span class="active">全部</span>-->
            <!--<span>顶置</span>-->
            <simpleRoDetail></simpleRoDetail>
            <b class="loadCount">已全部加载，共<b class="light">{{userObj.length}}</b>条记录</b>
        </div>
        <div class="flex-title">
            <span>序号</span>
            <span>用户名</span>
            <span class="data">创建日期<b class="glyphicon" v-bind:class="userIdClassObj" v-on:click="orderBy('userId')"></b></span>
            <span class="data" v-show="ifShowDetail">最后留言日期</span>
            <span v-show="ifShowDetail">积分
              <b class="glyphicon" v-bind:class="userScoreClassObj" v-on:click="orderBy('userScore')"></b>
            </span>
            <span v-show="ifShowDetail">发帖数</span>
            <span v-show="ifShowDetail">留言数</span>
            <span v-show="ifShowDetail">被赞数</span>
        </div>
        <div class="flex-scroll">
          <userFlexContent v-for="item in userObj" v-bind:item="item" ></userFlexContent>
        </div>
    </div>
</template>
<script>
  import simpleRoDetail from "../four/SimpleRoDeatil.vue"
  import userFlexContent from "../four/userFlexContent.vue"
    export default {
        data:function(){
            return{
              orderByUserId:true,
              orderByUserScore:true,
            }
        },
        components:{
          simpleRoDetail,
          userFlexContent
        },
        computed:{
          userObj(){
            return this.$store.state.userObj;
          },
          ifShowDetail(){
            return this.$store.state.ifShowDetail
          },
          touxiang(){
            return 'http://localhost:8081/luntan/php/upload/' + this.$store.state.userHead
          },
          userScoreClassObj(){
            return {
              'glyphicon-arrow-up':this.orderByUserScore == true,
              'glyphicon-arrow-down':this.orderByUserScore == false,
            }
          },
          userIdClassObj(){
            return {
              'glyphicon-arrow-up':this.orderByUserId == true,
              'glyphicon-arrow-down':this.orderByUserId == false,
            }
          },
        },
        methods:{
            addManager(){
                this.$store.commit({
                    type:'modelWindow',
                    modelShow:true,
                    modelActive:'register',
                })
            },
          /*排序方法,参数为key*/
          orderBy(val){
            //alert(val);
            var orderByKey = val;
            var order;
            if(val == "userId"){
              /*key为userId*/
              /*将其余的状态设为初始*/
              this.orderByUserScore = true;

              this.orderByUserId = !this.orderByUserId;
              if(this.orderByUserId == true){
                order = 'asc'
              }else{
                order = 'desc'
              }
            }else if(val == "userScore"){
              /*key为userScore*/
              this.orderByUserId = true;
              this.orderByUserScore = !this.orderByUserScore;
              if(this.orderByUserScore == true){
                order = 'asc'
              }else{
                order = 'desc'
              }
            }

            //alert(order);
            var that = this;
            $.ajax({
              url:"php/backend/user.php",
              type:"post",
              data:{
                orderByKey:orderByKey,
                order:order
              },
              dataType:"JSON",
              success:function(data){
                that.$store.commit('userObj',data);
              },
              error:function(){
                alert("失败");
              }
            });

          }
        },
        created(){
          var that = this;
          var orderByKey = 'userId';
          var order = 'asc';
          $.ajax({
            url:"php/backend/user.php",
            type:"post",
            data:{
              orderByKey:orderByKey,
              order:order
            },
            dataType:"JSON",
            success:function(data){
              that.$store.commit('userObj',data);
            },
            error:function(){
              alert("失败");
            }
          });
        }
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .content-header{
      position: relative;
      .touxiang{
        position: absolute;
        top:0;
        left:200px;
        width:70px;
        height:70px;
        border:1px solid #c0c0c0;
      }
    }
    .search{
      width:86%;
      //margin-right:245px;
      margin-top:20px;
      margin-left:15px;
      margin-bottom: 15px;
      //overflow: hidden;
      position: relative;
      span{
        position: absolute;
        width:20px;
        height:20px;
        //background: red;
        right:45px;
        top:6px;
        font-size: 20px;
        cursor: pointer;
      }
      button{
        background: #3b8cff;
        color:white;
        &:hover{
          background: rgba(59, 140, 255, 0.91);
          color:white;
        }
      }
      input{
        float: right;
        width:245px;
        height:32px;
        .pic-circle(20px);
        padding-left:15px;
        padding-right:25px;
        border: none;
        outline: none;
        color:rgb(102, 102, 102);
        font-size: 14px;
        background: #f1f2f4;
        margin-right:35px;
      }
    }
    .tieziManage{
      background: red;
      overflow: auto;
    }
    .introduce{
      margin-left:15px;
      width:100%;
      margin-bottom:15px;
      span{
        font-size: 14px;
        margin-left:10px;
        cursor: pointer;
        &:hover{
          color:#3b8cff;
        }
      }
      .active{
         color:#3b8cff;
       }
      .loadCount{
        font-size: 14px;
        float:right;
        margin-right:245px;
        .light{
          color:red;
          margin-left:5px;
          margin-right:5px;
        }
      }
    }
    .flex-title{
      width:82.7%;
      //background: red;
      display: flex;
      justify-content: space-around;
      //margin-bottom: 10px;
      padding-bottom:10px;
      border-bottom: 1px solid rgb(145, 145, 145);
      span{
        min-width:120px;
        text-align: center;
        b{
          color:black;
          &:hover{
            color:#3b8cff;
            cursor: pointer;
          }
        }
      }
      .data{
        min-width:150px;
      }
    }
    .flex-scroll{
      width:84%;
      height:68%;
      overflow: scroll;
      overflow-x: hidden;
      .flex-content{
        font-size: 15px;
        width:100%;
        padding-top:10px;
        padding-bottom:10px;
        border-bottom:1px solid #c2c2c2;
        //background: red;
        display: flex;
        justify-content: space-around;
        &:hover{
          background-color: #e9e9e9;
        }
        span{
          min-width:120px;
          text-align: center;
          /*&:nth-child(4){*/
          /*background-color: red;*/
          /*}*/
        }
        .data{
          min-width:150px;
        }
      }
    }
</style>
