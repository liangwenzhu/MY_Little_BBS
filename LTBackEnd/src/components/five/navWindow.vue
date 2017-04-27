<template>
    <div class="nav-window">
      <!--<p>爱我{{navActive}}</p>-->
      <search v-show="navActive=='search'"></search>
      <inform v-show="navActive=='inform'"></inform>
      <userInformation v-show="navActive=='userInformation'"></userInformation>
    </div>
</template>
<script>
import inform from '../six/inform'
import userInformation from '../six/userInformation.vue'
import search from '../six/search.vue'
export default {
    data:function(){
        return{

        }
    },
    components:{
        inform,
        userInformation,
        search
    },
    computed:{
        navActive(){
            return this.$store.state.navActive
        },
//        navActive(){
//            return this.$score.state.cont
//        }
    },
    methods:{
//        change:function(){
//            this.$store.commit('increment',10)
//        }
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';

</style>
