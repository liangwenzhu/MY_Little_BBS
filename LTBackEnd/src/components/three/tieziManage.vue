<template>
    <div class="backendContent-tiezi">
        <div class="content-header">
            <div class="search">
                <button class="btn">顶置帖子</button>
                <button class="btn">取消置顶</button>
                <button class="btn delete">删除帖子</button>
                <input type="search" placeholder="搜索">
                <span class="glyphicon glyphicon-search"></span>

            </div>
        </div>
      <div class="A">
        <div class="introduce">
            <span class="active">全部</span>
            <span>普通</span>
            <span>顶置</span>
            <simpleRoDetail></simpleRoDetail>
            <b class="loadCount">已全部加载，共<b class="light">{{tieziObj.length}}</b>条记录</b>
        </div>

        <div class="flex-title">
            <span>序号</span>
            <span>帖子ID</span>
            <span v-bind:class="{tieziTitle:ifShowDetail == false}">帖子名</span>
            <span>创建人</span>
            <span v-show="ifShowDetail">创建日期<b class="glyphicon glyphicon-arrow-up"></b></span>
            <span>是否顶置</span>
            <span v-show="ifShowDetail">最后留言用户</span>
            <span v-show="ifShowDetail">最后留言日期<b class="glyphicon glyphicon-arrow-up"></b></span>
            <span v-show="ifShowDetail">积分<b class="glyphicon glyphicon-arrow-up"></b></span>
            <span>留言数</span>
        </div>
        <div class="flex-scroll">
          <tieziManageContent v-for = "(item,index) in tieziObj" v-bind:item="item" v-bind:index="index"></tieziManageContent>
          <loading v-show="loading"></loading>
          <noRecord v-show="ifHasRecord"></noRecord>
        </div>
        </div>
    </div>
</template>
<script>
  import simpleRoDetail from "../four/SimpleRoDeatil.vue"
  import tieziManageContent from "../four/tieziManageContent.vue"
  import loading from "../tips/loading.vue"
  import noRecord from "../tips/noRecord.vue"
    export default {
        data:function(){
            return{
              count:'',
              loading:true,
            }
        },
        components:{
          simpleRoDetail,
          tieziManageContent,
          loading,
          noRecord
        },
        computed:{
            tieziObj(){
                return this.$store.state.tieziObj
            },
            ifShowDetail(){
                return this.$store.state.ifShowDetail
            },
          ifHasRecord(){
            if(this.loading == false && this.tieziObj.length == 0){
              return true
            }else{
              return false
            }
          }
        },
        methods:{

        },
        created(){
            var that = this;
            //var tieziMaxNum = that.$store.state.tieziMaxNum;
            //var pageNum = that.$store.state.pageClickNum;
            var tieziMaxNum = 100;
            var pageNum = 1;
            /*分页数据构建*/
            $.ajax({
                url:"php/tieziFenyeSelect.php",
                data:{
                    pageNum:pageNum,
                    tieziMaxNum:tieziMaxNum,
                },
                type:"post",
                dataType:"JSON",
                success:function(data){
                    that.loading = false;
                    that.$store.commit('tieziObj',data);
                },
                error:function(){
                    alert("失败");
                }
            });
        },
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .backendContent-tiezi{
        width:100%;
        height:100%;
        position: fixed;
        background: white;
        left:195px;
        top:75px;
        color:#888;
      .A{
        width:100%;
        height:100%;
        overflow: auto;
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
              .light{
                color:red;
                margin-left:5px;
                margin-right:5px;
              }
            }
        }
        .flex-title{
            width:83%;
            //background: red;
            display: flex;
            justify-content: space-around;
            //margin-bottom: 10px;
            padding-bottom:10px;
            border-bottom: 1px solid rgb(145, 145, 145);
            span{
                min-width:120px;
                text-align: center;
                &:nth-child(1){
                    width:50px;
                }
            }
            .tieziTitle{
                min-width:400px;
            }
        }
        .flex-scroll{
            width:84%;
            height:68%;
            overflow: auto;
            //overflow-x: hidden;
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
                    &:nth-child(1){
                        width:50px;
                    }
                    input{
                        padding:0;
                        margin:0;
                    }
                    /*&:nth-child(4){*/
                    /*background-color: red;*/
                    /*}*/
                }
                .tieziTitle{
                    min-width:400px;
                }
            }
        }
    }
</style>
