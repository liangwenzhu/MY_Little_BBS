<template>
  <div id="app">
    <myHeader></myHeader>
    <myMain></myMain>
    <modelWindow></modelWindow>
  </div>
</template>

<script>

import myHeader from './components/two/myHeader.vue'
import myMain from './components/two/main.vue'
import modelWindow from './components/two/modelWindow.vue'
export default {
  name: 'app',
  components: {
    myMain,
    modelWindow,
    myHeader
  },

}
</script>

<style>
  @import "../lib/css/bootstrap.min.css";
  /*@import '../lib/css/selfSet.less';*/

#app {
}
</style>
