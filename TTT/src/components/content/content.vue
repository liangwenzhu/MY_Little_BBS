<template>
    <div>
        <middle></middle>
        <Breadcrumb></Breadcrumb>
        <mainContainer></mainContainer>
        <message></message>
    </div>
</template>
<script>
import middle from './two/middle.vue'
import Breadcrumb from './two/Breadcrumb.vue'
import mainContainer from './two/mainContainer.vue'
import message from './two/message.vue'
export default {
    data:function(){
        return{

        }
    },
    components:{
        middle,
        Breadcrumb,
        mainContainer,
        message
    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
    },
	methods:{

    },
    created:function(){
        /*未知原因，返回上个路由后pageClickNum = 3 ,这里手动设置为-1*/
        this.$store.commit({
            type:'pageReflash',
            pageNum:-1,
        });
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';






    .message{
        width:100%;
        margin-bottom:30px;
        margin-top:30px;
        .transition(0.3s);
        &:hover{
            .transition(0.3s);
            -webkit-box-shadow:0 0 20px rgba(69, 176, 255, 0.9);
            -moz-box-shadow:0 0 20px rgba(69, 176, 255, 0.9);
            box-shadow:0 0 20px rgba(69, 176, 255, 0.9);
        }
        .content{
            width:100%;
            background-color: rgba(26, 74, 196, 0.15);
            margin-top:-9px;
            .left-area{
                width:250px;
                display: inline-block;
                margin:0px;
                .left-area-container{
                    width:220px;
                    min-height:220px;
                    // .border(1px,solid, rgba(255, 255, 255, 0.1));
                    border-right:1px solid rgba(255, 255, 255, 0.1);
                    margin: 30px auto;
                    text-align: center;
                }
            }
            .leave-message-container{
                width:945px;
                margin:0px;
                display: inline-block;
                vertical-align: top;
                //background-color: #67b168;
                .message-container{
                    position: relative;
                    .message-area{
                        width:920px;
                        min-height: 150px;
                        margin: 30px auto;
                        //background-color: #beffc4;
                        color:black
                    }
                    .section-footer{
                        width:945px;
                        margin: -20px auto;
                        .operation{
                            width:920px;
                            margin: 0 auto;
                            .message-btn{
                                width:100px;
                                color:white;
                                background-color: #277da0;
                            }
                            .fontCountControl{
                                float: right;
                                color: rgba(255, 255, 255, 0.62);
                                b{
                                    color: white;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>
