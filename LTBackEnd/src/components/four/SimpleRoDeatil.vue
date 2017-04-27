<template>
  <div class="inline">
    <span v-bind:class="{active:ifShowDetail==false}" v-on:click="ShowDetail(false)">简略</span>
    <span v-bind:class="{active:ifShowDetail==true}" v-on:click="ShowDetail(true)">详细</span>
  </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
    ifShowDetail(){
      return this.$store.state.ifShowDetail
    }
    },
	methods:{
    ShowDetail(val){
      this.$store.commit('ifShowDetail',val);
    }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .inline{
      display: inline;
      .active{
        //color:#3b8cff;
      }
    }
</style>
