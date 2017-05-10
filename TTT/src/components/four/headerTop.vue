<template>
    <div class="header-top">
        <div class="logo"><img src="../../../lib/imgs/icon/logo.png">论坛</div>
        <login  v-if="userName == 'none'"></login>
        <operationUl v-else ></operationUl>
        <navWindow></navWindow>
        <div class="clearfix"></div>
    </div>
</template>
<script>
import login from '../five/login'
import navWindow from '../five/navWindow'
import operationUl from '../five/operationUl'
import logo from '../../../lib/imgs/icon/logo.png'
export default {
    data:function(){
        return{

        }
    },
    components:{
        login,
        navWindow,
        operationUl
    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
        userName(){
            return this.$store.state.userName
        }
    },
	methods:{

    },
    created(){
        //alert(this.userName);
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .header-top {
        width: 100%;
        height: 40px;
        //display: inline-block;
        background-color: rgba(0, 0, 0, 0.3);
        //background-color: #20446a;
        /*position: relative;*/
        overflow: hidden;
        .logo{
            display: inline-block;
            float:left;
            img{
                width:40px;
                height:40px;
                margin-right:20px;
            }
            font-size: 20px;
            color: white;
        }
    }
</style>
