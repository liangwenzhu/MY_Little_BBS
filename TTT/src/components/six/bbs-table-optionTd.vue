<template>
    <td>
        <div class="control" v-on:mousemove="mouseMove" v-on:mouseout="mouseOut"><span>管理</span>
            <ul v-show="hovering">
                <li><button class="btn btn-danger tieziDelete" v-on:click="tieziDelete">删除</button></li>
                <li v-if="overState.tieziOverhead == 0"><button class="btn btn-success tieziOverheadCancel" title="置顶" v-on:click="overHead">顶置</button></li>
                <li v-else><button class="btn btn-warning tieziOverheadCancel" title="取消置顶" v-on:click="overHeadCancel">取置</button></li>
            </ul>
        </div>
    </td>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    props:['overState'],
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
        },
        tieziDelete(){
            var that = this;
            var tieziId = this.overState.tieziId;
            if (confirm("确定删除帖子？")) {
                $.ajax({
                    url:"php/tieziDelete.php",
                    type:"GET",
                    data:{
                        tieziId:tieziId
                    },
                    dataType:"text",
                    success:function(data){
                        if(data == "success"){
                            alert("删除帖子成功！");
                            that.$store.commit('stateChange');
                            /*回到首页*/
                            that.$store.commit({
                                type:'pageReflash',
                                pageNum:1,
                            });
                        }else{
                            alert(data);
                        }
                    }
                });
            }
        },
        overHead(){
            var that = this;
            var tieziId = this.overState.tieziId;
            $.ajax({
                url:"php/tieziOverhead.php",
                type:"GET",
                data:{
                    tieziId:tieziId
                },
                dataType:"text",
                success:function(data){
                    if(data == "success"){
                        alert("顶置帖子成功！");
                        that.$store.commit('stateChange');
                        /*回到首页*/
                        that.$store.commit({
                            type:'pageReflash',
                            pageNum:1,
                        });
                    }
                }
            });
        },
        overHeadCancel(){
            var that = this;
            var tieziId = this.overState.tieziId;
            $.ajax({
                url:"php/tieziOverheadCancel.php",
                type:"GET",
                data:{
                    tieziId:tieziId
                },
                dataType:"text",
                success:function(data){
                    if(data == "success"){
                        alert("取消顶置成功！");
                        that.$store.commit('stateChange');
                        /*回到首页*/
                        that.$store.commit({
                            type:'pageReflash',
                            pageNum:1,
                        });
                    }
                }
            });
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';

</style>
