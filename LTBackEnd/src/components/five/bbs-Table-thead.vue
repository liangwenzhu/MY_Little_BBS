<template>
    <thead>
    <tr>
        <th>标题</th>
        <th>分数</th>
        <th>提问人</th>
        <th>回复数</th>
        <th>最后更新时间</th>
        <th>功能</th>
    </tr>
    </thead>
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
    thead{
        color: white;
        background-color: rgba(26, 74, 196, 0.15);
        tr{
            border-color:rgba(255, 255, 255, 0.1);
            th{
                text-align: center;
                &:nth-child(1){
                    text-align: left;
                }
            }
        }
    }
</style>