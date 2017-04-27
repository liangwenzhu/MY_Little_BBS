<template>
    <div class="postings-search" v-on:mousemove="search" v-on:mouseout="none"><input class="form-control" placeholder="搜搜"></div>
</template>
<script>
//    require('../../lib/css/selfSet.less')
    module.exports = {
        data:function(){
            return{
                
            }
        },
        methods:{
            search:function(){
                this.$store.commit('navActive','search');
            },
            none:function(){
                this.$store.commit('navActive','none');
            }
        }
       // props:['message']
    }

</script>

<style lang="less" rel="stylesheet/less" type="text/css" >
    .postings-search{
        position: absolute;
        width:400px;
        height: 70px;
        background-color: white;
        border-top:none;
        top:40px;
        right:0;
        z-index: 99;
        -webkit-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        -moz-box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        box-shadow:0 0 20px rgba(0, 0, 0, 0.78);
        input{
            width:380px;
            margin-left:10px;
            margin-top:20px;
        }
    }
</style>