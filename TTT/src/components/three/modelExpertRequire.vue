<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">专家招募</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <p class="tips">请留下您的个人简介，如姓名，熟悉的领域，所在公司，经历等。</p>
            <label>真实姓名：</label>
            <input class="form-control" placeholder="您的真实姓名" v-model="relName">
            <label>擅长领域：</label>
            <input class="form-control" placeholder="您所擅长的领域" v-model="major">
            <label>所在的公司：</label>
            <input class="form-control" placeholder="您现在所在的公司" v-model="company">
            <label>职业：</label>
            <input class="form-control" placeholder="您的职业" v-model="job">
            <label>邮箱：我们将会在近快将结果发送到您的邮箱上</label>
            <input class="form-control" type="email" placeholder="请输入您的邮箱地址" v-model="email">
            <label>个人经历：如曾经开发了什么项目、编写了什么书籍等，如以下模板</label>
            <textarea class="form-control huitieContainer" v-model="advantage" placeholder="上海交通大学软件学院副教授，2001年于西北工业大学计算机科学与工程系获工学博士学位，从事软件工程和分布式计算方面的研究。翻译过《Java编程思想》第三版和第四版、《Java核心技术卷2》第7版、第8版和第9版"></textarea>
            <span class="fontCountControl">你还可用输入<b>{{gentieContentMaxLength}}</b>个字符</span>
            <button class="btn btn-success huitie-btn" v-on:click="postMessage">确认</button>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            relName:'',
            major:'',
            company:'',
            job:'',
            email:'',
            advantage:'',
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
        gentieContentMaxLength(){
            return this.$store.state.gentieContentMaxLength - this.advantage.length;
        }
    },
	methods:{
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        },
        postMessage(){
            var that = this;
            var relName = this.relName;
            var major = this.major;
            var company = this.company;
            var job = this.job;
            var email = this.email;
            var advantage = this.advantage;

            $.ajax({
                url:"../php/expertManagerRequire.php",
                data:{
                    relName:relName,
                    major:major,
                    company:company,
                    job:job,
                    email:email,
                    advantage:advantage,
                },
                type:"post",
                success:function(data){
                    if(data=="success"){
                        alert("申请成功！");
                        that.$store.commit('modelShow',false);
                        that.$store.commit('modelActive','none');
                    }else if(data == "username exit"){
                        alert("您已经申请过了，后台正在审核");
                    }else{
                        alert("专家审核出错")
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
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .huitie{
        width:650px;
        height:600px;
        //text-align: center;
        position: absolute;
        left:50%;
        margin-left:-325px;
        top:50%;
        margin-top:-300px;
        background: #ffffff;
        .container{
            width:580px;
            //height:260px;
            margin: 0 auto;
            //background: palevioletred;

            .top-title{
                overflow: hidden;
                .vote-topleft{
                    float: left;
                    margin-top:10px;
                    font-size: 16px;

                    b{
                        margin-left:5px;
                        margin-right:5px;
                        color:red;
                    }
                    img{
                        width:15px;
                        margin-right:10px;
                    }
                }
                .close{
                    width:20px;
                    position: absolute;
                    right:0px;
                    margin-right:30px;
                    margin-top:10px;
                    opacity: 1;
                }
            }
            .tips{
                font-size: 14px;
                margin-top: 30px;
            }
            .huitieContainer{
                margin-top:0px;
                min-height:100px;
            }
            .fontCountControl{
                float:right;
                margin-top:5px;
            }
            label{
                font-size: 14px;
            }
            input{
                margin-bottom:15px;
            }
            .huitie-btn{
                margin-top:20px;
                background-color: #3276b1;
                .transition(0.3s);
                border:none;
                &:hover{
                    .transition(0.3s);
                    background-color: #315a94;
                }
            }
        }
    }
</style>
