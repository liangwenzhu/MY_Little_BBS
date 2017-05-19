<template>
    <header>
        <headerLeft></headerLeft>
        <headerRight></headerRight>
    </header>
</template>
<script>
import headerLeft from 'components/two/header/two/headerLeft.vue'
import headerRight from 'components/two/header/two/headerRight.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        headerRight,
        headerLeft,

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
    @import '../../../../lib/css/selfSet.less';
    header{
        width:1200px;
        height:120px;
        //background-color: red;
    }
</style>
