<template>
    <!--回帖-->
    <div class="huitie">
        <div class="message-container container">
            <div class="top-title">
                <span class="vote-topleft">板块添加</span>
                <img class="close" src="../../../lib/imgs/modal/wrong.png" v-on:click="close">
            </div>
            <p class="tips">请填写以下的必要信息，进行板块添加。</p>
            <div class="form-group">
                <label class="col-sm-10">板块名：</label>
                <div class="col-sm-12">
                    <input class="form-control" type="email" placeholder="请输入板块名" v-model="title">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-10">板块简介：</label>
                <div class="col-sm-12">
                    <textarea class="form-control huitieContainer" v-model="introduce" placeholder="请输入板块简介"></textarea>
                </div>
                <span class="fontCountControl">你还可用输入<b>{{contentMaxLength}}</b>个字符</span>
            </div>
            <button class=" btn btn-primary btn-lg btn-block" v-on:click="sectionAdd">确认</button>
        </div>
    </div>
</template>
<script>
    //import aaa from '../seven/inform-bottom.vue'

    export default {
        data:function(){
            return{
                title:'',
                introduce:'',
            }
        },
        components:{
            //aaa,
        },
        computed:{
            modelShow(){
                return this.$store.state.modelShow
            },
            modelActive(){
                return this.$store.state.modelActive
            },
            contentMaxLength(){
                return this.$store.state.contentMaxLength - this.introduce.length;
            }
        },
        methods:{
          close:function() {
            this.$store.commit({
              type:'modelWindow',
              modelShow:false,
              modelActive:'none',
            })
          },
          sectionAdd(){
            var that = this;
            var title = this.title;
            var introduce = this.introduce;
            $.ajax({
              url:"../php/backend/sectionAdd.php",
              data:{
                title:title,
                introduce:introduce,
              },
              type:"post",
              success:function(data){
                alert(data);
                if(data=="success"){
                  alert("申请成功！");
                }else{
                  alert("添加板块出问题")
                }
              },
              error:function(data){
                alert("添加板块失败");
              }
            });
          },
        },
        // props:['message']
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../lib/css/selfSet.less';
    .huitie{
        width:650px;
        height:400px;
        //text-align: center;
        position: absolute;
        left:50%;
        margin-left:-325px;
        top:50%;
        margin-top:-200px;
        background: #ffffff;
        .container{
            width:650px;
            //height:260px;
            margin: 0 auto;
            //background: palevioletred;

            .top-title{
                overflow: hidden;
                .vote-topleft{
                    float: left;
                    margin-top:10px;
                    font-size: 16px;

                    b{
                        margin-left:5px;
                        margin-right:5px;
                        color:red;
                    }
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
            .tips{
                font-size: 14px;
                margin-top: 30px;
            }
            .huitieContainer{
                margin-top:0px;
                min-height:100px;
            }
            .fontCountControl{
                float:right;
                margin-top:5px;
                margin-bottom:15px;
            }
            label{
                font-size: 14px;
                vertical-align: middle;
            }
            .shortLabel{
                display: inline-block;
            }
            input{
                margin-bottom:15px;
            }
            .btn{

                background-color: #3b8cff;
                border:none;
                color:white;
                &:hover{
                    .transition(0.3s);
                    background-color: #3b8cff;
                }
            }
        }
    }
</style>
