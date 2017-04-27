<template>
    <div class="myHeader">
        <div class="top-left">
            <router-link to="./">
                <div class="title">
                    <p>后台管理</p>
                </div>
            </router-link>
            <ul>
                <li class="active">管理</li>
                <li>分享</li>
                <li>更多</li>
            </ul>
        </div>
        <div class="top-right">
            <div class="user">
                <img src="php/upload/f47454d1d3644127f42070181a8b9afc">
                <span>说我艳我不艳</span>
            </div>
            <span class="glyphicon glyphicon-share"></span>
        </div>
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
    },
	computed:{

    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .myHeader{
        width:100%;
        height:75px;
        background: #eff4f8;
        position: fixed;
        top:0;
        .top-left{
            float: left;
            margin-left:30px;
            .title{
                font-size: 24px;
                display: inline-block;
                line-height: 70px;
            }
            ul{
                display: inline-block;
                vertical-align: middle;
                padding: 0;
                margin-left:30px;
                li{
                    font-size: 18px;
                    margin-top:15px;
                    float: left;
                    margin-left:100px;

                    &:nth-child(1){
                        margin-left:35px;
                    }
                }
                .active{
                    color:#3b8cff;
                    padding-bottom: 10px;
                    border-bottom: 5px solid #3b8cff;
                }
            }
        }
        .top-right{
            line-height: 70px;
            float:right;
            margin-right:35px;
            font-size: 14px;
            .user{
                margin-right:35px;
                display: inline-block;
                img{
                    margin-right:10px;
                    width:35px;
                    height:35px;
                    margin-top:-5px;
                    .pic-circle(25px);
                }
            }
            span{
                display: inline-block;
            }
        }
    }
</style>
