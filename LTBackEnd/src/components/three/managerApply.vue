<template>
    <div class="backendContent">
        <div class="content-header">
            <div class="search">
                <!--<button class="btn">撤销版主</button>-->
                <!--<button class="btn">设为版主</button>-->
                <!--<button class="btn">忽略</button>-->
                <input type="search" placeholder="搜索">
                <span class="glyphicon glyphicon-search"></span>
            </div>
        </div>
        <div class="introduce">
          <span v-bind:class="{active:requirestate=='confirmed'}" v-on:click="RequireStateChange('confirmed')">现在版主</span>
          <span v-bind:class="{active:requirestate=='waiting'}" v-on:click="RequireStateChange('waiting')">申请名单</span>
          <span v-bind:class="{active:requirestate=='ignore'}" v-on:click="RequireStateChange('ignore')">忽略名单</span>
          <simpleRoDetail></simpleRoDetail>
            <b class="loadCount">已全部加载，共<b>{{counter}}</b>条记录</b>
        </div>

        <div class="flex-title">
          <span>序号</span>
          <span>申请人</span>
          <span class="date">申请日期</span>
          <span class="date">确认日期</span>
          <span v-show="ifShowDetail">版块名</span>
          <span>申请状态</span>
          <span>管理操作</span>
        </div>
        <div class="flex-scroll">
          <managerApplyContent v-on:shijian="count" v-for="(item,index) in manangerObj" v-bind:item="item" v-bind:index="index" v-bind:requirestate="requirestate"></managerApplyContent>
          <loading v-show="loading"></loading>
          <noRecord v-show="ifHasRecord"></noRecord>
        </div>
    </div>
</template>
<script>
  import managerApplyContent from '../four/managerApplyContent.vue'
  import simpleRoDetail from "../four/SimpleRoDeatil.vue"
  import loading from "../tips/loading.vue"
  import noRecord from "../tips/noRecord.vue"
    export default {
        data:function(){
            return{
              manangerObj:'',
              counter:0,
              requirestate:'confirmed',
              loading:true
            }
        },
        components:{
          managerApplyContent,
          simpleRoDetail,
          loading,
          noRecord
        },
        computed:{
          ifShowDetail(){
            return this.$store.state.ifShowDetail
          },
          ifHasRecord(){
            if(this.loading == false && this.counter == 0){
              return true
            }else{
              return false
            }
          }
        },
        methods:{
          /*切换列表视图*/
          RequireStateChange(data){
            //alert(data);
            this.requirestate = data;
            //点击一下初始化
            this.counter = 0;
          },
          count(val){
            this.counter = this.counter + val;
          }
        },
      created(){
        var that = this;
        $.ajax({
          url:"php/backend/managerRequireSelect.php",
          type:"post",
          dataType:"JSON",
          success:function(data){
            that.loading = false;
            that.manangerObj = data;
          },
          error:function(data){
            alert(data);
            alert("版主申请查询失败");
          }
        });
      }
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .backendContent{
        width:100%;
        height:100%;
        position: fixed;
        background: white;
        left:195px;
        top:75px;
        color:#888;

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
        .delete{
            background-color: #ff1d57;
            &:hover{
                background-color: #da1b4f;
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
          b{
            color:red;
          }
        }
    }
    .flex-title{
        width:84%;
        //background: red;
        display: flex;
        justify-content: space-around;
        //margin-bottom: 10px;
        padding-bottom:10px;
        border-bottom: 1px solid rgb(145, 145, 145);
        span{
            min-width:120px;
            text-align: center;
        }
      .date{
        min-width:150px;
      }
    }
    .flex-scroll{
        width:84%;
        height:68%;
        overflow: auto;
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
                input{
                    padding:0;
                    margin:0;
                }
            }
          .date{
            min-width:150px;
          }
        }
    }
</style>
