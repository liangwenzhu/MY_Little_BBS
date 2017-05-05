<template>
  <div class="flex-content" v-bind:class="{light:item.tieziOverhead == 1}">
    <span>{{Index}}</span>
    <span >{{item.tieziId}}</span>
    <span class="pointer" v-bind:class="{tieziTitle:ifShowDetail == false}" v-on:click="tieziDetailShow">{{item.tieziTitle}}</span>
    <span class="pointer" v-on:click="userDetailShow">{{item.tieziCreater}}</span>
    <span v-show="ifShowDetail">{{item.tieziCreaterData}}</span>
    <span >{{ifoverHead}}</span>
    <span v-show="ifShowDetail">{{item.tieziLastAnswer}}</span>
    <span v-show="ifShowDetail">{{item.tieziLastAnswerDate}}</span>
    <span v-show="ifShowDetail">{{item.tieziScore}}</span>
    <span>{{item.tieziAnswer}}</span>
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
    Index(){
      return this.index +1
    },
    ifShowDetail(){
      return this.$store.state.ifShowDetail
    },
    ifoverHead(){
      if(this.item.tieziOverhead == 1){
        return "顶置"
      }else{
        return "普通"
      }
    },

    },
	methods:{
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
    },
    /*用户详情弹出*/
    userDetailShow(){
      var that = this;
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelUserDetail'
      });
      var userName = this.item.tieziCreater;
      $.ajax({
        url:'php/backend/userDetailSelect.php',
        data:{
          userName:userName,
        },
        type:'post',
        dataType:'JSON',
        success(data){
          that.$store.commit('userData',data);
        },
        error(data){
          alert("用户详情查询出错");
        }
      })

    }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .light{
      color:red;
    }
    .flex-content{
      //cursor: pointer;
      .pointer{
        cursor: pointer;
        &:hover{
          color: #3b8cff;
        }
      }
      .data{
        min-width: 150px;
      }
      .tieziTitle{
        min-width: 400px;
      }
    }
</style>
