<template>
    <div class="register modal-vote">
        <div class="container">
            <span class="vote-topleft">提示</span>
            <img class="close" v-on:click="close"  src="../../../lib/imgs/modal/wrong.png">
            <hr>
            <p class="#"><img src="../../../lib/imgs/modal/vote-success.png"></p>
            <p>恭喜！注册成功</p>
            <p ><span class="denglu" v-on:click="login">现在登录</span></p>
            <!--<button class="register-complete displayNone">&nbsp;</button>-->
        </div>
    </div>
</template>
<script>
import '../../../lib/imgs/modal/vote-success.png'

export default {
    data:function(){
        return{

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
    },
	methods:{
        login:function(){
            this.$store.commit('modelActive','login');
        },
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';

</style>
