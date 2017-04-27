<template>
    <div class="middle-select">
        <div class="bbs-classify ">
            <ul>
                <li class="active"><a href="#">待解决</a></li>
                <li><a href="#">已解决</a></li>
                <li><a href="#">推荐<span>【精华】</span></a></li>
                <li><a href="#">排行榜</a></li>
                <li><a href="#">版主管理</a></li>
            </ul>
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
    .middle-select{
        width:100%;
        float: right;
        margin-top:20px;
        .bbs-classify{
            height:30px;
            overflow: hidden;
            ul{
                padding: 0;
                li{
                    float:left ;
                    width:100px;
                    height:30px;
                    line-height: 30px;
                    //.background-color-change-top(rgba(214, 215, 216, 0.76), rgba(238, 238, 238, 0.78));
                    background-color: #269abc;
                    margin-left: 10px;
                    text-align: center;
                    font-size: 14px;
                    cursor: pointer;
                    .pic-circle(4px);
                    .transition(0.4s);
                    &:nth-child(1){
                        margin: 0;
                    }
                    &:active{
                        background-color: #277da0;
                    }
                    &:hover{
                        background-color: #277da0;
                        .transition(0.4s);
                    }
                    a{
                        color: #ffffff;
                        text-decoration: none;
                        span{
                            color:red;
                        }
                    }
                }
                .active{
                    background-color: #e27d79;
                    font-weight: 800;
                    &:hover{
                        background-color: #d64842;
                    }
                }
            }
        }
    }
</style>
