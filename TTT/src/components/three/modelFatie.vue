<template>
    <!--发帖-->
    <div class="fatie">
        <div class="container">
            <div class="top-title">
                <span class="vote-topleft">发表新话题</span>
                <img class="close" v-on:click="close" src="../../../lib/imgs/modal/wrong.png">
            </div>
            <table class="table">
                <tbody>
                <tr>
                    <td class="left-title">帖子标题</td>
                    <td class="right-input"><input class="form-control input-tiezi-title" v-model="tieziTitle"><span>你还可以输入<b>{{tieziTitleMaxLength}}</b>个字符</span></td>
                </tr>
                <tr>
                    <td class="left-title">选择板块</td>
                    <td class="right-input">
                        <!--{{tieziSection}}-->
                        <select class="form-control input-tiezi-section" v-model="tieziSection">
                            <option v-for="item in sectionObj" v-bind:value="item.sectionId">{{item.sectionName}}</option>
                        </select>
                        <span>请选择所要发帖的板块</span>
                    </td>
                </tr>
                <tr>
                    <td class="left-title">帖子内容</td>
                    <td class="right-input">
                        <textarea class="form-control textarea input-tiezi-content" v-model="tieziContent"></textarea>
                        <span>你还可用输入<b>{{tieziContentMaxLength}}</b>个字符</span>
                    </td>
                </tr>
                <tr>
                    <td class="left-title">标签</td>
                    <td class="right-input">
                        <input class="form-control input-tiezi-tag" v-model="tieziTag">
                        <span>添加标签，比如“前端”</span>
                    </td>
                </tr>

                <tr>
                    <td class="left-title">帖子分数<i class="glyphicon"></i></td>
                    <td class="right-input">
                        给<input class="form-control score input-tiezi-score" v-model="tieziScore">分（返还50%分数）<span>当前可用分为<b class="score">{{userScore}}</b>分</span><i class="glyphicon glyphicon-question-sign" title="发帖成功将返回50%积分，积分用途见积分商城"></i>
                    </td>
                </tr>
                <tr>
                    <td class="left-title">&nbsp;</td>
                    <td class="right-input">
                        <button class="btn postTiezi" v-on:click="post">发表帖子</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            tieziTitle:'',
            tieziContent:'',
            tieziTag:'html',
            tieziSection:'',
            tieziScore:'20',
        }
    },
    components:{
        //aaa,
    },
	computed:{
        modelShow(){
            return this.$store.state.modelShow
        },
        modelActive(){
            return this.$store.state.modelActive
        },
        /*获取用户积分*/
        userScore(){
            return this.$store.state.userScore
        },
        /*帖子标题最大长度*/
        tieziTitleMaxLength(){
            return this.$store.state.tieziTitleMaxLength - this.tieziTitle.length;
        },
        /*帖子内容最大长度*/
        tieziContentMaxLength(){
            return this.$store.state.tieziContentMaxLength - this.tieziContent.length;
        },
        /*输入框最少回复长度*/
        contentMinLength(){
            return this.$store.state.contentMinLength;
        },
        /*获取板块列表*/
        sectionObj(){
            return this.$store.state.sectionDataObj;
        },
        option(){
            return [
                {text:'css',value:'a'}
            ]
        }
    },
	methods:{
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        },
        post:function(){
            var that = this;
            var length = this.contentMinLength;
            if(this.tieziTitle.length < length || this.tieziContent.length < length || this.tieziTag.length < length || this.tieziScore.length < length){
                alert("内容长度必须大于"+length)
            }else if(this.tieziTitle.length > this.$store.state.tieziTitleMaxLength || this.tieziContent.length > this.$store.state.tieziContentMaxLength){
                alert("帖子标题或内容超过规定长度");
                alert(this.tieziTitle.length);
                alert(this.tieziTitleMaxLength);
            }else{
                $.ajax({
                    url: "php/fatie.php",
                    type: "POST",
                    data: {
                        tieziTitle: that.tieziTitle,
                        tieziContent: that.tieziContent,
                        tieziTag: that.tieziTag,
                        tieziSection: that.tieziSection,
                        tieziScore: that.tieziScore,
                        userScore: that.$store.state.userScore - (that.tieziScore*0.5),
                    },
                    dataType: "text",
                    success: function (data) {
                        if (data == "success") {
                            alert("发帖成功，恭喜获得积分奖励");
                            /*状态变更，实时刷新帖子*/
                            that.$store.commit('stateChange');
                            that.$store.commit('modelShow',false);
                            that.$store.commit('modelActive','none');
                            that.$store.commit({
                                type:'pageReflash',
                                pageNum:1,
                            });
                        } else if (data == "tieziname exit") {
                            alert("有相同帖子");
                        } else {
                            alert(data);
                        }
                    }
                });
            }

        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';

</style>
