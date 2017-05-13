<template>
    <div class="declare">
        <article>
            <b>躬行社区专家问答</b>是躬行社区利用自身平台优势，针对开发者需求开展起来的业界专家与广大开发者的互动活动。受邀专家做客CSDN论坛，在为期一周的时间内，为广大开发者解答相关领域的技术问题，同时，作为职场过来人，也会针对职场新人在职业发展中遇到的困惑给出自己的建议。
        </article>
        <p>您是否对某专业领域存在技术疑问？您是否想成为CSDN社区专家？快快来参与我们的活动吧！</p>
        <p class="tips">Tips：如果您已是专家，可以点击下方<span class="glyphicon glyphicon-hand-down"></span>按钮立马申请开启社区问答互动哦！</p>
        <button class="btn" v-on:click="questionRequireModelStart">开启社区问答互动</button>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
    },
	methods:{
        questionRequireModelStart(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','modelExpertQuestionRequire');
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../../lib/css/selfSet.less';
    .declare{
        background: white;
        padding:15px;
        margin-top:5px;
        article{
            font-size: 16px;
            b{
                font-size: 20px;
                color: #da1b4f;
            }
        }
        p{
            font-size: 18px;
            color: #3b8cff;
            margin-top:10px;
        }
        .tips{
            font-size:14px;
            color: #da1b4f;
        }
        button{
            background-color: #da1b4f;
            color:white;
            &:hover{
                color:white;
            }
        }
    }
</style>
