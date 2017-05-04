<template>
  <div class="noRecord">
    <img src="../../../lib/imgs/modal/vote-success.png">
    <p class="tips">没有记录</p>
  </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'
import '../../../lib/imgs/modal/vote-success.png'
export default {
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
        navActive(){
            return this.$store.state.navActive
        },
    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .noRecord{
      position: absolute;
      width:200px;
      height:200px;
      text-align: center;
      left:50%;
      top:50%;
      margin-left:-100px;
      margin-top:-100px;
    }
</style>
