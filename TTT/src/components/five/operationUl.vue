<template>
    <ul class="operation-ul">
        <!--<li>{{navActive}}</li>-->
        <li class="search"
            v-bind:class="{active : navActive=='search'}"
            v-on:mousemove="search"
            v-on:mouseout="none">
          <i class="glyphicon glyphicon-search"></i>
        </li>
        <li v-on:click="modelLoveShow"><span class="glyphicon glyphicon-heart"></span></li>
        <li class="inform-bell"
            v-bind:class="{active:navActive=='inform'}"
            v-on:mousemove="inform"
            v-on:mouseout="none">
          <span class="glyphicon glyphicon-bell" ></span><i></i>
        </li>
        <li v-bind:class="{active:navActive=='userInformation'}"
            v-on:mousemove="userInformation"
            v-on:mouseout="none">
          <span><img class="littleHead" v-bind:src="userHead"></span>
        </li>
        <li><span class="glyphicon glyphicon-align-justify" ></span></li>
    </ul>
</template>
<script>
    export default {
        data:function(){
            return{

            }
        },
		components:{

        },
        computed:{
            navActive:function(){
                return this.$store.state.navActive
            },
            userHead:function(){
                return this.$store.state.userHead
            }
        },
        methods:{
            search:function(){
                this.$store.commit('navActive','search')
            },
            inform:function(){
                this.$store.commit('navActive','inform')
            },
            userInformation:function(){
                this.$store.commit('navActive','userInformation')
            },
            none:function(){
                this.$store.commit('navActive','none')
            },
            modelLoveShow(){
                this.$store.commit('modelShow',true);
                this.$store.commit('modelActive','love');
            }
        },

       // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .operation-ul{
        margin-top: -5px;
        //display: inline-block;
        float: right;
        position: relative;
        li{
            text-align: center;
            line-height: 35px;
            width:35px;
            height:40px;
            float: left;
            margin-right:10px;
            margin-top:5px;
            color:white;
            cursor: pointer;
            border-top: none;
            &:last-child{
                //margin-right: 0;
            }
            /*&:hover{*/
                /*background-color: white;*/
                /*color:black;*/
            /*}*/
            span{
                img{
                    text-align: center;
                    width:28px;
                    height:28px;
                }
            }
        }
        .inform-bell{
            position: relative;
            i{
                position: absolute;
                width:7px;
                height:7px;
                .pic-circle(15px);
                background-color: red;
                top:5px;
                right:5px;
            }
        }
        .active{
            background-color: white;
            color:black;
        }
    }
</style>
