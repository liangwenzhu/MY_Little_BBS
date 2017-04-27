<template>
    <div class="flex-content">
      <span>序号索引</span>
      <span class="pointer" v-on:click="userDetailShow">{{item.userName}}</span>
      <span class="data">{{item.userCreatedData}}</span>
      <span class="data" v-show="ifShowDetail">最后留言日期</span>
      <span v-show="ifShowDetail">{{item.userScore}}</span>
      <span v-show="ifShowDetail">{{item.userFatieCount}}</span>
      <span v-show="ifShowDetail">{{item.userGentieCount}}</span>
      <span v-show="ifShowDetail">{{item.userUpVoteCount}}</span>
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
    userDetailShow(){
      var that = this;
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelUserDetail'
      });
      var userName = this.item.userName;
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
