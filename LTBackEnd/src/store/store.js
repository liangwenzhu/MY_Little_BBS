import Vue from 'vue';
import Vuex from 'vuex';
//import VueRouter from 'vue-router'
Vue.use(Vuex)
//Vue.use(VueRouter)
const store = new Vuex.Store({
  state: {

	/*模态窗口开启*/
	modelShow: false,
	/*具体的模态窗口*/
	modelActive:'none',
	/*用户数据对象*/	
	userObj:'',
	/*用户当前头像*/
	userHead:'none',
	/*帖子数据对象*/
	tieziObj:'',
	/*详细和简略切换*/
	ifShowDetail:true,
	/*版主申请详细数据*/
	managerData:'',
	/*查看的是帖子详情还是跟帖详情*/
	tieziOrGentie:'',
	/*帖子详情数据*/
	tieziData:'',
	/*跟帖详情数据*/
	gentieData:'',
	/*用户详情数据*/
	userData:'',
	/*专家问答申请数据对象*/
	expertQuestionRequireObj:'',
  },
  
  mutations: {
	  
	modelWindow(state,obj){
		state.modelShow = obj.modelShow;
		state.modelActive = obj.modelActive;
	},
	modelActive(state,active){
		state.modelActive = active;
	},
	userObj(state,objData){
		state.userObj = objData;
	},
	/*用户管理当前头像数据获得*/
	userHead(state,val){
		state.userHead = val;
	},
	tieziObj(state,objData){
		state.tieziObj = objData;
	},
	/*详细和简略切换*/
	ifShowDetail(state,val){
		state.ifShowDetail = val;
	},
	/*版主申请详细数据*/
	managerData(state,item){
		state.managerData = item;
	},
	/*帖子详情数据*/
	tieziData(state,dataObj){
		state.tieziData = dataObj;
	},
	/*跟帖详情数据*/
	gentieData(state,dataObj){
		state.gentieData = dataObj;
	},
	/*用户详情数据*/
	userData(state,dataObj){
		state.userData = dataObj;
	},
	/*专家问答请求数据对象*/
	expertQuestionRequireObj(state,dataObj){
		state.expertQuestionRequireObj = dataObj;
	}
  }
})
export default store;