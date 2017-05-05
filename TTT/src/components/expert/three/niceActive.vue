<template>
    <div class="niceActive">
        <p class="title">近期精彩社区问答活动回顾</p>
        <niceActiveChild v-for="item in dataObj" v-bind:item="item"></niceActiveChild>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'
import niceActiveChild from '../four/niceActiveChild.vue'

export default {
    data:function(){
        return{
            dataObj:''
        }
    },
    components:{
        niceActiveChild
    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
    },
	methods:{

    },
    created(){
        var that = this;
        $.ajax({
            url:"php/expertQuestionListSelect.php",
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
    .niceActive{
        width:100%;
        background-color: white;
        margin-top:10px;
        padding:15px;
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

    }
</style>
