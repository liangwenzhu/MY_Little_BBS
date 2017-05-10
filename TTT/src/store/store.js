import Vue from 'vue';
import Vuex from 'vuex';
//import VueRouter from 'vue-router'
Vue.use(Vuex)
//Vue.use(VueRouter)
const store = new Vuex.Store({
  state: {
	/*顶部右侧导航触摸*/
    navActive: 'none',
	/*模态窗口开启*/
	modelShow: false,
	/*具体的模态窗口*/
	modelActive:'none',
	/*********用户信息*******/
	
	/*个性签名输入框状态*/
	userSignInputState:false,
	/*用户名*/
	userName:'none',
	/*用户头像*/
	userHead:'loading',
	/*用户个签*/
	userSign:'loading',
	/*用户积分*/
	userScore:'loading',
	/*用户通知数*/
	userInformCount:0,
	/*用户通知内容*/
	userInformContain:'',
	
	/*板块Id*/
	sectionId:1,
	sectionLoadingState:true,
	/*********帖子信息********/
	
	/*一页最多帖子数-帖子排版*/
	tieziMaxNum:6,
	/*页码显示数-常量,必须和页码最多显示数相同，这个值用来比较而不改变*/
	pageNumCon:3,
	/*页码最多显示数*/
	pageMaxNum:3,
	/*页码多少页之前的不显示*/
	pageIgnoreNum:0,
	/*当前被点击的页码*/
	pageClickNum:-1,
	/*当前帖子总数*/
	tieziCount:0,
	/*首页帖子数据对象*/
	tieziContainObj:'',
	/*帖子标题最多长度*/
	tieziTitleMaxLength:40,
	/*帖子内容最多长度*/
	tieziContentMaxLength:400,
	/*跟帖内容最多长度*/
	gentieContentMaxLength:200,
	/*输入框最少回复长度*/
	contentMinLength:1,
	
	
	/*******回复帖子信息*********/
	
	/*首页传到帖子内容的帖子id*/
	routerLinkTieziId:'',
	/*帖子第一楼的数据对象*/
	firstFloorObj:'',
	/*跟帖楼层的数组数据对象*/
	otherFloorObj:'',
	/*被操作的跟帖楼层的跟帖Id*/
	floorNum:1,
	/*被操作的跟帖楼层的内容*/
	beiGentieContent:'',
	/*被操作的跟帖楼层数据对象*/
	beiGentieObj:'',
	
	/*********状态变更，用以实时更新数据********/
	
	/*用户状态*/
	userStateChange:false,
	/*帖子状态*/
	tieziStateChange:1,
	/*测试*/
	tests:false,
  },
  
  mutations: {
	navActive(state,active){
		state.navActive = active
	},
	modelShow(state,ifshow){
		state.modelShow = ifshow;
	},
	modelActive(state,active){
		state.modelActive = active;
	},
	/*个性签名输入框状态改变*/
	userSignInputStateChange(state,stating){
		state.userSignInputState = stating;
	},
	/*用户信息*/
	userInformation(state,object){
		state.userName = object.userName;
		state.userSign = object.userSign;
		state.userHead = "http://localhost:8081/luntan/php/upload/" + object.userHead;
		state.userScore = object.userScore;
	},
	sectionId(state,val){
		state.sectionId = val;
	},
	sectionLoadingState(state,val){
		state.sectionLoadingState = val;
	},
	/*帖子初始化*/
	pageinit(state){
		state.pageClickNum = state.pageClickNum + 1
	},
	/*帖子总数*/
	tieziCount(state,val){
		state.tieziCount = val;
	},
	/*帖子下一页分页,同时改变两个值*/
	tieziFenye(state,object){
		state.pageMaxNum = object.pageClickNum + state.pageNumCon;
		state.pageIgnoreNum = state.pageMaxNum - state.pageNumCon;
	},
	/*帖子上一页分页,同时改变两个值*/
	tieziFenyeLast(state,object){
		state.pageMaxNum = state.pageMaxNum - state.pageNumCon;
		state.pageIgnoreNum = state.pageIgnoreNum - state.pageNumCon;
	},
	/*更改当前被点击的页码*/
	pageClickNum(state,object){
		state.pageClickNum = object.pageClickNumForNormal;
	},
	/*刷新页面或者点击首页*/
	pageReflash(state,object){
		state.pageClickNum = object.pageNum;
		state.pageMaxNum = state.pageNumCon;
		state.pageIgnoreNum = state.pageNumCon-3;
	},
	/*上一页*/
	lastPage(state,object){
		state.pageClickNum = state.pageClickNum -1 ;
	},
	/*下一页*/
	nextPage(state,object){
		state.pageClickNum = state.pageClickNum +1 ;
	},
	/*帖子排版内容*/
	tieziObj(state,obj){
		state.tieziContainObj = obj ;
	},
	
	/********以下是回复帖子**************/
	/*第一楼数据对象*/
	firstFloorObj(state,obj){
		state.firstFloorObj = obj ;
	},
	/*非第一楼数组数据对象*/
	otherFloorObj(state,obj){
		state.otherFloorObj = obj ;
	},
	/*首页到帖子详情的帖子Id参数*/
	routerLinkTieziId(state,tieziId){
		state.tieziContainObj = tieziId ;
	},
	/*被操作的跟帖Id*/
	floorNum(state,floorNum){
		state.floorNum = floorNum;
	},
	/*被操作的跟帖楼层的内容*/
	beiGentieContent(state,beiGentieContent){
		state.beiGentieContent = beiGentieContent;
	},
	/*被操作的跟帖楼层数据对象*/
	beiGentieObj(state,obj){
		state.beiGentieObj = obj;
	},
	tests(state,val){
		state.tests = !state.tests;
	},
	/***状态变更***/
	stateChange(state){
		state.userStateChange = !state.userStateChange;
		state.tieziStateChange = !state.tieziStateChange;
	},
	/*仅用户状态变更*/
	userStateChange(state){
		state.userStateChange = !state.userStateChange;
	},
	/*仅帖子状态变更*/
	tieziStateChange(state){
		state.tieziStateChange = state.tieziStateChange+1;
	}
  }
})
export default store;