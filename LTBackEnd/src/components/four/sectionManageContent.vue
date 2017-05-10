<template>
  <div class="flex-content" >
    <span>索引值</span>
    <span class="pointer">{{item.sectionId}}</span>
    <span class="date">{{item.sectionName}}</span>
    <!--<span>{{managerObjData.length}}</span>-->
    <span class="pointer">{{managerJsonDataObj.length}}</span>
    <span class="date">{{item.sectionCreatedDate}}</span>
    <span class="pointer" v-on:click="modelSectionEditorShow">点击操作</span>
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
      },
    managerJsonDataObj(){
      return this.item.managerJsonDataObj;
    }
    },
	methods:{
    modelSectionEditorShow(){
      //this.$store.commit('managerData',this.item);
      this.$store.commit('sectionObj',this.item);
      this.$store.commit({
        type:'modelWindow',
        modelShow:true,
        modelActive:'modelSectionEditor'
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
