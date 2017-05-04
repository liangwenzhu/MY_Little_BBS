<template>
    <div class="modal-window" v-show="modelShow">
        <div class="modal-windows">
            <!--注册-->
            <register v-if="modelActive == 'register'"></register>
            <!--注册成功-->
            <registerSuccess class="vote-success modal-vote" v-if="modelActive == 'registerSuccess'"></registerSuccess>
            <!--登录-->
            <login v-if="modelActive == 'login'"></login>
            <!--发帖-->
            <fatie v-if="modelActive == 'fatie'"></fatie>
            <!--快速回帖-->
            <huitie v-if="modelActive == 'huitie'"></huitie>
            <!--其他楼层回帖-->
            <huitieForOtherFloor v-if="modelActive == 'floorNum'"></huitieForOtherFloor>
          <!--版主申请者个人信息-->
          <modelHostDetail v-if="modelActive == 'modelHostDetail'"></modelHostDetail>
          <!--举报管理帖子详情-->
          <modelTieziDetail v-if="modelActive == 'modelTieziDetail'"></modelTieziDetail>
          <!--举报管理跟帖详情-->
          <modelGentieDetail v-if="modelActive == 'modelGentieDetail'"></modelGentieDetail>
          <!--举报管理用户详情-->
          <modelUserDetail v-if="modelActive == 'modelUserDetail'"></modelUserDetail>
          <!--专家详情-->
          <modelExpertDetail v-if="modelActive == 'modelExpertDetail'"></modelExpertDetail>
          <!--专家问答申请详情-->
          <modelExpertQuestionRequireDetail v-if="modelActive == 'modelExpertQuestionRequireDetail'"></modelExpertQuestionRequireDetail>
          <!--专家问答申请编辑详情-->
          <modelExpertQuestionRequireEditor v-if="modelActive == 'modelExpertQuestionRequireEditor'"></modelExpertQuestionRequireEditor>
        </div>
    </div>
</template>

<script>
import fatie from '../three/modelFatie.vue';
import huitie from '../three/modelHuitie.vue';
import huitieForOtherFloor from '../three/modelHuitieForOtherFloor.vue';
import login from '../three/modelLogin.vue';
import register from '../three/modelRegister.vue';
import registerSuccess from '../three/modelRegisterSuccess.vue';
import modelHostDetail from '../three/modelHostDetail.vue';
import modelTieziDetail from '../three/modelTieziDetail.vue';
import modelGentieDetail from '../three/modelGentieDetail.vue';
import modelUserDetail from '../three/modelUserDetail.vue';
import modelExpertDetail from '../three/modelExpertDetail.vue';
import modelExpertQuestionRequireDetail from '../three/modelExpertQuestionRequireDetail.vue';
import modelExpertQuestionRequireEditor from '../three/modelExpertQuestionRequireEditor.vue';
import '../../../lib/imgs/modal/code-input.png';
import '../../../lib/imgs/modal/key.png';
import '../../../lib/imgs/modal/phone.png';
import '../../../lib/imgs/modal/wrong.png'
import '../../../lib/imgs/modal/vote-success.png'
export default {
    data:function(){
        return{

        }
    },
    components:{
      register,
      registerSuccess,
      fatie,
      huitie,
      huitieForOtherFloor,
      login,
      modelHostDetail,
      modelTieziDetail,
      modelGentieDetail,
      modelUserDetail,
      modelExpertDetail,
      modelExpertQuestionRequireDetail,
      modelExpertQuestionRequireEditor
    },
	computed:{
        modelShow(){
            return this.$store.state.modelShow
        },
        modelActive(){
            return this.$store.state.modelActive
        },
    },
	methods:{
        login:function(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','login');
        },
        register:function(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','register');
        },
        fatie:function(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','fatie');
        },
        close:function() {
            this.$store.commit('modelShow',false);
            this.$store.commit('modelActive','none');
        }
    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../lib/css/selfSet.less';
    .modal-window{
        position: fixed;
        width: 100%;
        height:100%;
        margin: 0 auto;
        background-color: rgba(0, 0, 0, 0.31);
        top:0;
        .transition(0.2s);
        z-index: 999;
        //display: none;
        .modal-windows{
            position: relative;
            width:100%;
            height:100%;
            .modal-vote{
                //opacity: 0;
                position: absolute;
                left:50%;
                top:50%;
                margin-top:-130px;
                margin-left:-180px;
                background-color: white;
                .container{
                    position: relative;
                    width:360px;
                    height:270px;
                    -webkit-box-shadow:0 0 20px rgba(0, 0, 0, 0.20);
                    -moz-box-shadow:0 0 20px rgba(0, 0, 0, 0.20);
                    box-shadow:0 0 20px rgba(0, 0, 0, 0.20);
                    .wrong-tips{
                        position: absolute;
                        opacity: 0;
                        bottom:80px;
                        color:red;
                        font-size:14px;
                    }
                    .register-wrong-tips{
                        position: absolute;
                        opacity: 0;
                        width:100px;
                        height:50px;
                        bottom:15px;
                        color:red;
                        font-size:14px;
                    }
                    .vote-topleft{
                        float: left;
                        margin-top:10px;
                        font-size: 16px;
                        img{
                            width:15px;
                            margin-right:10px;
                        }
                    }
                    .close{
                        width:20px;
                        margin-top:10px;
                        float: right;
                        opacity: 1;
                    }
                    hr{
                        margin:40px 0;
                    }
                    p{
                        font-size: 14px;
                        text-align: center;
                        .denglu{
                            color:red;
                            cursor: pointer;
                        }
                    }
                    .form-group{
                        //position: relative;
                        label{
                            //position: absolute;
                            font-weight: normal;
                            //opacity: 0.5;
                        }
                        input{
                            width:200px;
                            display: inline-block;
                            padding-left: 30px;
                            background: url(../../../lib/imgs/modal/code-input.png) no-repeat left 5px bottom 7px;
                            &::-webkit-input-placeholder{
                                color:#9CAEB8 ;
                                padding-left: 10px;
                                font-size: 12px;
                            }
                        }
                        .key{
                            background: url(../../../lib/imgs/modal/key.png) no-repeat left 5px bottom 7px;
                        }
                        .phone-num{
                            background: url(../../../lib/imgs/modal/phone.png) no-repeat left 5px bottom 7px;
                        }
                        .codes{
                            width:125px;
                            color:#328ED5;
                            .background-color-change-top(#FEFFFF,#F3FBFF);
                            .border(1px,solid,#C0E3FA);
                            margin-top:-2px;
                            &:active{
                                outline: none;
                            }
                        }
                    }
                    .vote-complete{
                        width:120px;
                        margin: 25px auto;
                        display: block;
                        color:white;
                        background-color: #45B0FF ;
                        border: none;

                    }
                    .color-red{
                        color:red;
                    }
                }
                form{
                    margin-top:-30px;
                    .form-group{
                        margin-top:0px;
                        margin-bottom:6px;
                        .phone-num{
                            width:100%;
                        }
                        .key{
                            width:100%;
                        }
                    }
                    input{
                        margin-top:10px;
                    }
                    .complete{
                        width:120px;
                        margin: 15px auto;
                        display: block;
                        color:white;
                        background-color: #45B0FF ;
                        border: none;
                    }
                    .zhuce{
                        width:120px;
                        margin: 15px auto;
                        display: block;
                        border: none;
                        &:hover{
                            background: none;
                        }
                    }
                    p{
                        cursor: pointer;
                    }
                }
            }

            .activity-flow{
                //opacity: 0;
                position: absolute;
                left:50%;
                margin-left:-400px;
                top:50%;
                margin-top:-190px;
                h2{
                    margin-top:80px;
                    font-size: 26px;
                    color:#4A4A4A;
                    text-align: center;
                }
                .close{
                    width:20px;
                    float: right;
                    opacity: 1;
                    margin-top:20px;
                    margin-right:5px;
                }
                .container{
                    width:800px;
                    height:400px;
                    background-color: white;
                    -webkit-box-shadow:0 0 20px rgba(0, 0, 0, 0.20);
                    -moz-box-shadow:0 0 20px rgba(0, 0, 0, 0.20);
                    box-shadow:0 0 20px rgba(0, 0, 0, 0.20);
                    ul{
                        background-color: #2a6496;
                        margin-top:50px;
                        margin-left:-12.5px;
                        li{
                            text-align: center;
                            width:120px;
                            height:48px;
                            line-height:48px;
                            background-color: #37A897 ;
                            list-style-type: none;
                            float:left;
                            margin-left:25px;
                            margin-right:25px;
                            margin-bottom:30px;
                            font-size: 16px;
                            .pic-circle(6px);
                            color:white;
                            &:nth-child(12){
                                width:300px;
                                font-size: 14px;
                            }
                        }
                        .next{
                            text-align: center;
                            width:60px;
                            height:48px;
                            background-color: white;
                            margin-left:-25px;
                            margin-right:-25px;
                            margin-bottom:20px;

                        }
                    }
                }
            }
            .activity-information{
                //opacity: 0;
                width:450px;
                height:600px;
                text-align: center;
                position: absolute;
                left:50%;
                margin-left:-225px;
                top:50%;
                margin-top:-300px;
                .container{
                    width:450px;
                    position: relative;
                    .close{
                        width:20px;
                        position: absolute;
                        right:0px;
                        margin-right:30px;
                        margin-top:10px;
                        opacity: 1;
                    }
                    .activity-information-img{
                        width:100%;
                    }
                }
            }
            .fatie{
                width:960px;
                height:600px;
                //text-align: center;
                position: absolute;
                left:50%;
                margin-left:-480px;
                top:50%;
                margin-top:-300px;
                background: #ffffff;
                .container{
                    width:930px;
                    height:550px;
                    margin: 0 auto;
                    //background: palevioletred;
                    .top-title{
                        .vote-topleft{
                            float: left;
                            margin-top:10px;
                            font-size: 16px;
                            font-weight: 800;
                            img{
                                width:15px;
                                margin-right:10px;
                            }
                        }
                        .close{
                            width:20px;
                            position: absolute;
                            right:0px;
                            margin-right:30px;
                            margin-top:10px;
                            opacity: 1;
                        }
                    }
                    table{
                        margin-top:60px;
                        tbody{
                            tr{
                                .left-title{
                                    text-align: right;
                                    //border-right:1px solid #9acfea;
                                    vertical-align: middle;
                                    font-size: 14px;
                                }
                                .right-input{
                                    text-align: left;
                                    //background-color: rgba(255, 101, 87, 0.21);
                                    span{
                                        color: rgba(255, 102, 88, 0.69);
                                        margin-left: 20px;
                                        font-size: 14px;
                                        vertical-align: bottom;
                                        b{
                                            color: #3385ff;
                                            vertical-align: bottom;
                                        }
                                        i{
                                            display: none;
                                            color: #3385ff;
                                        }
                                    }
                                    .form-control{
                                        display:inline ;
                                    }
                                    input{
                                        width:400px;
                                    }
                                    .textarea{
                                        width:600px;
                                        height:250px;
                                    }
                                    select{
                                        width:400px;
                                    }
                                    .score{
                                        margin-left:10px;
                                        margin-right:10px;
                                        width:60px;
                                    }
                                    .postTiezi{
                                        background-color: #3385ff;
                                        color:white;
                                    }
                                    .glyphicon-question-sign{
                                        color:red;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>
