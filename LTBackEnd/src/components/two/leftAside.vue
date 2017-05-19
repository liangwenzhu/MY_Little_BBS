<template>
    <aside class="left-aside">
        <ul>
          <router-link to="/userManage" ><li v-bind:class="{active:activeOption == 'userManage'}" v-on:click="active('userManage')"><span class="glyphicon glyphicon-user"></span>用户管理</li></router-link>
          <router-link to="/tieziManage"><li v-bind:class="{active:activeOption == 'tieziManage'}" v-on:click="active('tieziManage')"><span class="glyphicon glyphicon-zoom-in"></span>帖子管理</li></router-link>
          <router-link to="/sectionManage"><li v-bind:class="{active:activeOption == 'sectionManage'}" v-on:click="active('sectionManage')"><span class="glyphicon glyphicon-paperclip"></span>板块管理</li></router-link>
          <router-link to="/managerApply"><li v-bind:class="{active:activeOption == 'managerApply'}" v-on:click="active('managerApply')"><span class="glyphicon glyphicon-bookmark"></span>版主管理</li></router-link>
          <router-link to="/expertApply"><li v-bind:class="{active:activeOption == 'expertApply'}" v-on:click="active('expertApply')"><span class="glyphicon glyphicon-bookmark"></span>专家管理</li></router-link>
          <router-link to="/expertQuestionApply"><li v-bind:class="{active:activeOption == 'expertQuestion'}" v-on:click="active('expertQuestion')"><span class="glyphicon glyphicon-bell"></span>专家问答</li></router-link>
          <router-link to="/jubaoManage"><li v-bind:class="{active:activeOption == 'jubaoManage'}" v-on:click="active('jubaoManage')"><span class="glyphicon glyphicon-bell"></span>举报管理</li></router-link>
          <!--<li><span class="glyphicon glyphicon-file"></span>文章管理</li>-->
          <!--&lt;!&ndash;<li><span class="glyphicon glyphicon-paperclip"></span>资料管理</li>&ndash;&gt;-->
          <!--<li><span class="glyphicon glyphicon-cog"></span>参数设置</li>-->
          <!--<li><span class="glyphicon glyphicon-plus"></span>其他</li>-->
          <!--<li><span class="glyphicon glyphicon-plus"></span>{{activeOption}}</li>-->
        </ul>
        <!--<p><span class="glyphicon glyphicon-trash"></span>回收站</p>-->
    </aside>
</template>
<script>

//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{
            activeOption:'',
        }
    },
    components:{
        //aaa,
    },
	computed:{
        userScore(){
            return this.$store.state.userScore
        },
    },
	methods:{
        active(active){

            this.activeOption = active;
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .left-aside{

        position: fixed;
        left:0;
        top:75px;
        width:194px;
        height:100%;
        //background-color: rgb(241, 241, 241);
        background: #eff4f8;
        border-right:none;
        ul{
            padding:0;
            li{
                height:45px;
                line-height: 45px;
                text-align: justify;
                padding-left:50px;
                background: #eff4f8;
                cursor: pointer;
                &:hover{
                    background: rgba(0,0,0,.05);
                }
                span{
                    margin-right:5px;
                }
            }
            .active{
                background: rgba(0,0,0,.05);
                color:#3b8cff;
            }
        }
        p{
            height:45px;
            line-height: 45px;
            background: rgba(0,0,0,.05);
            //margin-top:100px;
            width:194px;
            padding-left:50px;
            //position: absolute;
            span{
                font-size: 13px;
                margin-right:5px;
            }
        }
    }
</style>
