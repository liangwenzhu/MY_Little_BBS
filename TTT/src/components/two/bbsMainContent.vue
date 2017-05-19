<template>
    <div>
        <middle></middle>
        <div class="main-container">
            <bbsPagination></bbsPagination>
            <bbsTable></bbsTable>
            <bbsPagination></bbsPagination>
        </div>
    </div>
</template>
<script>
    import middle from 'components/three/middle.vue'
    import bbsPagination from 'components/four/bbs-pagination.vue'
    import bbsTable from 'components/four/bbs-table.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        bbsPagination,
        bbsTable,
        middle
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

</style>
