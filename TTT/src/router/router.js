import Vue from 'vue';
import Vuex from 'vuex';
import Router from 'vue-router'

import Hello from '../components/Hello.vue'
import container from '../components/three/container.vue'
import bbsMainContent from 'components/two/bbsMainContent.vue'
//import abcd from '../components/content/content.vue'
import content from '../components/content/content.vue'
import expert from 'components/expert/expert.vue'
import download from '../components/download/download.vue'

Vue.use(Vuex)
Vue.use(Router)


export default new Router({
  routes: [
    {
      path: '/',
      component: container,
	  children: [
		{
          // 当 /user/:id/profile 匹配成功，
          // UserProfile 会被渲染在 User 的 <router-view> 中
          path: '',
          component: bbsMainContent,
        },
		{
		  path: '/content/:tieziId',
		  //name: 'content',
		  component: content
		},
	  ]
    },
	
	{
	  path: '/expert/',
      //name: 'expert',
      component: expert,
	  /*
	  children: [
		{
		  path: '/content/:tieziId',
          component: content
		},
		]
		*/
	},
	{
	  path: '/download/',
      //name: 'expert',
      component: download,
	  /*
	  children: [
		{
		  path: '/content/:tieziId',
          component: content
		},
		]
		*/
	}
  ]
})