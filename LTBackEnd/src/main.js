// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import jq from '../lib/js/jquery.min';
//import jqs from '../lib/js/jqueryForm';
import Vue from 'vue'
import Vuex from 'vuex'
import App from './App'
import store from './store/store.js';
import router from './router/router.js';
//import jqForm from '../lib/js/jqueryForm.js';
Vue.config.productionTip = false;
Vue.use(Vuex);
Vue.use(router)
//Vue.use(Vuex);
//Vue.use(jqForm)


//import base from '../lib/js/base';
new Vue({
  el: '#app',
  store,
  router,
  template: '<App/>',
  components: { App },
});
