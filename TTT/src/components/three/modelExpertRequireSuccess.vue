<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">专家招募成功</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <div class="email">
                <label>请输入邮箱验证码：验证成功则成为躬行网专家</label>
                <input class="form-control" type="text" placeholder="请输入邮箱验证码" v-on:input="refresh">
            </div>
            <button class="btn btn-success huitie-btn" v-on:click="confirm">确认</button>
            <transition enter-active-class="slide-topTobottom" leave-active-class="slide-bottomTotop">
                <p class="wrongTips" v-show="ifWrong">验证码错误</p>
            </transition>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            ifWrong:false
        }
    },
    components:{
        //aaa,
    },
	computed:{
        modelShow(){
            return this.$store.state.modelShow
        },
        modelActive(){
            return this.$store.state.modelActive
        },
        gentieContentMaxLength(){
            return this.$store.state.gentieContentMaxLength - this.gentieContent.length;
        }
    },
	methods:{
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        },
        confirm(){
            this.ifWrong = true;
        },
        refresh(){
            this.ifWrong = false;
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .huitie{
        width:600px;
        height:200px;
        //text-align: center;
        position: absolute;
        left:50%;
        margin-left:-300px;
        top:50%;
        margin-top:-100px;
        background: #ffffff;
        .container{
            width:580px;
            //height:260px;
            margin: 0 auto;
            //background: palevioletred;
            position: relative;
            .top-title{
                overflow: hidden;
                .vote-topleft{
                    float: left;
                    margin-top:10px;
                    font-size: 16px;

                    b{
                        margin-left:5px;
                        margin-right:5px;
                        color:red;
                    }
                    img{
                        width:15px;
                        margin-right:10px;
                    }
                }
                .close{
                    width:20px;
                    position: absolute;
                    right:0px;
                    margin-right:30px;
                    margin-top:10px;
                    opacity: 1;
                }
            }
            .tips{
                font-size: 14px;
                margin-top: 30px;
            }
            .huitieContainer{
                margin-top:0px;
                min-height:100px;
            }
            .fontCountControl{
                float:right;
                margin-top:5px;
            }
            .email{
                margin-top:30px;
                label{
                    font-size: 14px;
                }
            }
            .huitie-btn{
                margin-top:20px;
                background-color: #3276b1;
                .transition(0.3s);
                border:none;
                &:hover{
                    .transition(0.3s);
                    background-color: #315a94;
                }
            }
            .wrongTips{
                width:600px;
                height:30px;
                position: absolute;
                line-height: 30px;
                text-align: center;
                color:white;
                font-size:14px;
                background-color: #ff1d57;
                bottom:40px;
                left:-10px;
            }
        }
    }
</style>
