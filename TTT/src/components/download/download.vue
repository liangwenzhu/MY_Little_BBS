<template>
    <div>
        <downloadHeader></downloadHeader>
    </div>
</template>
<script>
    import downloadHeader from './two/downloadHeader.vue';
export default {
    data:function(){
        return{

        }
    },
    components:{
        downloadHeader,
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
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';



</style>
