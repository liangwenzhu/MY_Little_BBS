<template>
    <section class="section-floor first-floor">
        <p class="title"> <b>【求助】</b><b class="title-container">{{firstFloorObj.tieziTitle}}</b><i></i><span class="score"></span></p>
        <div class="content">
            <div class="user-information">
                <p class="user-id">{{firstFloorObj.tieziCreater}}</p>
                <div class="user-touxiang">
                    <img v-bind:src="userHead">
                    <p class="level">亲卫队-预备军</p>
                </div>
            </div>
            <div class="question-describe">
                <div class="tiezi-Time">
                    <div class="tiezi-time"><i class="glyphicon glyphicon-user"></i>发表于<span>{{firstFloorObj.tieziCreaterData}}</span>
                        <div class="floor" id="1"><b>#1</b>
                            <!--电梯直达<input class="anchor-input form-control">-->
                        </div>
                    </div>
                </div>
                <div class="question-main">
                    <h2><span>【求助】</span>{{firstFloorObj.tieziTitle}}</h2>
                    <article>
                        <p>{{firstFloorObj.tieziContent}}</p>
                    </article>
                    <div class="section-footer">
                        <div class="sign">
                            <div class="little-sign">
                                <span class="glyphicon glyphicon-pencil"></span><b></b><i>小尾巴分割线</i><b></b>
                            </div>
                            <p>{{firstFloorObj.userSign}}</p>
                        </div>
                        <div class="operation">
                            <select class="btn messag right-btn" v-model="jubaoReason" v-on:change="jubao">
                                <option class="hidden">举报</option>
                                <option>灌水</option>
                                <option>反动</option>
                                <option>色情</option>
                            </select>
                            <!--<button class="btn right-btn proven" v-on:click="jubao">举报</button>-->
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
    data:function(){
        return{
            jubaoReason:'举报'
        }
    },
    components:{
        //aaa,
    },
	computed:{
        firstFloorObj(){
            return this.$store.state.firstFloorObj
        },
        userHead(){
            return "http://localhost:8081/luntan/php/upload/" + this.$store.state.firstFloorObj.userHead;
        }
    },
    created(){
        var that = this;
        var tieziId = this.$route.params.tieziId;
        $.ajax({
            url:"../php/gentie-firstFloor.php",
            data:{
                tieziId:tieziId,
            },
            type:"post",
            dataType:"JSON",
            success:function(data){
                if(data==false){
                    alert("该贴已被删除。");
                    history.go(-1);
                }
                that.$store.commit('firstFloorObj',data)
            },
            error:function(data){
                alert(data);
            }
        });
    },
    methods:{
        ju(){
          alert(this.jubaoReason);
        },
        jubao(){
            var that = this;
            var jubaoType = "tiezi";
            var tieziId = this.$store.state.firstFloorObj.tieziId;
            var jubaoReason = this.jubaoReason;
            //var gentieId = "0";
            var beijubaoUserName = this.$store.state.firstFloorObj.tieziCreater;
            $.ajax({
                url:"../php/jubaoTieziInsert.php",
                data:{
                    jubaoType:jubaoType,
                    tieziId:tieziId,
                    jubaoReason:jubaoReason,
                    beijubaoUserName:beijubaoUserName,
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
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../../lib/css/selfSet.less';

</style>
