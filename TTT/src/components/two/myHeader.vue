<template>
    <div class="myHeader">
        <myAside></myAside>
        <myHeader></myHeader>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'
import myAside from '../two/aside.vue'
import myHeader from '../three/header.vue'
export default {
    data:function(){
        return{

        }
    },
    components:{
        myAside,
        myHeader,
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
    .myHeader{
        width:1200px;
        height:310px;
    }
</style>
