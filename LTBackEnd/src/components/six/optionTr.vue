<template>
    <td>
        <div class="control" v-on:mousemove="mouseMove" v-on:mouseout="mouseOut"><span>管理</span>
            <ul v-show="hovering">
                <li><button class="btn btn-danger tieziDelete">删除</button></li>
                <li><button class="btn btn-warning tieziOverheadCancel" title="取消置顶">取置</button></li>
            </ul>
        </div>
    </td>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            hovering:false
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
        mouseMove:function(){
            //alert("123");
            this.hovering = true;
        },
        mouseOut:function(){
            this.hovering = false;
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';

</style>
