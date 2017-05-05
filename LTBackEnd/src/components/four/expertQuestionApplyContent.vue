<template>
  <div class="flex-content" >
    <span>{{Index}}</span>
    <span class="pointer" v-on:click="userDetailShow">{{item.userName}}</span>
    <span class="pointer">{{item.relName}}</span>
    <span class="date" v-show="ifShowDetail">{{item.questionRequireTime}}</span>
    <span>{{item.questionRequireStatus}}</span>
    <span class="pointer" v-on:click="modelExpertQuestionRequireDetailShow">点击操作</span>
  </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
  props:{
    item:'',
    index:'',
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
        return this.index + 1;
    }
    },
	methods:{
      //专家申请详情
    modelExpertQuestionRequireDetailShow(){
      //将该轮所有数据传给vuex。
      this.$store.commit('expertQuestionRequireObj',this.item);
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelExpertQuestionRequireDetail'
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
