<template>
    <div class="bbs-pagination">
        <ul>
            <li v-bind:class="{active : pageClickNum == 1}" v-on:click="firstPageClick" >首页</li>
            <li v-bind:class="{active : pageClickNum == 1}" v-on:click="firstPageClick">1</li>
            <li v-show="pageClickNum >= pageNumCon">...</li>
            <li is="bbsPaginationLi" v-for="item in pages" v-bind:item="item"></li>
            <li v-show="pageCount > pageMaxNum">...</li>
            <li v-on:click="lastPage">上一页</li>
            <li v-on:click="nextPage">下一页</li>
            <li class="total_tieziNum">总数：<span>{{tieziCount}}</span></li>
            <li class="total_tieziPage">共：<span>{{pageCount}}</span> 页</li>
        </ul>
        <div class="button-group">
            <button class="btn btn-success post" v-on:click="fatie">发帖</button>
            <button class="btn btn-success postReload" v-on:click="firstPageClick">刷新</button>
        </div>
    </div>
</template>
<script>

import bbsPaginationLi from '../five/bbs-pagination-li.vue'
//import jqForm from '../../../lib/js/jqueryForm.js';
export default {
    data:function(){
        return{
            pageCount:'',
//            tieziCount:'',
            pages: []
        }
    },
    components:{
        bbsPaginationLi,
    },
	computed:{
        sectionId(){
          return this.$store.state.sectionId;
        },
        tieziCount(){
          return   this.$store.state.tieziCount;
        },
        pageMaxNum(){
            return this.$store.state.pageMaxNum;
        },
        pageClickNum(){
            return this.$store.state.pageClickNum;
        },
        pageIgnoreNum:function(){
            return this.$store.state.pageIgnoreNum;
        },
        /*常量，这个是不变的*/
        pageNumCon(){
            return this.$store.state.pageNumCon;
        },
        tieziStateChange(){
            return this.$store.state.tieziStateChange;
        }
    },
	methods:{
        fatie:function(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','fatie');
        },
        firstPageClick(){
            this.$store.commit({
                type:'pageReflash',
                pageNum:1,
            });
        },
        lastPage(){
            if(this.pageClickNum == 1){
                alert("已经是第一页了")
            }else{
                this.$store.commit({
                    type:'lastPage',
                });
                if((this.pageClickNum + 1) % this.pageNumCon==0){
                    /*触发规定页码事件*/
                    this.$store.commit({
                        type:'tieziFenyeLast',
                        pageClickNum:this.pageClickNum,
                    });
                }
            }
        },
        nextPage(){
            if(this.pageClickNum >= this.pageCount){
                alert("已经最后一页了");
            }else{
                this.$store.commit({
                    type:'nextPage',
                });
                if(this.pageClickNum % this.pageNumCon==0){

                    /*点中规定页码事件*/
                    this.$store.commit({
                        type:'tieziFenye',
                        pageClickNum:this.pageClickNum,
                    });
                }
            }
        },
    },
    watch:{
        /*检测帖子状态，改变页码*/
        tieziStateChange:function(){
            var that = this;
            that.pages.length = 0;
            var tieziMaxNum = that.$store.state.tieziMaxNum;
            var pageNum = that.$store.state.pageClickNum;
            /*分页对象构建，同时初始帖子总数和页码总数*/
            $.ajax({
                url:"php/tieziSelectCount.php",
                data:{
                    tieziMaxNum:tieziMaxNum,
                },
                type:"post",
                dataType:"text",
                success:function(data){
                    var pageNum = Math.ceil(data/tieziMaxNum);
                    that.pageCount = pageNum;
                    //that.tieziCount = data;
                    that.$store.commit('tieziCount',data);
                    for(var i=2;i < that.pageCount+1;i++){
                        that.pages.push({page:i})
                    }
                }
            });
        },

        /***根据页码查询帖子列表，检测当前点击页码数***/
        pageClickNum:function(){
            var that = this;
            var tieziMaxNum = that.$store.state.tieziMaxNum;
            var pageNum = that.$store.state.pageClickNum;
            /*分页数据构建*/
            $.ajax({
                url:"php/tieziFenyeSelect.php",
                data:{
                    pageNum:pageNum,
                    tieziMaxNum:tieziMaxNum,
                },
                type:"post",
                dataType:"JSON",
                success:function(data){
                    that.$store.commit('tieziObj',data);
                },
                error:function(){
                    alert("分页失败");
                }
            });
        },
        /*根据当前板块进行查询*/
        sectionId(){
            //初始化页码
            var that = this;
            this.pageCount = '',
            that.pages.length = 0;
            var tieziMaxNum = that.$store.state.tieziMaxNum;
            this.$store.commit({
                type:'pageReflash',
                pageNum:1,
            });
            /*分页对象构建，同时初始帖子总数和页码总数*/
            $.ajax({
                url:"php/tieziSelectCount.php",
                data:{
                    tieziMaxNum:tieziMaxNum,
                },
                type:"post",
                dataType:"text",
                success:function(data){
                    var pageNum = Math.ceil(data/tieziMaxNum);
                    that.pageCount = pageNum;
                    //that.tieziCount = data;
                    that.$store.commit('tieziCount',data);
                    for(var i=2;i < that.pageCount+1;i++){
                        that.pages.push({page:i})
                    }
                }
            });
            var pageNum = that.$store.state.pageClickNum;
            /*分页数据构建*/
            $.ajax({
                url:"php/tieziFenyeSelect.php",
                data:{
                    pageNum:pageNum,
                    tieziMaxNum:tieziMaxNum,
                },
                type:"post",
                dataType:"JSON",
                success:function(data){
                    that.$store.commit('tieziObj',data);
                },
                error:function(){
                    alert("分页查询失败");
                }
            });
        }
    },

    created:function(){
        this.$store.commit('tieziStateChange');
        /*分页组件被复用了，因此created在这里会执行两次。*/
        this.$store.commit('pageinit');
    },
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .bbs-pagination{
        font-size: 12px;
        overflow: hidden;
        margin-top:15px;
        //margin-bottom:10px;
        //height:20px;
        ul{
            padding: 0;
            li{
                cursor: pointer;
                padding-left: 12px;
                padding-right: 12px;
                min-width:25px;
                height:25px;
                line-height: 25px;
                // .border(1px,solid, #dfdfdf);
                background-color: #536781;
                margin-left: 10px;
                float:left;
                text-align: center;
                color:white;
                .transition(0.4s);
                &:nth-child(1){
                    margin: 0px;
                }
                &:nth-last-child(1){
                    cursor: default;
                    background-color: rgba(255, 255, 255, 0);
                }
                &:nth-last-child(2){
                    cursor: default;
                    background-color: rgba(255, 255, 255, 0);
                }
                &:hover{
                    background-color: #394759;
                    .transition(0.4s);
                }
            }
            .active{
                color:white;
                font-weight: 800;
                background-color: #3276b1;
                &:hover{
                    background-color: #285e8e;
                }
            }
        }
        .button-group{
            float: right;
            margin-top:-10px;
            .post{
                width:65px;
                color: white;
                background-color: #3276b1;
                border: none;
                .transition(0.4s);
                &:active{
                    background-color: #285e8e;
                    outline: none;
                }
                &:hover{
                    background-color: #285e8e;
                    .transition(0.4s);
                }
            }
            .postReload{
                width:65px;
                //height:25px;
                color:white;
                background-color: #14937a;
                border: none;
                .transition(0.4s);
                &:hover{
                    background-color: #398439;
                    .transition(0.4s);
                }
                &:active{
                    background-color: #398439;
                    outline: none;
                }
            }
        }
    }
</style>
