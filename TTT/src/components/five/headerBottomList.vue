<template>
    <div class="inform-list-children">
        <i class="glyphicon glyphicon-star icon"></i><p class="inform-content"><a href="#">{{item.tieziTitle}}</a></p>
        <p class="count-time"><b>{{item.tieziAnswer}}<span>条回复</span></b><span class="inform-time">{{item.tieziCreaterData}}</span></p>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    props:['item'],
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
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
    .inform-list-children{
        position: relative;
        overflow: hidden;
        //border-top:1px solid rgba(0, 0, 0, 0.22);
        padding-right:10px;
        &:last-child{
            border-bottom:1px solid rgba(0, 0, 0, 0.22);
            margin-bottom:10px;
        }
        .ignore{
            float: right;
            color: #e23428;
            cursor: pointer;
        }
        .icon{
            display: inline-block;
            width:20px;
            margin-right:5px;
            vertical-align: top;
            color:red;
            float: left;
            min-height: 40px;
            line-height: 40px;
        }
        .inform-content{
            display: inline-block;
            float: right;
            width:335px;
            min-height: 40px;
            padding-top: 10px;
            padding-bottom:10px;
            margin-top:0;
            b{
                margin-left:10px;
                color:red;
                span{
                    font-weight: 400;
                    color:black;
                }
            }
            .inform-time{
                float:right;
                display: inline-block;
                vertical-align: middle;
            }
        }
        .count-time{
            width:335px;
            float: right;
            margin-top:-10px;
            b{
                vertical-align: middle;
                color:red;
                span{
                    font-weight: 400;
                    color:black;
                }
            }
            .inform-time{
                float:right;
                display: inline-block;
                vertical-align: middle;
            }
        }
    }
</style>