<template>
    <div>

        <router-view></router-view>
        <!--<userManage></userManage>-->
        <!--<tieziManage></tieziManage>-->
        <!--<managerApply></managerApply>-->
    </div>
</template>
<script>
    import userManage from '../three/userManage.vue'
    import tieziManage from '../three/tieziManage.vue'
    import managerApply from '../three/managerApply.vue'
    export default {
        data:function(){
            return{

            }
        },
        components:{
            userManage,
            tieziManage,
            managerApply,
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
    .backendContent{
        width:100%;
        height:100%;
        position: fixed;
        background: white;
        left:195px;
        top:75px;
        color:#888;

    }
</style>
