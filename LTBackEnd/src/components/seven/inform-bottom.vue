<template>
    <div class="inform-list" >
        <div class="inform-list-children" v-for="item in informContain">
            <i class="glyphicon glyphicon-star icon"></i><p class="inform-content"><a href="#">{{item.tieziTitle}}</a><span class="ignore" v-on:click="ignoreSingleInform">忽略</span></p>
            <p class="count-time"><b>{{item.tieziAnswer}}<span>条回复</span></b><span class="inform-time">{{item.tieziLastAnswerDate}}</span></p>
        </div>
    </div>
</template>
<script>
    export default{
        data:function(){
            return{

            }
        },
        computed:{
            informContain:function(){
                return this.$store.state.userInformContain;
            }
        },
        methods:{
            ignoreSingleInform(){
//                var a =
            }
        }
    }
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    .inform-list{
        .inform-list-children{
            position: relative;
            overflow: hidden;
            border-top:1px solid rgba(0, 0, 0, 0.22);
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
                width:355px;
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
                width:355px;
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

</style>
