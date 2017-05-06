<template>
  <div class="flex-content" v-show="ifShow">
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
    requirestate:'',
  },
  data:function(){
    return{

    }
  },
  components:{
    //aaa,
  },
  computed:{
    ifShow(){
      /*检测状态是否符合，用以筛选数据*/
      if(this.requirestate == this.item.questionRequireStatus){
        return true
      }else{
        return false
      }
    },
    ifShowDetail(){
      return this.$store.state.ifShowDetail
    },
    Index(){
      return this.index + 1;
    },
    RequireState(val){
      return val;
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
  created(){
    //alert("213");
    if(this.ifShow){
      var objVal = {inIt:0,Val:1};
      this.$emit('shijian',objVal)
    }
  },
  watch:{
    requirestate:function(){
      if(this.ifShow){
        var objVal = {inIt:0,Val:1};
        this.$emit('shijian',objVal)
      }
    }
  },
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
