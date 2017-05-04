<template>
  <div class="spinner">
    <b class="rect1"></b>
    <b class="rect2"></b>
    <b class="rect3"></b>
    <b class="rect4"></b>
    <b class="rect5"></b>
    <p>加载中</p>
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
    /*loading*/
    .loading(@y-begin,@y-end,@name){
      @keyframes @name{
        0%, 40%, 100% {
          transform: scaleY(@y-begin);
        }
        20% {
          transform: scaleY(@y-end);
        }
      }
      @-webkit-keyframes @name{
        0%, 40%, 100% {
          transform: scaleY(@y-begin);
        }
        20% {
          transform: scaleY(@y-end);
        }
      }
      @-moz-keyframes @name{
        0%, 40%, 100% {
          transform: scaleY(@y-begin);
        }
        20% {
          transform: scaleY(@y-end);
        }
      }
      @-o-keyframes @name{
        0%, 40%, 100% {
          transform: scaleY(@y-begin);
        }
        20% {
          transform: scaleY(@y-end);
        }
      }
    }
    .animation(@animation-name,@animation-duration,@animation-timing-function,@animation-delay,@play-state,@animation-iteration-count){
      -webkit-animation: @arguments;
      -moz-animation: @arguments;
      -ms-animation: @arguments;
      -o-animation:  @arguments;
      animation: @arguments;
    }
    /*loading创建*/
    .loading(0.4,1.0,LoadingFirst);
    .rect1{
      .animation(LoadingFirst,1.2s,ease-in-out,-2.5s,forwards,infinite);
    }
    .rect2{
      .animation(LoadingFirst,1.2s,ease-in-out,-2.4s,forwards,infinite);
    }
    .rect3{
      .animation(LoadingFirst,1.2s,ease-in-out,-2.3s,forwards,infinite);
    }
    .rect4{
      .animation(LoadingFirst,1.2s,ease-in-out,-2.2s,forwards,infinite);
    }
    .rect5{
      .animation(LoadingFirst,1.2s,ease-in-out,-2.1s,forwards,infinite);
    }
    .spinner{
      width:200px;
      position: absolute;
      left:50%;
      margin-left:-63px;
      top:30%;
      b{
        display: inline-block;
        width:4px;
        height:40px;
        background-color: #3b8cff;
        margin-left:10px;
      }
      p{
        margin-top:20px;
        width:100px;
        text-align: center;
      }
    }

</style>
