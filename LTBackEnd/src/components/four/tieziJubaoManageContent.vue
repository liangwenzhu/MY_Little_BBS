<template>
  <div class="flex-content" >
    <!--选定-->
    <span>{{Index}}</span>
    <!--被举报帖子Id-->
    <span class="pointer" v-on:click="tieziDetailShow">{{item.tieziId}}</span>
    <!--被举报用户-->
    <span>{{item.tieziCreater}}</span>
    <!--帖子创建日期-->
    <span v-show="ifShowDetail" class="date">{{item.tieziCreaterData}}</span>
    <!--回帖人数-->
    <span>{{item.tieziAnswer}}</span>
    <!--举报人-->
    <span>{{item.jubaoUserName}}</span>
    <!--举报理由-->
    <span v-show="ifShowDetail">{{item.jubaoReason}}</span>
    <!--举报时间-->
    <span v-show="ifShowDetail" class="date">{{item.jubaoDate}}</span>
  </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
  props:{
    item:'',
    index:''
  },
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
      },
    Index(){
      return this.index +1
    }
    },
	methods:{
    modelHostDetailShow(){
      this.$store.commit('managerData',this.item);
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelHostDetail'
      })
    },
    /*跟帖详细弹出*/
    gentieDetailShow(){
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelGentieDetail'
      });
      var that = this;
      var gentieId = this.item.gentieId;
      $.ajax({
        url:"php/backend/gentieDetailSelect.php",
        data:{
          gentieId:gentieId,
        },
        type:"post",
        dataType:"JSON",
        success:function(data){
          that.$store.commit('gentieData',data);
        },
        error:function(data){
          alert(data);
          alert("失败");
        }
      });

    },
    /*帖子详细弹出*/
    tieziDetailShow(){
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelTieziDetail'
      });
      var that = this;
      var tieziId = this.item.tieziId;
      $.ajax({
        url:"php/backend/tieziDetailSelect.php",
        data:{
          tieziId:tieziId,
        },
        type:"post",
        dataType:"JSON",
        success:function(data){
          that.$store.commit('tieziData',data);
        },
        error:function(data){
          alert(data);
          alert("失败");
        }
      });

    }

    },

    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .flex-content{
      //cursor: pointer;
      .pointer{
        cursor: pointer;

        &:hover{
          color: #3b8cff;
        }
      }
    }
</style>
