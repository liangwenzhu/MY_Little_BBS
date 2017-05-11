<template>
    <div class="expert">
        <div class="expertHeader"></div>
        <div class="recruit">
            <div class="content">
                <p class="title">躬行网专家招募</p>
                <article>
                    不限专业领域、不限技术方向，只要你是一个有活力并乐于分享的开发者，只要你愿意用自己的实力和经验帮助众多从业者共同学习、共同进步，我们就欢迎你来做客社区问答，如果你也有此意，就请填写下面的问题吧，我们会及时与你取得联系。
                </article>
                <button class="btn" v-on:click="expertRequire"><span class="glyphicon glyphicon-edit"></span>立即申请</button>
                <button class="btn registerSuccess" v-on:click="expertRequireSuccess"><span class="glyphicon glyphicon-ok"></span>申请成功？请戳这里</button>
            </div>
        </div>
        <!--声明和开启问答入口-->
        <declare></declare>
        <div class="active-father">
            <!--最新问答-->
            <latestQuestion></latestQuestion>
            <!--热门专家列表-->
            <hotExperts></hotExperts>
        </div>
        <niceActive></niceActive>
    </div>
</template>
<script>
    import '../../../../lib/imgs/expert-ad.png';
    import hotExperts from '../three/hotExperts.vue'
    import declare from '../three/declare.vue'
    import latestQuestion from '../three/latestQuestion.vue'
    import niceActive from '../three/niceActive.vue'
export default {
    data:function(){
        return{

        }
    },
    components:{
        hotExperts,
        declare,
        latestQuestion,
        niceActive
    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
    },
	methods:{
        expertRequire(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','modelExpertRequire');
        },
        expertRequireSuccess(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','expertRequireSuccess');
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../../lib/css/selfSet.less';
    .expert{
        margin-top:10px;
        line-height: 22px;
    }
    .expertHeader{
        background: url('../../../../lib/imgs/expert-ad.png');
        background-size: cover;
        width:800px;
        height:255px;
        display: inline-block;
    }
    .recruit{
        display: inline-block;
        vertical-align: top;
        height:255px;
        width:390px;
        background-color: white;
        margin-left:5px;
        .content{
            padding:15px;
            .title{
                font-size: 20px;
                font-weight: 600;
                width:150px;
                border-bottom:2px solid #c00;
                padding-bottom: 8px;
            }
            article{
                text-align: justify;
                line-height: 22px;
                font-size: 14px;
            }
            button{
                background-color: #3b8cff;
                color:white;
                margin-top:25px;
                span{
                    margin-right:10px;
                }
                p{
                    text-align: justify;
                }
            }
            .registerSuccess{
                float:right;
                background-color: #da1b4f;
            }
        }
    }
    .active-father{
        width:100%;
        //background-color: blue;
        margin-top:10px;
    }

</style>
