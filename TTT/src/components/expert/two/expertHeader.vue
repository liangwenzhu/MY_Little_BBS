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
        <div class="declare">
            <article>
                <b>躬行社区专家问答</b>是躬行社区利用自身平台优势，针对开发者需求开展起来的业界专家与广大开发者的互动活动。受邀专家做客CSDN论坛，在为期一周的时间内，为广大开发者解答相关领域的技术问题，同时，作为职场过来人，也会针对职场新人在职业发展中遇到的困惑给出自己的建议。
            </article>
            <p>您是否对某专业领域存在技术疑问？您是否想成为CSDN社区专家？快快来参与我们的活动吧！</p>
        </div>
        <div class="active-father">
            <div class="active-child">
                <p class="title">最新期社区问答互动<span>访问<i class="glyphicon glyphicon-share-alt"></i></span></p>
                <img class="touxiang" src="#">
                <article class="introduce">盘点过去两年，Apache Spark无疑是最热门的开源大数据框架，然而作为一个高速发展的开源项目其生产环境使用仍然存在一些问题。这里，CSDN特邀请8位技术大牛，为大家答疑解惑。</article>
            </div>
            <!--热门专家列表-->
            <hotExperts></hotExperts>
        </div>
        <div class="niceActive">
            <p class="title">近期精彩社区问答活动回顾</p>
            <div class="niceActiveChild">
                <p class="activeTime">第40期</p>
                <div class="baseIntroduce">
                    <button class="btn">进去瞧瞧</button>
                    <p>活动主题：<b>Linux与开源软件的运维之道</b></p>
                    <p>活动时间：<b>2016年03月07日--2016年03月13日</b></p>
                    <p>问答专家：<b>高俊峰</b></p>
                </div>
                <div class="detail">
                    <img src="#">
                    <p>本期的社区问答（3月21日—3月27日）我们请来了《Java语言规范：基于Java SE 8》一书的译者陈昊鹏为大家解答关于JAVA方面的问题。</p>
                    <p><span class="userName">陈昊鹏：</span>陈昊鹏，上海交通大学软件学院副教授，2001年于西北工业大学计算机科学与工程系获工学博士学位，从事软件工程和分布式计算方面的研究。翻译过《Java编程思想》第三版和第四版、《Java核心技术卷2》第7版、第8版和第9版</p>
                </div>
            </div>
            <div class="niceActiveChild">
                <p class="activeTime">第40期</p>
                <div class="baseIntroduce">
                    <button class="btn">进去瞧瞧</button>
                    <p>活动主题：12312</p>
                    <p>活动时间：23123</p>
                    <p>问答专家：21321</p>
                </div>
                <div class="detail">
                    <img src="#">
                    <p>本期的社区问答（3月21日—3月27日）我们请来了《Java语言规范：基于Java SE 8》一书的译者陈昊鹏为大家解答关于JAVA方面的问题。</p>
                    <p><span class="userName">陈昊鹏：</span>陈昊鹏，上海交通大学软件学院副教授，2001年于西北工业大学计算机科学与工程系获工学博士学位，从事软件工程和分布式计算方面的研究。翻译过《Java编程思想》第三版和第四版、《Java核心技术卷2》第7版、第8版和第9版</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import '../../../../lib/imgs/expert-ad.png';
    import hotExperts from '../three/hotExperts.vue'
export default {
    data:function(){
        return{

        }
    },
    components:{
        hotExperts
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
    .declare{
        background: white;
        padding:15px;
        margin-top:5px;
        article{
            font-size: 16px;
            b{
                font-size: 20px;
                color: #da1b4f;
            }
        }
        p{
            font-size: 18px;
            color: #3b8cff;
            margin-top:10px;
        }
    }
    .active-father{
        width:100%;
        //background-color: blue;
        margin-top:10px;
        .active-child{
            width:430px;
            height:245px;
            background-color: white;
            padding:15px;
            display: inline-block;
            .title{
                font-size: 20px;
                font-weight: 600;
                min-width:150px;
                border-bottom:2px solid #c00;
                padding-bottom: 8px;
                span{
                    float:right;
                    font-size: 15px;
                    font-weight: 400;
                    cursor: pointer;
                    color: #da1b4f;
                    i{
                        margin-left:5px;
                    }
                }
            }
            img{
                margin-top:10px;
                width:156px;
                height:156px;
                float:left;
                margin-right:5px;
            }
            article{
                margin-top:20px;
                font-size: 14px;
                text-align: justify;
            }
        }

    }
    .niceActive{
        width:100%;
        background-color: white;
        margin-top:10px;
        padding:15px;
        .title{
            font-size: 20px;
            font-weight: 600;
            min-width:150px;
            border-bottom:2px solid #c00;
            padding-bottom: 8px;
            span{
                float:right;
                font-size: 15px;
                font-weight: 400;
                cursor: pointer;
                color: #da1b4f;
                i{
                    margin-left:5px;
                }
            }
        }
        .niceActiveChild{
            height:330px;
            .activeTime{
                width:90px;
                font-size: 20px;
                background-color: #3b8cff;
                color:white;
                padding:10px;
            }
            .baseIntroduce{
                //margin-top:40px;
                button{
                    float:right;
                    background-color: #da1b4f;
                    color:white;
                }
            }
            .detail{
                margin-top:20px;
                img{
                    width:150px;
                    height:150px;
                    float:left;
                    margin-right:15px;
                }
                p{
                    &:nth-child(3){
                        span{
                            font-weight: 600;
                            font-size: 16px;
                        }
                        margin-top:40px;
                        font-size: 14px;
                    }
                }
            }
        }
    }
</style>
