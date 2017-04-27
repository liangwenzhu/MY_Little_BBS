<template>
    <div class="register modal-vote" >
        <div class="container">
            <span class="vote-topleft">注册</span>
            <img class="close" v-on:click="close"  src="../../../lib/imgs/modal/wrong.png">
            <hr>
            <form>
                <div class="form-group">
                    <!--<label>账号</label>-->
                    <input v-model="userName" type="text" class="form-control phone-num username-register" name="userName" placeholder="账号:  为6-12位字母或数字组合" v-on:input="refresh">
                </div>
                <div class="form-group">
                    <!--<label>密码</label>-->
                    <input v-model="passWord" type="password" class="form-control key password-register" name="passWord" placeholder="密码   6-25位字符组合" v-on:input="refresh">
                </div>
                <div class="form-group">
                    <!--<label>验证码</label>-->
                    <input type="text" class="form-control " name="code-identify" placeholder="验证码">
                    <button class="btn btn-default codes" type="button">543210</button>
                </div>
                <button type="button" class="btn btn-default enterBtn" v-on:click="register" v-bind:disabled="ifworng">立即注册</button>
            </form>
            <transition enter-active-class="slide-topTobottom" leave-active-class="slide-bottomTotop">
                <div class="wrong-tips" v-show="ifworng == 'exit'">
                    <span class="wrong-user">用户名已存在</span>
                </div>
            </transition>
            <transition enter-active-class="slide-topTobottom" leave-active-class="slide-bottomTotop">
                <div class="wrong-tips" v-show="ifworng == 'worngUserName'">
                    <span class="wrong-user">用户名必须3-9位</span>
                </div>
            </transition>
            <transition enter-active-class="slide-topTobottom" leave-active-class="slide-bottomTotop">
                <div class="wrong-tips" v-show="ifworng == 'worngPassWord'">
                    <span class="wrong-user">密码必须6-15位</span>
                </div>
            </transition>
            <span class="register-wrong-tips register-wrong-username-combination">用户名必须为字母或数字组合</span>
            <!--<span class="register-wrong-tips register-wrong-passwordSize">密码必须6-15位</span>-->
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
            ifworng:'',
            ifDisable:'',
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
    },
	methods:{
        refresh(){

            if(this.userName.length != 0 && this.userName.length < 4 || this.userName.length > 9){
                this.ifworng = 'worngUserName'
            }else if(this.passWord.length != 0 && this.passWord.length < 6 || this.passWord.length > 15){
                this.ifworng = 'worngPassWord'
            }else if(this.userName.length == 0 || this.passWord.length == 0){
                this.ifworng = ''
            }else{
                this.ifworng = false;
            }


        },
        login:function(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','login');
        },
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        },
        register(){
            var that = this;
            $.ajax({
                url:"php/register.php",
                type:"POST",
                data:{
                    userName:that.userName,
                    passWord:that.passWord
                },
                dataType:"text",
                success:function(data){
                    if(data == "success"){
                        that.$store.commit('modelActive','registerSuccess');
                    }else if(data=="username exit"){
                        that.ifworng = 'exit';
                    }else if(data == "error"){
                        alert("有错")
                    }
                }
            });
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
    .enterBtn{
        display: block;
        margin: 13px auto;
        border: none;
        background-color: #3b8cff;
        color:white;
        &:hover{
            background-color: #3b8cff;
            color:white;
            opacity: 1;
        }
    }

</style>
