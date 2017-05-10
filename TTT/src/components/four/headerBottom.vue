<template>
    <div class="bbs-information">
        <div class="bbs-informations">
            <h2>{{sectionObj.sectionName}}</h2>
            <p>版主：
                <span v-for="item in sectionManagerObj">{{item.userName}}</span>
                <button href="#" class="btn" v-on:click="managerRequire">申请版主</button>
            </p>
            <p>版面简介：<span>{{sectionObj.sectionIntroduce}}</span></p>
            <!--<div class="rolling-ad">-->
                <!--<p><a href="#" class="hot">躬行网年度干货~</a></p>-->
                <!--<p><a href="#">你想象不到的JS知识这里都有~</a></p>-->
                <!--<p><a href="#" class="hot">支付宝蚂蚁森林的布局</a></p>-->
            <!--</div>-->
            <!--<div class="rolling-ad displayNone">-->
                <!--<p><a href="#">躬行网，你身边的技术百科全书</a></p>-->
                <!--<p><a href="#" class="hot">要技术干货！？来IT知识节</a></p>-->
                <!--<p><a href="#">阿里云和腾讯云，谁会成为中国的AWS？</a></p>-->
            <!--</div>-->
        </div>
        <ul>
            <li v-on:click="showSection('myTiezi')">我的帖子</li>
            <li v-on:click="showSection('joinTiezi')">我参与的帖子</li>
            <li v-on:click="showSection('scoreTiezi')">我得分的帖子</li>
        </ul>
        <i class="close" v-show="ifOpen"><span class="glyphicon glyphicon-remove" v-on:click="close"></span></i>
        <transition enter-active-class="slide-rightToleft">
            <div class="ownTiezi" v-show="ifOpen">
                <div class="title" v-if="active == 'myTiezi'">
                    <span>我的帖子</span>
                    <span class="count">共有记录<b>{{dataObj.length}}</b>条</span>
                </div>
                <div class="title" v-if="active == 'joinTiezi'">
                    <span>我参与的帖子</span>
                    <span class="count">共有记录<b>{{dataObj.length}}</b>条</span>
                </div>
                <div class="title" v-if="active == 'scoreTiezi'">
                    <span>我得分的帖子</span>
                    <span class="count">共有记录<b>{{dataObj.length}}</b>条</span>
                </div>
               <headerBottomList v-for="item in dataObj" v-bind:item="item"></headerBottomList>
            </div>
        </transition>

    </div>
</template>
<script>
import headerBottomList from '../five/headerBottomList.vue'

export default {
    data:function(){
        return{
            active:'none',
            ifOpen:false,
            dataObj:'',
            sectionObj:'',
            sectionManagerObj:null,
        }
    },
    components:{
        headerBottomList
    },
	computed:{
        sectionId(){
            return this.$store.state.sectionId;
        }
    },
	methods:{
        managerRequire(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','modelManagerRequire');
        },
        showSection(val){
            this.active = val;
            this.ifOpen = true;
        },
        close(){
            this.ifOpen = false;
        }
    },
    watch:{
        //检测查看的是那个信息，我的帖子还是我参与的帖子。
        active(){
            var that = this;
            if(this.active == "myTiezi"){
                $.ajax({
                    url:"php/userOwnTiezi.php",
                    dataType:"JSON",
                    success:function(data){
                        that.dataObj = data;
                    },
                    error:function(data){
                        alert(data)
                    }
                });
            }else if(this.active == "joinTiezi"){
                $.ajax({
                    url:"php/userOwnJionTiezi.php",
                    dataType:"JSON",
                    success:function(data){
                        //alert(data);
                        that.dataObj = data;
                    },
                    error:function(data){
                        alert("错误")
                        alert(data)
                    }
                });
            }

        },
        sectionId(){
            var that = this;
            var sectionId = this.sectionId;
            $.ajax({
                url:'php/sectionDetailSelect.php',
                data:{
                    sectionId:sectionId,
                },
                type:"post",
                dataType:'json',
                success(data){
                    that.sectionObj = data;
                    /*查询版主*/
                    $.ajax({
                        url:'php/sectionManagerSelect.php',
                        data:{
                            sectionId:sectionId,
                        },
                        type:'post',
                        dataType:'json',
                        success(data){
                            that.sectionManagerObj = data;
                            that.$store.commit('sectionLoadingState',false);
                        },
                        error(data){
                            alert("版主查询错误");
                        }
                    })
                },
                error(data){
                    alert("版块查询出错");
                    alert(data)
                }
            })
        }
    },
    created(){
        var that = this;
        var sectionId = this.sectionId;
        $.ajax({
            url:'php/sectionDetailSelect.php',
            data:{
                sectionId:sectionId,
            },
            type:"post",
            dataType:'json',
            success(data){
                that.sectionObj = data;
                /*查询版主*/
                $.ajax({
                    url:'php/sectionManagerSelect.php',
                    data:{
                        sectionId:sectionId,
                    },
                    type:'post',
                    dataType:'json',
                    success(data){
                        that.sectionManagerObj = data;
                    },
                    error(data){
                        alert("版主查询错误");
                    }
                })
            },
            error(data){
                alert("版块查询出错");
                alert(data)
            }
        })
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .bbs-information{
        width:100%;
        height:200px;
        background-color: rgba(255, 255, 255, 0.15);
        .border(1px,solid,rgba(255, 255, 255, 0.1));
        position: relative;
        z-index: 0;
        .bbs-informations{
            display: inline-block;
            margin-top: 10px;
            margin-left: 10px;
            h2{
                color:white;
                font-size: 16px;
                margin: 0;
                margin-bottom:10px;
            }
            p{
                color: rgba(255, 255, 255, 0.81);
                font-weight: 800;
                font-size: 14px;
                span{
                    font-weight: 400;
                    color: rgba(255, 255, 255, 0.6);
                    margin-left:15px;
                }
                button{
                    text-align: center;
                    font-size: 12px;
                    color: white;
                    background-color: #e6005c;
                    text-decoration: none;
                    border:none;
                    margin-left:20px;
                }
            }
            .rolling-ad{
                margin-top: 60px;
                p{
                    display: inline-block;
                    margin-left: 50px;
                    &:nth-child(1){
                        margin-left:0;
                    }
                    a{
                        color: rgba(255, 255, 255, 0.74);
                        &:hover{
                            color: rgba(255, 255, 255,1);
                        }
                    }
                }
                .hot{
                    color: rgb(255, 255, 255);

                }
            }
        }
        ul{
            margin-top: 10px;
            display: inline-block;
            float: right;
            li{
                float: left;
                margin-right:20px ;
                font-size: 14px;
                cursor: pointer;
                color: rgba(255, 255, 255, 0.78);
                &:hover{
                    color: rgba(255, 255, 255,1);
                }
            }
        }
        .close{
            font-weight: 200;
            line-height: 25px;
            text-align: center;
            position: absolute;
            right:423px;
            top: 30px;
            color: #ff1d57;
            .pic-circle(30px);
            opacity: 1;
            z-index: 2;
            font-size: 16px;
        }
        .ownTiezi{
            position: absolute;
            width:420px;
            height:420px;
            background-color: white;
            right:0;
            top: 50px;
            overflow: scroll;
            padding:15px;
            .title{
                padding-bottom: 15px;
                .count{
                    float:right;
                    b{
                        color:red;
                    }
                }
                border-bottom:2px solid red;
            }
            .inform-list-children{
                position: relative;
                overflow: hidden;
                //border-top:1px solid rgba(0, 0, 0, 0.22);
                padding-right:10px;
                &:last-child{
                    border-bottom:1px solid rgba(0, 0, 0, 0.22);
                    margin-bottom:10px;
                }
                .ignore{
                    float: right;
                    color: #e23428;
                    cursor: pointer;
                }
                .icon{
                    display: inline-block;
                    width:20px;
                    margin-right:5px;
                    vertical-align: top;
                    color:red;
                    float: left;
                    min-height: 40px;
                    line-height: 40px;
                }
                .inform-content{
                    display: inline-block;
                    float: right;
                    width:335px;
                    min-height: 40px;
                    padding-top: 10px;
                    padding-bottom:10px;
                    margin-top:0;
                    b{
                        margin-left:10px;
                        color:red;
                        span{
                            font-weight: 400;
                            color:black;
                        }
                    }
                    .inform-time{
                        float:right;
                        display: inline-block;
                        vertical-align: middle;
                    }
                }
                .count-time{
                    width:335px;
                    float: right;
                    margin-top:-10px;
                    b{
                        vertical-align: middle;
                        color:red;
                        span{
                            font-weight: 400;
                            color:black;
                        }
                    }
                    .inform-time{
                        float:right;
                        display: inline-block;
                        vertical-align: middle;
                    }
                }
            }
        }
    }
</style>
