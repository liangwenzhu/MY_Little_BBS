<template>
    <nav>
        <ul class="nav">
            <li class="active">首页</li>
            <li v-on:mouseover="mouseOver" v-on:mouseout="mouseOut"><router-link to="/">精选板块</router-link></li>
            <li>论坛帮助</li>
            <li><router-link to="/expert">专家问答</router-link></li>
        </ul>
        <div class="section" v-show="section =='active'" v-on:mouseover="mouseOver" v-on:mouseout="mouseOut">
            <ul>
                <sectionList v-for="item in sectionObj" v-bind:item="item" v-on:shijian="childEventFn"></sectionList>
            </ul>
        </div>
        <div class="section loading" v-show="ifLoading">
            <div class="loadingTips">
                <loading></loading>
            </div>
        </div>
    </nav>
</template>
<script>
import sectionList from '../five/sectionList.vue';
import loading from '../tips/loading.vue';
export default {
    data:function(){
        return{
            section:'',


        }
    },
    components:{
        sectionList,
        loading
    },
	computed:{
        sectionId(){
            return this.$store.state.sectionId;
        },
        ifLoading(){
            return this.$store.state.sectionLoadingState;
        },
        sectionObj(){
            return this.$store.state.sectionDataObj;
        }
    },
	methods:{
        mouseOver(){
            this.section = 'active'
        },
        mouseOut(){
            this.section = ' '
        },
        childEventFn(loadingState){
           // this.ifLoading = loadingState;
        }
    },
    created(){
        //初始化板块，传入的是板块ID
        var that = this;
        var sectionId = this.$store.state.sectionId;
        $.ajax({
            url:"php/sectionSession.php",
            type:'post',
            data:{
                sectionId:sectionId
            },
            dataType:'text',
            success(data){
                //设置session成功后进行查询
                $.ajax({
                    url:'php/sectionSelect.php',
                    dataType:'json',
                    success(data){
                        //成功后得到数据，并关闭Loading动画
                        //that.sectionObj = data;
                        //提交数据到vuex
                        that.$store.commit('sectionDataObj',data);
                        //
                        that.$store.commit('sectionLoadingState',false);

                    },
                    error(){
                        alert("板块列表查询出错")
                    }
                })
            }
        })
    },
    watch:{
        //检测当前板块ID，设置当前板块ID的SESSION；
        sectionId(){
            var that = this;
            var sectionId = this.$store.state.sectionId;
            $.ajax({
                url:"php/sectionSession.php",
                type:'post',
                data:{
                    sectionId:sectionId
                },
                dataType:'text',
                success(data){

                }
            })
        }
    }

    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    nav{
        background-color: #ffffff;
        //overflow: hidden;
        z-index: 1;
        position: relative;
        color: #545454;

        .nav{
            padding: 20px;
            padding-bottom:0;
             li{
                float: left;
                margin-left:50px;
                //margin-top: 20px;
                padding-bottom:20px;
                color:inherit;
                font-size:20px;
                cursor: pointer;
                &:nth-child(1){
                    margin-left: 0;
                }
                 &:hover{
                     opacity: 0.7;
                 }
                 a{
                     padding:0;
                     color:inherit;
                     background-color: inherit;
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
        .loading{
            background-color: rgba(226, 226, 226, 0.55);
        }
    }
</style>
