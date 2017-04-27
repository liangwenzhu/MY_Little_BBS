<template>
    <li v-bind:class="{active : item.page == pageClickNum}"
        v-if="ifPageShow=='show'"
        v-on:click="pageClick" >
        {{item.page}}
    </li>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    props:['item'],
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
        pageMaxNum:function(){
            return this.$store.state.pageMaxNum
        },
        pageIgnoreNum:function(){
            return this.$store.state.pageIgnoreNum
        },
        ifPageShow:function(){
            if(this.item.page > this.pageMaxNum || this.item.page < this.pageIgnoreNum){
                return 'notShow'
            }else{
                return 'show'
            }
        },
        pageClickNum(){
            return this.$store.state.pageClickNum
        },
    },
	methods:{
        pageClick:function(){
//            if(this.item.page%this.pageMaxNum==0){
                if(this.item.page%this.pageMaxNum==0){
                /*点中规定页码事件*/
                this.$store.commit({
                    type:'tieziFenye',
                    pageClickNum:this.item.page,
                });
            }
            /*正常事件*/
            this.$store.commit({
                type:'pageClickNum',
                pageClickNumForNormal:this.item.page,
            });
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    
</style>