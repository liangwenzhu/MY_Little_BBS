import Vue from 'vue';
import Vuex from 'vuex';
import Router from 'vue-router'

//import Hello from '../components/Hello.vue'
//import container from '../components/three/container.vue'
//import abcd from '../components/content/content.vue'
import welcome from '../components/three/welcome.vue'
import userManage from '../components/three/userManage.vue'
import tieziManage from '../components/three/tieziManage.vue'
//板块管理
import sectionManage from '../components/three/sectionManage.vue'
import managerApply from '../components/three/managerApply.vue'
import expertApply from '../components/three/expertApply.vue'
import expertQuestionApply from '../components/three/expertQuestionApply.vue'
import jubaoManage from '../components/three/jubaoManage.vue'
import gentieJubaoRouter from '../components/four/gentieJubaoRouter.vue'
import tieziJubaoRouter from '../components/four/tieziJubaoRouter.vue'
Vue.use(Vuex)
Vue.use(Router)

/**/
export default new Router({
  routes: [
  {
      path: '/',
      name: 'welcome',
      component: welcome
    },
    {
      path: '/userManage',
      name: 'userManage',
      component: userManage
    },
	{
      path: '/tieziManage',
      name: 'tieziManage',
      component: tieziManage
    },
	{
      path: '/sectionManage',
      name: 'sectionManage',
      component: sectionManage
    },
	{
      path: '/managerApply',
      name: 'managerApply',
      component: managerApply
    },
	{
      path: '/expertApply',
      name: 'expertApply',
      component: expertApply
    },
	{
      path: '/expertQuestionApply',
      name: 'expertQuestionApply',
      component: expertQuestionApply
    },
	{
      path: '/jubaoManage',
	  //name: 'jubaoManage',
      component: jubaoManage,
	  children: [
        {
          // 当 /user/:id/profile 匹配成功，
          // UserProfile 会被渲染在 User 的 <router-view> 中
          path: '',
          component: gentieJubaoRouter,
        },
		/**/
		{
		  path: '/jubaoManage/gentie',
          component: gentieJubaoRouter,
		},
		{
		  path: '/jubaoManage/tiezi',
          component: tieziJubaoRouter,
		},
		
		]
    },
	/*
	{
		//path: '/content/:tieziId',
       //name: 'content',
      //component: content
	}
	*/
  ]
})
