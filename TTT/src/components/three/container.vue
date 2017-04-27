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
    import middle from '../three/middle.vue'
    import bbsPagination from '../four/bbs-pagination.vue'
    import bbsTable from '../four/bbs-table.vue'

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
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .main-container{
        width:1200px;
        float: right;
        margin-top:20px;
        //background-color: #3EC3B0;
        .bbs-main{
            background-color: rgba(0, 0, 0, 0.3);
            font-size: 13px;
            color:white;
            tbody{
                color: #3a79bb;
            }
        }
    }
</style>
