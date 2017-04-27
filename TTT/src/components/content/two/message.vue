<template>
    <div class="message">
        <div class="content">
            <div class="left-area">
                <div class="left-area-container"></div>
            </div>
            <div class="leave-message-container">
                <div class="message-container">
                    <textarea class="form-control message-area" placeholder="leave your message~" v-model="gentieContent"></textarea>
                    <div class="section-footer">
                        <div class="operation">
                            <button class="btn message-btn" id="message" v-on:click="postMessage">发表回复</button>
                            <span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            gentieContent:'',
        }
    },
    components:{
        //aaa,
    },
	computed:{
        gentieContentMaxLength(){
            return this.$store.state.gentieContentMaxLength - this.gentieContent.length;
        }
    },
	methods:{
        postMessage(){
            var that = this;
            var tieziId = this.$store.state.firstFloorObj.tieziId;
            var gentieContent = this.gentieContent;
            $.ajax({
                url:"../php/gentieFllow.php",
                data:{
                    tieziId:tieziId,
                    gentieContent:gentieContent,
                    beigentieFloorNum:1,
                },
                type:"post",
                success:function(data){
                    if(data=="success"){
                        alert("回复成功，获得5点积分奖励");
                        that.$store.commit('stateChange');
                        that.$store.commit('modelShow',false);
                        that.$store.commit('modelActive','none');
                    }else{
                        alert("有问题");
                        alert(data);
                    }
                },
                error:function(data){
                    alert("失败");
                }
            });
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../../lib/css/selfSet.less';

</style>
