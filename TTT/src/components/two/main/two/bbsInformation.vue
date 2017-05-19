<template>
    <div class="bbsInfo">
        <bbsInformationLeft></bbsInformationLeft>
        <bbsInformationRight></bbsInformationRight>
    </div>
</template>
<script>
    import bbsInformationLeft from 'components/two/main/three/bbsInformationLeft.vue'
    import bbsInformationRight from 'components/two/main/three/bbsInformationRight.vue'
    export default {
        data:function(){
            return{

            }
        },
        components:{
            bbsInformationLeft,
            bbsInformationRight
        },
        computed:{

        },
        methods:{

        },
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../../../lib/css/selfSet.less';
    .bbsInfo{
        width:1200px;

    }
</style>
