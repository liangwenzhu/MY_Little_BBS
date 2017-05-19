<template>
    <tr class="overHeadTr" >
        <td>
            <p><span class="overhead" v-show="ifOverHead.tieziOverhead == 1">【置顶】</span><router-link v-bind:to="tieziUrl">{{item.tieziTitle}}</router-link><b class="hidden">{{item.tieziId}}</b></p>
        <td>
            <p>{{item.tieziScore}}</p>
        </td>
        <td>
            <p class="username"><a href="#">{{item.tieziCreater}}~</a></p>
            <p class="question-data">{{item.tieziCreaterData}}</p>
        </td>
        <td>
            <p>{{item.tieziAnswer}}</p>
        </td>
        <td>
            <p class="username"><a href="#">{{item.tieziLastAnswer}}</a></p>
            <p class="question-data">{{item.tieziLastAnswerDate}}</p>
        </td>
        <td is="optionTd" v-bind:overState="ifOverHead"></td>
    </tr>
</template>
<script>
import optionTd from '../six/bbs-table-optionTd.vue'
export default {
    props:['item'],
    data:function(){
        return{
            hovering:false,
        }
    },
    components:{
        optionTd,
    },
	computed:{
        tieziUrl(){
          return "/content/"+ this.item.tieziId
        },
        ifOverHead:function(){
            return {
                tieziOverhead :this.item.tieziOverhead,
                tieziId : this.item.tieziId
            };
        }
    },
	methods:{
        mouseMove:function(){
            //alert("123");
            this.hovering = true;
        },
        mouseOut:function(){
            this.hovering = false;
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
</style>
