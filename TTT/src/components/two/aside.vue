<template>
    <aside class="left-aside">
        <div class="personal-information">
            <p class="ask-login" v-if="userName=='none'">尚未登录，请先登录</p>
            <div v-else>
            <p>个人资料</p>
            <p>剩余可用积分：<i class="glyphicon glyphicon-leaf user-score"></i><span class="score">{{userScore}}</span></p>
            <p>现在排名：<i class="glyphicon glyphicon-arrow-up"></i><span class="range">321</span></p>
            </div>
        </div>
        <div class="ad">
            <img src="../../../lib/imgs/logo.png">
            <p>特别鸣谢</p>
        </div>
    </aside>
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
        userScore(){
            return this.$store.state.userScore
        },
        userName(){
            return this.$store.state.userName
        }
    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .left-aside{
        float: left;
        display: inline-block;
        width:220px;
        height:310px;
        background-color: rgba(241, 241, 241, 0.24);
        .personal-information{
            height:110px;
            font-size: 14px;
            background-color: rgba(79, 155, 242, 0.15);
            margin-bottom:10px;
            .ask-login{
                width:100%;
                text-align: center;
                margin-left:0;
                line-height: 80px;
            }
            p{
                margin-left:20px;
                &:nth-child(1){
                    padding-top:10px;
                    font-weight: 800;
                    color: #6c6c6c;
                }
                i{
                    margin-right:5px;
                    color: rgba(236, 0, 96, 0.75);
                }
                span{
                    font-weight: 800;
                }
            }
        }
        .ad{
            text-align: center;
            img{
                width:150px;
            }
            p{
                color: rgba(255, 255, 255, 0.78);
            }
        }
    }
</style>
