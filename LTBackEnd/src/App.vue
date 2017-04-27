<template>
  <div id="app">
    <myHeader></myHeader>
    <leftAside></leftAside>
    <backendContent></backendContent>
    <modelWindow></modelWindow>
  </div>
</template>

<script>

  import myHeader from './components/two/myHeader.vue'
  import leftAside from './components/two/leftAside.vue'
  import backendContent from './components/two/backendContent.vue'
  import modelWindow from './components/two/modelWindow.vue'
  export default {
    name: 'app',
    components: {
      myHeader,
      leftAside,
      backendContent,
      modelWindow,
    },
  }
</script>

<style>
  @import "../lib/css/bootstrap.min.css";
  /*@import '../lib/css/selfSet.less';*/

  #app {

  }
</style>
