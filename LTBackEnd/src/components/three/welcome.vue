<template>
    <div>
        <div class="welcome">
            <span>欢迎来到躬行网后台管理系统：）</span>
        </div>
    </div>
</template>
<script>
    export default {
        data:function(){
            return{

            }
        },
        components:{
        },
        computed:{
            navActive(){
                return this.$store.state.navActive
            },
        },
        methods:{

        },
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
   .welcome{
       width:110%;
       height:500px;
       display: flex;
       justify-content: center;
       align-items: center;
        color: #3b8cff;
       span{
           text-align: center;
           font-size: 25px;

       }
   }
</style>
