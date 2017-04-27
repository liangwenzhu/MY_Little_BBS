import Vue from 'vue';
import Vuex from 'vuex';
import Router from 'vue-router'

import Hello from '../components/Hello.vue'
import container from '../components/three/container.vue'
//import abcd from '../components/content/content.vue'
import content from '../components/content/content.vue'
import expert from '../components/expert/expert.vue'
Vue.use(Vuex)
Vue.use(Router)


export default new Router({
  routes: [
    {
      path: '/',
      name: 'container',
      component: container
    },
	{
	  path: '/content/:tieziId',
      name: 'content',
      component: content
	},
	{
	  path: '/expert',
      name: 'expert',
      component: expert
	}
  ]
})