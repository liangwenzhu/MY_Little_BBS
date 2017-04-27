<template>
    <div class="register modal-vote" >
        <div class="container">
            <span class="vote-topleft">添加后台管理账号</span>
            <img class="close" v-on:click="close"  src="../../../lib/imgs/modal/wrong.png">
            <hr>
            <form>
                <div class="form-group">
                    <!--<label>账号</label>-->
                    <input v-model="userName" type="text" class="form-control phone-num username-register" name="userName" placeholder="账号:  为6-12位字母或数字组合">
                </div>
                <div class="form-group">
                    <!--<label>密码</label>-->
                    <input v-model="passWord" type="password" class="form-control key password-register" name="passWord" placeholder="密码   6-25位字符组合">
                </div>
                <div class="form-group">
                    <!--<label>验证码</label>-->
                    <input type="text" class="form-control " name="code-identify" placeholder="验证码">
                    <button class="btn btn-default codes" type="button">543210</button>
                </div>
                <button type="button" class="btn btn-default complete register-btn" v-on:click="register">立即注册</button>
            </form>
            <span class="register-wrong-tips register-wrong-username-been-used">用户名已被占用</span>
            <span class="register-wrong-tips register-wrong-username-combination">用户名必须为字母或数字组合</span>
            <span class="register-wrong-tips register-wrong-usernameSize">用户名必须3-9位</span>
            <span class="register-wrong-tips register-wrong-passwordSize">密码必须6-15位</span>
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
        close:function() {
            this.$store.commit({
                type:'modelWindow',
                modelShow:false,
                modelActive:'none',
            })
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
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';

</style>
