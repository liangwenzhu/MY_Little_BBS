<template>
    <div class="header-right">
        <headerTop></headerTop>
        <headerMiddle></headerMiddle>
    </div>
</template>
<script>
    import headerTop from 'components/four/headerTop.vue'
    import headerMiddle from 'components/four/headerMiddle.vue'

    export default {
        data:function(){
            return{

            }
        },
        components:{
            headerTop,
            headerMiddle,
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
    .header-right {
        //float: right;
        display: inline-block;
        width: 970px;
        vertical-align: top;
        margin-left:5px;
        //height:500px;
        background-color: rgb(255, 255, 255);
        border: 1px solid rgba(0, 0, 0, 0.15);
        position: relative;
    }
</style>
