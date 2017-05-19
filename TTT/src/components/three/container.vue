<template>
    <div>
        <bbsInformation></bbsInformation>
        <router-view></router-view>
    </div>
</template>
<script>
    import bbsInformation from 'components/two/main/two/bbsInformation.vue'
    export default {data:function(){
        return{

        }
    },
        components:{
            bbsInformation,
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
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    /*.main-container{*/
        /*width:1200px;*/
        /*float: right;*/
        /*margin-top:20px;*/
        /*//background-color: #3EC3B0;*/
        /*.bbs-main{*/
            /*background-color: rgba(0, 0, 0, 0.3);*/
            /*font-size: 13px;*/
            /*color:white;*/
            /*tbody{*/
                /*color: #3a79bb;*/
            /*}*/
        /*}*/
    /*}*/
</style>
