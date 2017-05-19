<template>
    <div>
        <expertHeader></expertHeader>
    </div>
</template>
<script>
    import expertHeader from './two/expertHeader.vue';
export default {
    data:function(){
        return{

        }
    },
    components:{
        expertHeader,
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
