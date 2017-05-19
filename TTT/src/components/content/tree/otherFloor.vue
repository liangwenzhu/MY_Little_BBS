<template>
    <section class="section-floor other-floor">
        <div class="content">
            <div class="user-information">
                <p class="user-id">{{item.userName}}</p>
                <div class="user-touxiang">
                    <img v-bind:src="userHead">
                    <p class="level">亲卫队-预备军</p>
                </div>
            </div>
            <div class="question-describe">
                <div class="tiezi-Time">
                    <div class="tiezi-time"><i class="glyphicon glyphicon-user green" v-bind:class="{host:ifLouZhu==true}"></i>发表于<span>{{item.gentieCreaterData}}</span><small class="gentieId"></small>
                        <div class="floor" id="3"><b>#{{item.floorNum}}</b></div>
                    </div>
                </div>
                <div class="question-main">
                    <article>
                        <blockquote v-if="item.beigentieFloorNum !=1">
                            <span>引用<b class="beifloorNum">{{item.beigentieFloorNum}}</b>楼<i>{{item.beigentieUserName}}</i>的回复：</span><p>{{item.beigentieContent}}</p>
                        </blockquote>
                        <p class="article-content">{{item.gentieContent}}</p>
                    </article>
                    <div class="section-footer">
                        <div class="sign">
                            <div class="little-sign">
                                <span class="glyphicon glyphicon-pencil"></span><b></b><i>{{item.gentieId}}小尾巴分割线</i><b></b>
                            </div>
                            <p>{{item.userSign}}</p>
                        </div>
                        <div class="operation">
                            <button class="btn messag" v-on:click="huitieForOtherFloor">回帖</button>
                            <i class="glyphicon glyphicon-thumbs-up up" title="赞" v-on:click="zan"></i><b>【{{item.dianzanCount}}】</b>
                            <i class="glyphicon glyphicon-thumbs-down down" title="踩"></i><b>【{{routerLinkTieziId}}】</b>
                            <select class="btn messag right-btn" v-model="jubaoReason" v-on:change="jubao">
                                <option class="hidden">举报</option>
                                <option>灌水</option>
                                <option>反动</option>
                                <option>色情</option>
                            </select>
                            <button class="btn right-btn delete"v-on:click="huitieDelete">删除</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    props:['item'],
    data:function(){
        return{
            jubaoReason:'举报'
        }
    },
    components:{
        //aaa,
    },
	computed:{
        userHead(){
            return "http://localhost:8081/luntan/php/upload/" + this.item.userHead;
        },
        routerLinkTieziId(){
            return this.$store.state.firstFloorObj.tieziId;
        },
        ifLouZhu(){
            if(this.$store.state.firstFloorObj.tieziCreater == this.item.userName){
                return true;
            }
        }
    },
	methods:{
        huitieForOtherFloor(){
            /*把被跟帖楼的数据对象传给store*/
            this.$store.commit('beiGentieObj',this.item);
            var floorNum = this.item.floorNum;
            var content = this.item.gentieContent;
            this.$store.commit('floorNum',floorNum);
            this.$store.commit('beiGentieContent',content);
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','floorNum');
        },
        huitieDelete(){
            var that = this;
            var gentieId = this.item.gentieId;
            $.ajax({
                url:"../php/gentieDelete.php",
                data:{
                    gentieId:gentieId,
                },
                type:"post",
                dataType:"text",
                success:function(data){
                    if(data=="success"){
                        alert("帖子删除成功");
                        that.$store.commit('stateChange');
                    }else{
                        alert("帖子删除失败")
                    }
                },
                error:function(data){
                    alert(data);
                }
            })
        },
        zan(){
            var that = this;
            var beidianzanUerName = this.item.userName;
            var tieziId = this.routerLinkTieziId;
            var gentieId = this.item.gentieId;
            $.ajax({
                url:"../php/gentieZan.php",
                data:{
                    tieziId:tieziId,
                    gentieId:gentieId,
                    beidianzanUerName:beidianzanUerName,
                },
                type:"post",
                dataType:"text",
                success:function(data){
                    if(data=="success"){
                        alert("点赞成功");
                        that.$store.commit('stateChange');
                    }else{
                        alert("点赞失败")
                    }
                },
                error:function(data){
                    alert(data);
                }
            })
        },
        cai(){

        },
        jubao(){
            var that = this;
            var jubaoType = "gentie";
            var tieziId = this.$store.state.firstFloorObj.tieziId;
            var gentieId = this.item.gentieId;
            var beijubaoUserName = this.item.userName;
            var jubaoReason = this.jubaoReason;
            $.ajax({
                url:"../php/jubaoGentieInsert.php",
                data:{
                    jubaoType:jubaoType,
                    tieziId:tieziId,
                    gentieId:gentieId,
                    beijubaoUserName:beijubaoUserName,
                    jubaoReason:jubaoReason,
                },
                type:"post",
                dataType:"text",
                success:function(data){
                    if(data=="success"){
                        alert("举报成功");
                        //that.$store.commit('stateChange');
                    }else if(data=="jubao exit"){
                        alert("该跟帖已被别的人户举报，后台人员正在处理")
                    } else{
                        alert("举报失败")
                    }
                },
                error:function(data){
                    alert(data);
                }
            })
        }
    },

    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../../lib/css/selfSet.less';
    .host{
        background-color: red;
    }
</style>
