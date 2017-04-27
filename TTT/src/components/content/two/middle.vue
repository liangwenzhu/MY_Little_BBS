<template>
    <div class="middle">
        <div class="middle-menu">
            <ol class="breadcrumb">
                <li>javascript</li>
                <li class="active">{{firstFloorObj.tieziTitle}}</li>
            </ol>
            <span class="score-market">积分商城</span>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
        firstFloorObj(){
            return this.$store.state.firstFloorObj
        },
    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../../lib/css/selfSet.less';
    .middle{
        width:100%;
        margin-top:20px;
        .middle-menu{
            width:100%;
            height:33px;
            line-height: 33px;
            color:white;
            //background-color: #1b6d85;
            .breadcrumb{
                height:33px;
                //margin-top:40px;
                float:left;
                //margin-left:20px;
                overflow: hidden;
                background:none;
                padding: 0;
                color: rgba(255, 255, 255, 0.82);
                li{
                    float: left;
                    margin-left:10px;
                    color: rgba(255, 255, 255, 0.67);
                    &:nth-child(1){
                        margin-left: 0;
                    }
                }
                .active{
                    color: rgba(255, 255, 255, 0.98);
                }
            }
            .score-market{
                float: right;
                //margin-right:25px;
            }
        }
    }
</style>
