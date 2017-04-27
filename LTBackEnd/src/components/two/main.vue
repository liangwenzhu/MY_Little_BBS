<template>
    <div>
        <!--<myHeader></myHeader>-->
        <!--<container></container>-->
        <!--<p>-->
            <!--&nbsp;-->
            <!--123-->
            <!--<br>-->
            <!--&lt;!&ndash; 使用 router-link 组件来导航. &ndash;&gt;-->
            <!--&lt;!&ndash; 通过传入 `to` 属性指定链接. &ndash;&gt;-->
            <!--&lt;!&ndash; <router-link> 默认会被渲染成一个 `<a>` 标签 &ndash;&gt;-->
            <!--&lt;!&ndash;<router-link to="/">back</router-link>&ndash;&gt;-->
            <!--&lt;!&ndash;<router-link to="/content">content</router-link>&ndash;&gt;-->
        <!--</p>-->
        <router-view></router-view>
        <myFooter></myFooter>
        <p>{{userStateChange}}</p>
    </div>
</template>
<script>
    import router from '../../router/router.js';
    import abcd from '../../components/content/content.vue'
//import aaa from '../seven/inform-bottom.vue'
    import myHeader from '../three/header.vue'
    import middle from '../three/middle.vue'
    import container from '../three/container.vue'
    import myFooter from '../three/footer.vue'
export default {
    data:function(){
        return{

        }
    },
    components:{
        myHeader,
        middle,
        container,
        myFooter,
    },
	computed:{
        tieziMaxNum(){
            return this.$store.state.tieziMaxNum
        },
        userStateChange(){
            return this.$store.state.userStateChange;
        }
    },
	methods:{

    },
    watch:{
        userStateChange:function(){
            var that = this;
            /*用户信息*/
            $.ajax({
                url:"php/userInformation.php",
                dataType:"JSON",
                success:function(data){
                    if(data==false){
                        that.$store.state.userName = 'none'
                    }else{
                        that.$store.commit({
                            type:'userInformation',
                            userName:data.userName,
                            userSign:data.userSign,
                            userHead:data.userHead,
                            userScore:data.userScore
                        });
                    }
                },
                error:function(data){
                    alert(data)
                }
            });

            /*用户通知-条数*/
            $.ajax({
                url:"/php/tongzhiCount.php",
                success:function(data){
                    that.$store.state.userInformCount = data
                },
                error:function(data){
                    alert("出错");
                    alert(data);
                }
            });

            /*用户通知-内容*/
            $.ajax({
                url:"php/tongzhiSelect.php",
                type:"post",
                dataType:"JSON",
                success:function(data){
                    that.$store.state.userInformContain = data;
                }
            });

        }
    },
    created:function(){
        /*初始化*/
        /*用户信息状态变更*/
        this.$store.commit('userStateChange');

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
</style>
