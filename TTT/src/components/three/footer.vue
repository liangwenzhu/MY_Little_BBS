<template>
    <footer>
        <ul>
            <li><a href="#">网站简介</a></li>
            <li><a href="#">广告服务</a></li>
            <li><a href="#">联系方式</a></li>
            <li><a href="#">版权声明</a></li>
            <li><a href="#">合作伙伴</a></li>
            <li><a href="#">友情链接</a></li>
        </ul>
        <hr>
        <p class="beian">本社区 提供的内容仅用于培训。我们不保证内容的正确性。通过使用本站内容随之而来的风险与本站无关，对任何法律问题及风险不承担任何责任。</p>
        <p class="beian">京XXXXXXXXXXX号 1994-2016,版权所有</p>
    </footer>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    footer{
        width:100%;
        float: right;
        margin-top: 20px;
        margin-bottom: 20px;
        ul{
            padding: 0;
            overflow: hidden;
            li{
                float: left;
                margin-left: 15px;
                &:nth-child(1){
                    margin-left:0px;
                }
                a{
                    text-decoration: none;
                    color: rgba(255, 255, 255, 0.82);
                    &:hover{
                        color: rgba(255, 255, 255, 1);
                    }
                }
            }
        }
        .beian{
            font-size: 12px;
            color: rgba(255, 255, 255, 0.81);
        }
    }
</style>
