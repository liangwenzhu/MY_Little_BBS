<template>
    <nav>
        <ul class="nav">
            <li class="active">首页</li>
            <li v-on:mouseover="mouseOver" v-on:mouseout="mouseOut">精选板块</li>
            <li>论坛帮助</li>
            <li>专家问答</li>
            <li>牛人推荐</li>
        </ul>
        <div class="section" v-show="section =='active'" v-on:mouseover="mouseOver" v-on:mouseout="mouseOut">
            <ul>
                <li class="active">JavaScript</li>
                <li>HTML5</li>
                <li>JAVA</li>
                <li>.NET</li>
                <li>.IOS</li>
            </ul>
        </div>
    </nav>
</template>
<script>

export default {
    data:function(){
        return{
            section:''
        }
    },
    components:{

    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
    },
	methods:{
        mouseOver(){
            this.section = 'active'
        },
        mouseOut(){
            this.section = ' '
        }
    },

    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    nav{
        background-color: rgba(69, 154, 221, 0.1);
        //overflow: hidden;
        z-index: 1;
        position: relative;
        .nav{
            padding: 20px;
            padding-bottom:0;
             li{
                float: left;
                margin-left:50px;
                //margin-top: 20px;
                padding-bottom:20px;
                color:white;
                font-size:20px;
                cursor: pointer;
                &:nth-child(1){
                    margin-left: 0;
                }
                 &:hover{
                     opacity: 0.7;
                 }
            }
            .active{
                color:orangered;
            }
        }
        .section{
            position: absolute;
            width:968px;
            height:200px;
            background-color: white;
            padding:15px;
            ul{
                padding:0;
                margin:0;
                li{
                    float:left;
                    margin-left:25px;
                    cursor: pointer;
                    &:nth-child(1){
                        margin-left:0;
                    }
                    &:hover{
                        color: #3b8cff;
                    }
                }
                .active{
                    border-bottom: 2px solid red;
                }
            }
        }
    }
</style>