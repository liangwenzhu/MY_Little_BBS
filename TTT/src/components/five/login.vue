<template>
    <ul class="login-in">
        <li class="zhuce" v-on:click="register">注册</li>
        <li class="denglu" v-on:click="login">登录</li>
    </ul>
</template>
<script>
import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{

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
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','login');
        },
        register:function(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','register');
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .login-in{
        display: inline-block;
        float: right;
        margin-top:8px;
        li{
            cursor: pointer;
            float: left;
            margin-right:10px;
            color:white;
        }
    }
</style>
