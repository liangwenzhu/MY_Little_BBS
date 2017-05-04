<template>
    <div class="backendContent-tiezi">
        <div class="content-header">
            <div class="search">
                <button class="btn">发布公告</button>
                <button class="btn">发布文章</button>
                <button class="btn">顶置帖子</button>
                <button class="btn">取消置顶</button>
                <button class="btn delete">删除帖子</button>
                <input type="search" placeholder="搜索">
                <span class="glyphicon glyphicon-search"></span>
            </div>
        </div>

        <!--嵌套路由开始-->
        <router-view></router-view>


    </div>
</template>
<script>
  import simpleRoDetail from "../four/SimpleRoDeatil.vue"
  import gentieJubaoRouter from "../four/gentieJubaoRouter.vue"
  import jubaoManageContent from "../four/jubaoManageContent.vue"
    export default {
        data:function(){
            return{
              count:'',
              jubaoObj:''
            }
        },
        components:{
          simpleRoDetail,
          gentieJubaoRouter,
          jubaoManageContent
        },
        computed:{
            tieziObj(){
                return this.$store.state.tieziObj
            },
            ifShowDetail(){
                return this.$store.state.ifShowDetail
            }
        },
        methods:{

        },
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
        .search{
            width:83%;
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
          .date{
            min-width:150px;
          }
            .tieziTitle{
                min-width:400px;
            }
        }
        .flex-scroll{
            width:83%;
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
                }
              .date{
                min-width:150px;
              }
                .tieziTitle{
                    min-width:400px;
                }
            }
        }
    }
</style>
