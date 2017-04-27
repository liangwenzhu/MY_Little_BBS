<template>
    <div class="login modal-vote" >
        <div class="container">
            <span class="vote-topleft">登录</span>
            <img class="close" v-on:click="close" src="../../../lib/imgs/modal/wrong.png">
            <hr>
            <form>
                <div class="form-group">
                    <!--<label>账号</label>-->
                    <input type="text" class="form-control phone-num username-login" placeholder="账号" v-model="userName" v-on:input="refresh">
                    <!--<button>{{userName}}</button>-->
                </div>
                <div class="form-group">
                    <!--<label>密码</label>-->
                    <input type="password" class="form-control key password-login"  placeholder="密码" v-model="passWord" v-on:input="refresh">
                </div>
                <button type="button" class="btn btn-default complete login-btn" v-on:click="loginCommit">登录</button>
                <button type="button" class="btn btn-default  zhuce" v-on:click="register">注册</button>
            </form>
            <transition enter-active-class="slide-topTobottom" leave-active-class="slide-bottomTotop">
                <div class="wrong-tips" v-show="ifworng">
                    <span class="wrong-user">账户密码错误</span>
                </div>
            </transition>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            userName:'',
            passWord:'',
            ifworng:false
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
        sessionUserName(){
            return this.$store.state.userName
        },
        sessionUserSign(){
            return this.$store.state.userSign
        },
    },
	methods:{
        refresh(){
            this.ifworng = false
        },
        register:function(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','register');
        },
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        },
        loginCommit(){
            var that = this;
            $.ajax({
                url:"php/login.php",
                type:"POST",
                data:{
                    userName:this.userName,
                    passWord:this.passWord
                },
                dataType:"text",
                success:function(data){
                    if(data=="error"){
                        that.ifworng = true;
                    } else if(data == 'success'){
                        $.ajax({
                            url:"php/userInformation.php",
                            dataType:"JSON",
                            success:function(data){
                                    that.$store.commit({
                                       type:'userInformation',
                                        userName:data.userName,
                                        userSign:data.userSign,
                                        userHead:data.userHead,
                                        userScore:data.userScore
                                    });
                                that.$store.commit('modelShow',false);
                                that.$store.commit('modelActive','none');
                            }
                        });
                    }
                },
                error:function(data){
                    alert("wrong")
                }
            })
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .wrong-tips{
        position: absolute;
        width:100%;
        height:30px;
        line-height: 30px;
        bottom:0px;
        color:white;
        font-size:14px;
        background-color: #ff1d57;
        margin-left:-15px;
        text-align: center;
    }
</style>
