<template>
    <table class="table bbs-main ">
        <thead is="bbsThead"></thead>
        <tbody class="tiezibody">
            <tr is="tbodyTr" v-for="item in tieziContainObj" :key="item.tieziId" v-bind:item="item"></tr>
        </tbody>
        <thead is="bbsThead"></thead>
    </table>
</template>
<script>
    import bbsThead from '../five/bbs-Table-thead.vue'
    import tbodyTr from '../five/bbs-Table-Tr.vue'

export default {
    data:function(){
        return{

        }
    },
    components:{
        bbsThead,
        tbodyTr
    },
	computed:{
        tieziContain(){
            return this.$store.state.tieziContain
        },
        tieziContainObj(){
            return this.$store.state.tieziContainObj
        }
    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css">
    @import '../../../lib/css/selfSet.less';
    .bbs-main{
        background-color: rgba(0, 0, 0, 0.3);
        font-size: 13px;
        color:white;
        margin-top:10px;
        tr{
            .transition(0.1s);
            &:hover{
                background-color: rgba(255, 255, 255, 0.1);
                .transition(0.1s);
            }
            td{
                vertical-align: middle;
                text-align: center;
                &:nth-child(1){
                    min-width:450px;
                    text-align: left;
                }
                &:nth-child(2){
                    width:49px;
                    height:51px;
                }
                &:nth-child(3){
                    width:160px;
                    height:51px;
                }
                &:nth-child(4){
                    width:65px;
                    height:51px;
                }
                &:nth-child(5){
                    width:160px;
                    height:51px;
                }
                &:nth-child(6){
                    width:51px;
                    height:51px;
                }
                border-color:rgba(255, 255, 255, 0.1);
                p{
                    margin-top:10px;
                    color: rgba(255, 255, 255, 0.8);
                    a{
                        color: rgb(255, 255, 255);
                    }
                }
                .overhead{
                    color:#e6005c;
                }
                .recommend{
                    color:deeppink;
                }
                .question-data{
                    margin: 0;
                    font-size: 12px;
                }
                .username{
                    margin: 0;
                    font-size: 12px;
                }
                .control{
                    position: relative;
                    cursor: pointer;
                    color:white;
                    span{
                        line-height:38px;
                        padding-top:20px;
                        padding-bottom:20px;
                    }
                    ul{
                        width:150px;
                        height:55px;
                        background-color: rgba(0, 208, 217, 0.67);
                        position: absolute;
                        padding: 0;
                        margin-left:-145px;
                        margin-top:-47.5px;
                        text-align: center;
                        -webkit-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
                        -moz-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
                        box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
                        li{
                            width:60px;
                            height:55px;
                            line-height: 55px;
                            float:left;
                            margin-left:00px;
                            color:white;
                            &:nth-child(1){
                                margin-left:15px;
                            }
                            &:hover{
                            }
                            button{
                                margin-bottom:5px;
                            }
                        }
                    }
                }
            }
        }
    }
</style>
