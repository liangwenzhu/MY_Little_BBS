<template>
    <div class="niceActiveChild">
        <p class="activeTime">第{{item.expertQuestionId}}期</p>
        <div class="baseIntroduce">
            <!--<router-link v-bind:to="tieziUrl"><button class="btn">进去瞧瞧</button></router-link>-->
            <router-link v-bind:to="tieziUrl"><button class="btn">进去瞧瞧</button></router-link>
            <p>活动主题：<b>{{item.questionTitle}}</b></p>
            <p>活动时间：<b>{{item.questionShowTime}}</b></p>
            <p>问答专家：<b>{{item.relName}}</b></p>
        </div>
        <div class="detail">
            <img v-bind:src="userHead">
            <p>{{item.questionIntroduce}}</p>
            <p><span class="userName">{{item.relName}}：</span>{{item.advantage}}</p>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    props:['item'],
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
        userHead(){
            return "http://localhost:8081/luntan/php/upload/" + this.item.userHead
        },
        tieziUrl(){
            return "/content/" + this.item.tieziId
        },
    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../../lib/css/selfSet.less';
    .niceActiveChild{
        height:330px;
        .activeTime{
            width:90px;
            font-size: 20px;
            background-color: #3b8cff;
            color:white;
            padding:10px;
        }
        .baseIntroduce{
            //margin-top:40px;
            button{
                float:right;
                background-color: #da1b4f;
                color:white;
            }
        }
        .detail{
            margin-top:20px;
            img{
                width:150px;
                height:150px;
                float:left;
                margin-right:15px;
            }
            p{
                &:nth-child(3){
                    span{
                        font-weight: 600;
                        font-size: 16px;
                    }
                    margin-top:40px;
                    font-size: 14px;
                }
            }
        }
    }
</style>
