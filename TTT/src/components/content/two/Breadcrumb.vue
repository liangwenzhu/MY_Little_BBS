<template>
    <div class="Breadcrumb">
        <div class="MenuDropdown">
            <button class="btn btn-default dropdown-toggle" type="button" v-on:click="drop">管理菜单<span class="caret"></span></button>
            <ul class="MenuDropdownList" v-show="dropMenu==true">
                <li v-if="firstFloorObj.tieziOverhead == 0" v-on:click="overHead">顶置</li>
                <li v-if="firstFloorObj.tieziOverhead == 1" v-on:click="overHeadCancel">取消顶置</li>
                <li>结贴</li>
                <li v-on:click="tieziDelete">删除帖子</li>
             </ul>
        </div>
        <button class="btn btn-success post" v-on:click="fatie">发帖</button>
        <button class="btn message-btn-nav" v-on:click="huitie">回复</button>
        <button class="btn btn-warning back"><i class="glyphicon glyphicon-chevron-left"></i>返回列表</button>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            dropMenu:false,
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
        /*管理下拉*/
        drop(){
            this.dropMenu = !this.dropMenu;
        },
        /*回帖弹窗*/
        huitie(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','huitie');
        },
        /*发帖弹窗*/
        fatie(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','fatie');
        },
        /*帖子顶置*/
        overHead(){
            var tieziId = this.$store.state.firstFloorObj.tieziId;
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
                    }
                }
            });
        },
        /*帖子取消顶置*/
        overHeadCancel(){
            var tieziId = this.$store.state.firstFloorObj.tieziId;
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
                    }
                }
            });
        },
        /*帖子删除*/
        tieziDelete(){
            var tieziId = this.$store.state.firstFloorObj.tieziId;
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
                        }else{
                            alert(data);
                        }
                    }
                });
            }else{
            }
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../../lib/css/selfSet.less';
    .Breadcrumb{
        width:1200px;
        margin-bottom:30px;
        margin-top:20px;
        .MenuDropdown{
            display: inline;
            position: relative;
            button{
                margin-top: -2px;
                background-color: #1ccdaa;
                color:white;
            }
            a{
                cursor: pointer;
            }
            .MenuDropdownList{
                position: absolute;
                top:30px;
                left:00px;
                background: #828282;
                width:90px;
                padding:0;
                li{
                    float:left;
                    width:90px;
                    padding-top:10px;
                    padding-bottom:10px;
                    color:white;
                    padding-left:10px;
                    cursor: pointer;
                    &:hover{
                        background: #5f5f5f;
                    }
                }
            }
        }
        .message-btn-nav{
            width:85px;
            color:white;
            background-color: #cd97eb;
            &:focus{
                background-color: #b86ce3;
            }
        }
        .post{
            width:85px;
            background-color: #428bca;
            margin-left:20px;
            &:focus{
                background-color: #4075b2;
            }
        }
        .post-bottom{
            margin-left:0px;
        }
        .back{
            background-color: #ef005d;
            float: right;
            &:focus{
                background-color: #ec0060;
            }
            &:hover{
                i{
                    .transform(-5px,0);
                    .transition(0.3s);
                }
            }
            i{
                .transition(0.3s);
            }
        }
    }
</style>
