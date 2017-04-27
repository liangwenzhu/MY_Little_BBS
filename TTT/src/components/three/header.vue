<template>
	<header>
        <headerTop></headerTop>
        <headerMiddle></headerMiddle>
        <headerBottom></headerBottom>
    </header>
</template>
<script>
import headerTop from '../four/headerTop.vue'
import headerMiddle from '../four/headerMiddle.vue'
import headerBottom from '../four/headerBottom.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        headerTop,
        headerMiddle,
        headerBottom
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
    header {
        float: right;
        display: inline-block;
        width: 970px;
        //height:500px;
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
    }
</style>
