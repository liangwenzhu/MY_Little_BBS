<template>
    <li v-on:click="sectionChange" v-bind:class="{active:ifActive}">{{item.sectionName}}</li>
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
        sectionId (){
           return this.$store.state.sectionId;
        } ,
        ifActive(){
            if(this.item.sectionId == this.sectionId){
                return true
            }
        }
    },
	methods:{
        sectionChange(){
            if(this.ifActive){

            }else{
                var sectionId = this.item.sectionId;
                var loadingState = true;
                this.$store.commit('sectionId',sectionId);
                //开启SectionLoading
                this.$store.commit('sectionLoadingState',true);
            }

        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';

</style>
