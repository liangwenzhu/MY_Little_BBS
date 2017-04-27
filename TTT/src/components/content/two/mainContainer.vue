<template>
    <div class="bbs-mainContainer">
        <firstFloor></firstFloor>
        <otherFloor v-for="item in otherFloorObj" v-bind:item="item"></otherFloor>
    </div>
</template>
<script>
import firstFloor from '../tree/firstFloor.vue'
import otherFloor from '../tree/otherFloor.vue'


export default {
    data:function(){
        return{

        }
    },
    components:{
        firstFloor,
        otherFloor
    },
	computed:{
        otherFloorObj(){
            return this.$store.state.otherFloorObj
        },
        tieziStateChange(){
            return this.$store.state.tieziStateChange;
        }
    },
	methods:{

    },
    watch:{
        /*检测帖子状态是否有变*/
        tieziStateChange: function(){
            var that = this;
            var tieziId = this.$route.params.tieziId;
            this.$store.commit('routerLinkTieziId',tieziId);
            $.ajax({
                url:"../php/gentieSelect.php",
                data:{
                    //tieziMaxNum:tieziMaxNum, 只加载多少个页面。以后可能需要
                    tieziId:tieziId,
                },
                type:"post",
                dataType:"JSON",
                success:function(data){
                    that.$store.commit('otherFloorObj',data);
                },
                error:function(data){
                    alert("出错"+data)
                }
            });

        },

    },
    created(){

        this.$store.commit('tieziStateChange');

    }
}
/*其他楼层帖子查询方法*/

</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../../lib/css/selfSet.less';
    .bbs-mainContainer{
        width:100%;
        .section-floor{
            width:100%;
            margin-bottom:30px;
            -webkit-box-shadow:0 0 5px rgba(0, 0, 0, 0.25);
            -moz-box-shadow:0 0 5px rgba(0, 0, 0, 0.25);
            box-shadow:0 0 5px rgba(0, 0, 0, 0.25);
            &:last-child{
                margin-bottom:20px;
            }
            .title{
                width:100%;
                //height:31px;
                background-color: #1b6d85;
                border-bottom:2px solid rgba(255, 255, 255, 0.82);
                line-height: 31px;
                color: rgb(255, 255, 255);
                font-weight: 800;
                padding-top:5px;
                padding-bottom: 5px;
                .score{
                    float:right;
                    margin-right:20px;
                }
            }
            .content{
                width:100%;
                background-color: rgba(26, 74, 196, 0.15);
                margin-top:-9px;
                .user-information{
                    width:250px;
                    display: inline-block;
                    //background-color: rgba(26, 74, 196, 0.15);
                    margin:0px;
                    .user-id{
                        width:200px;
                        height:34px;
                        margin: 0 auto;
                        color:white;
                        font-weight: 800;
                        //background-color: #ff43e5;
                        line-height: 34px;
                    }
                    .user-touxiang{
                        width:220px;
                        .border(1px,solid, rgba(255, 255, 255, 0.1));
                        margin: 0 auto;
                        text-align: center;
                        img{
                            margin-top:10px;
                            width:200px;
                            height:200px;
                            background-color: rgba(255, 255, 255, 0.95);
                            padding:10px;
                        }
                        .level{
                            margin-top:25px;
                            padding-bottom:25px;
                            color:white;
                        }
                    }
                }
                .question-describe{
                    width:945px;
                    margin:0px;
                    display: inline-block;
                    vertical-align: top;
                    .tiezi-Time{
                        .tiezi-time{
                            height:34px;
                            border-bottom:1px solid rgba(255, 255, 255, 0.61);
                            line-height: 34px;
                            color:white;
                            i{
                                text-align: center;
                                font-size: 15px;
                                width:21px;
                                height:21px;
                                line-height:23px;
                                background-color: #e6005c;
                                margin-right:20px;
                            }
                            .floor{
                                float: right;
                                margin-right:15px;
                                b{
                                    margin-right:30px;
                                }
                                input{
                                    margin-left:10px;
                                    display: inline;
                                    width:60px;
                                    height:21px;
                                    font-size: 16px;
                                }
                            }
                        }
                    }
                    .question-main{
                        position: relative;
                        min-height:320px;
                        h2{
                            font-size: 20px;
                            border-bottom: 1px dashed rgba(255, 255, 255, 0.48);
                            padding-bottom:20px;
                            color:white;
                        }
                        article{
                            width:920px;
                            min-height: 100px;
                            margin: 0 auto;
                            //background-color: #beffc4;
                            line-height: 30px;
                            letter-spacing: 1px;
                            color: rgb(255, 255, 255);
                            padding-bottom:120px;
                            blockquote{
                                font-size:14px;
                                color: rgba(217, 217, 217, 0.98);
                                padding-top:5px;
                                padding-bottom:5px;
                                background-color: rgba(255, 255, 255, 0.15);
                            }
                            .article-content{
                                height:auto;
                            }
                        }
                        .section-footer{
                            position: absolute;
                            bottom:0;
                            .sign{
                                position: relative;
                                width:50%;
                                //border-top:1px solid rgba(255, 255, 255, 0.51);
                                padding-top: 15px;
                                .little-sign{
                                    width:100%;
                                    position: absolute;
                                    display: block;
                                    top:-20px;
                                    span{
                                        color:white;
                                    }
                                    b{
                                        display: inline-block;
                                        width:100px;
                                        height:1px;
                                        background-color: rgba(255, 255, 255, 0.7);
                                    }
                                    i{
                                        vertical-align: middle;
                                        margin-left:10px;
                                        margin-right:10px;
                                        color:white;
                                    }
                                }
                                p{
                                    color:white;
                                    font-size: 14px;
                                }
                            }
                            .operation{
                                width:945px;
                                border-top:1px solid rgba(255, 255, 255, 0.51) ;
                                padding-top: 15px;
                                .messag{
                                    //width:70px;
                                    background-color: #39b3d7;
                                    color:white;
                                }
                                .delete{

                                }
                                .right-btn{
                                    float: right;
                                    //width:70px;
                                    .transition(0.2s);
                                    background-color: inherit;
                                    color:white;
                                    margin-right:20px;
                                    border: 1px solid rgba(255, 255, 255, 0.62);
                                    &:hover{
                                        .transition(0.2s);
                                        background-color: #d2322d;
                                    }
                                    option{
                                        color:black;
                                        cursor: pointer;
                                        background-color: white;
                                        padding-top:50px;
                                        padding-bottom:10px;
                                        &:hover{
                                            .transition(0.2s);
                                            background-color: white;
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
            }
        }
        .other-floor{
            .content{
                .question-describe{
                    .tiezi-Time{
                        .tiezi-time{
                            .green{
                                background-color: #1ccdaa;
                            }
                            .host{
                                background-color: red;
                            }
                        }
                    }
                    .question-main{
                        article{
                            margin-top:20px;
                        }
                        .operation{
                            i{
                                display: inline-block;
                                margin-left:20px;
                                background-color: #563d7c;
                                color:white;
                                width: 25px;
                                height:25px;
                                line-height: 25px;
                                text-align: center;
                                vertical-align: middle;
                                .pic-circle(4px);
                                cursor: pointer;
                                .transition(0.2s);
                            }
                            b{
                                color: rgba(241, 241, 241, 0.89);
                            }
                            .up{
                                &:hover{
                                    background-color: #1ccdaa;
                                    .transition(0.2s);
                                }
                            }
                            .down{
                                &:hover{
                                    background-color: #ff4f48;
                                    .transition(0.2s);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>
