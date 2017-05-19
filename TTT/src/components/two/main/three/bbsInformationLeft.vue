<template>
    <div class="bbsInformationLeft">
        <div class="ad">
            <img src="../../../../../lib/imgs/logo.png">
            <p>特别鸣谢</p>
        </div>
    </div>
</template>
<script>

    export default {
        data:function(){
            return{

            }
        },
        components:{
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
    .bbsInformationLeft{
        //float: left;
        display: inline-block;
        width:220px;
        height:200px;
        background-color: #f1f1f1;
        border: 1px solid rgba(0, 0, 0, 0.15);
        .ad{
            text-align: center;
            img{
                width:150px;
                height:150px;
            }
            p {
                color: #282828;
                font-size:14px;
            }
        }
    }

</style>
