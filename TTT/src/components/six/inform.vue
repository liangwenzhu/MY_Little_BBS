<template>
    <div class="inform" v-on:mousemove="inform" v-on:mouseout="none">
        <div class="inform-container" >
            <p class="count"><span class="ignore-all" v-on:click="ignoreAllInform">全部忽略</span><span class="inform-count">你共有<b>{{informCount}}</b>条通知</span></p>
            <div class="noInformation" v-if="informCount == 0">世界，清静了</div>
            <!--<informContain v-else></informContain>-->
            <div class="inform-list" v-else>
                <informList v-for="item in userInformContain" v-bind:item="item"></informList>
            </div>
        </div>
    </div>
</template>
<script>
import button from '../seven/inform-bottom.vue'
//    var informContain = require('../seven/inform-bottom.vue');
    var informList = require('../seven/informList.vue');
export default {
    data:function(){
        return{

        }
    },
    components:{
//        informContain,
        informList,
    },
    methods:{
        inform:function(){
            this.$store.commit('navActive','inform')
        },
        none:function(){
            this.$store.commit('navActive','none')
        },
        ignoreAllInform(){
            $.ajax({
                url:"php/tongzhiDeleteAll.php",
                success:function(data){
                    if(data=="success"){
                        alert("成功");
                        that.$store.commit('userStateChange');
                    }else{
                        alert("失败");
                        alert(data);
                    }
                },
                error:function(data){
                    alert(data);
                }
            })
        }
    },
    computed:{
        informCount:function(){
            return this.$store.state.userInformCount;
        },
        userInformContain(){
            return this.$store.state.userInformContain;
        }
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .inform{
        position: absolute;
        width:430px;
        height:300px;
        right:0px;
        top:40px;
        background-color: white;
        -webkit-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        -moz-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        overflow: auto;
        z-index: 99;
        .inform-container{
            position: relative;
            width:380px;
            margin: 0 auto;
            .noInformation{
                position: absolute;
                width:380px;
                height:300px;
                line-height: 300px;
                text-align: center;
                top:0;
                //display: none;
            }
            .count{
                width:100%;
                height:40px;
                line-height: 50px;
                .ignore-all{
                    cursor: pointer;
                    color: #e23428;
                }
                .inform-count{
                    float:right;
                    b{
                        color: #e23428;
                    }
                }
            }
        }
    }
</style>
