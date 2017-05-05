<template>
    <div class="jubaoManageRouter">
        <!--嵌套路由开始-->
        <div class="introduce">
          <router-link to="/jubaoManage/tiezi"><span class="active">帖子举报</span></router-link>
          <router-link to="/jubaoManage/gentie"><span>跟帖举报</span></router-link>
            <simpleRoDetail></simpleRoDetail>
            <b class="loadCount">已全部加载，共<b class="light">{{TieziJubaoObj.length}}</b>条记录</b>
        </div>

        <div class="flex-title">
            <span>序号</span>
            <span>被举报帖子ID</span>
            <span>被举报用户</span>
            <span v-show="ifShowDetail" class="date">帖子创建日期</span>
            <span >回帖数</span>
            <span>举报人</span>
            <span v-show="ifShowDetail">举报理由</span>
            <span v-show="ifShowDetail" class="date">举报时间<b class="glyphicon glyphicon-arrow-up"></b></span>
        </div>
        <div class="flex-scroll">
          <!--<TieziJubaoManageContent></TieziJubaoManageContent>-->
          <TieziJubaoManageContent v-for = "(item,index) in TieziJubaoObj" v-bind:item="item" v-bind:index="index"></TieziJubaoManageContent>
          <loading v-show="loading"></loading>
          <noRecord v-show="ifHasRecord"></noRecord>
        </div>

    </div>
</template>
<script>
  import simpleRoDetail from "../four/SimpleRoDeatil.vue"
  import TieziJubaoManageContent from "../four/tieziJubaoManageContent.vue"
  import loading from "../tips/loading.vue"
  import noRecord from "../tips/noRecord.vue"
    export default {
        data:function(){
            return{
              count:'',
              TieziJubaoObj:'',
              loading:true,
            }
        },
        components:{
          simpleRoDetail,
          TieziJubaoManageContent,
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
            if(this.loading == false && this.TieziJubaoObj.length == 0){
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
            var jubaoType = "tiezi";
            /*传入type为gentie，得到跟帖举报信息*/
            $.ajax({
                url:"php/backend/tieziJubaoSelect.php",
                data:{
                  jubaoType:jubaoType
                },
                type:"post",
                dataType:"JSON",
                success:function(data){
                  that.loading = false,
                  that.TieziJubaoObj = data;
                  //alert(data);
                    //that.$store.commit('tieziObj',data);
                },
                error:function(data){
                  alert(data);
                    alert("帖子举报查询失败");
                }
            });
        },
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .jubaoManageRouter{
        width:100%;
        height:100%;
        overflow: scroll;
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
