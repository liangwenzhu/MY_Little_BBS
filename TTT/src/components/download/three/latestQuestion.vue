<template>
    <div class="active-child">
        <p class="title">最新期社区问答互动<router-link v-bind:to="tieziUrl"><span>访问<i class="glyphicon glyphicon-share-alt"></i></span></router-link></p>
        <img class="touxiang" v-bind:src="userHead">
        <article class="introduce">{{dataObj.questionDetailIntroduce}}</article>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            dataObj:'',
        }
    },
    components:{
        //aaa,
    },
	computed:{
        userHead(){
            return "http://localhost:8081/luntan/php/upload/" + this.dataObj.userHead;
        },
        tieziUrl(){
            return "/content/" + this.dataObj.tieziId
        },
    },
	methods:{

    },
    created(){
        var that = this;
        $.ajax({
            url:"php/expertQuestionLatestSelect.php",
            type: "POST",
            dataType: "json",
            success: function (data) {
                that.dataObj = data;
            },
            error:function(data){
                alert("专家问答确认出错")
            }
        });
    }
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../../lib/css/selfSet.less';
    .active-child{
        width:430px;
        height:245px;
        background-color: white;
        padding:15px;
        display: inline-block;
        .title{
            font-size: 20px;
            font-weight: 600;
            min-width:150px;
            border-bottom:2px solid #c00;
            padding-bottom: 8px;
            span{
                float:right;
                font-size: 15px;
                font-weight: 400;
                cursor: pointer;
                color: #da1b4f;
                i{
                    margin-left:5px;
                }
            }
        }
        img{
            margin-top:10px;
            width:156px;
            height:156px;
            float:left;
            margin-right:5px;
        }
        article{
            margin-top:20px;
            font-size: 14px;
            text-align: justify;
        }
    }
</style>
