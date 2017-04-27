<template>
  <div class="flex-content" >
    <span>索引值</span>
    <span class="pointer" v-on:click="userDetailShow">{{item.userName}}</span>
    <span>{{item.relName}}</span>
    <span>{{item.major}}</span>
    <span class="date">{{item.company}}</span>
    <span v-show="ifShowDetail">{{item.job}}</span>
    <span class="date" v-show="ifShowDetail">{{item.email}}</span>
    <span class="date" v-show="ifShowDetail">{{item.requireDate}}</span>
    <span class="pointer" v-on:click="modelExpertDetailShow">点击查看</span>
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
    modelExpertDetailShow(){
      this.$store.commit('managerData',this.item);
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelExpertDetail'
      })
    },
//    用户详情
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
    },
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .flex-content{
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
