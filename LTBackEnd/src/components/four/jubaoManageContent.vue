<template>
  <div class="flex-content" >
    <!--选定-->
    <span><input type="checkbox"></span>
    <!--帖子Id-->
    <span class="pointer" v-on:click="tieziDetailShow">{{item.tieziId}}</span>
    <!--跟帖ID-->
    <span class="pointer" v-on:click="gentieDetailShow">{{item.gentieId}}</span>
    <!--被举报用户-->
    <span class="pointer" v-on:click="beiJubaoUserDetailShow">{{item.beijubaoUserName}}</span>
    <!--跟帖日期-->
    <span v-show="ifShowDetail" class="date">{{item.gentieCreaterData}}</span>
    <!--举报人-->
    <span class="pointer" v-on:click="jubaoUserDetailShow">{{item.jubaoUserName}}</span>
    <!--举报理由-->
    <span v-show="ifShowDetail">{{item.jubaoReason}}</span>
    <!--举报时间-->
    <span v-show="ifShowDetail" class="date">{{item.jubaoDate}}</span>
  </div>
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
    ifShowDetail(){
      return this.$store.state.ifShowDetail
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
    },
    /*被举报用户详情弹出*/
    beiJubaoUserDetailShow(){
      var that = this;
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelUserDetail'
      });
       var userName = this.item.beijubaoUserName;
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

    },
    /*举报用户详情弹出，和上面的参数不同*/
    jubaoUserDetailShow(){
      var that = this;
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelUserDetail'
      });
      var userName = this.item.jubaoUserName;
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
    }
</style>
