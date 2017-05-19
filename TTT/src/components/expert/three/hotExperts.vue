<template>
    <div class="hotExpert">
        <p class="title">热门专家<b>JavaScript</b><span>显示全部<i class="glyphicon glyphicon-share-alt"></i></span></p>
        <div class="expertList">
            <expertList v-for="item in expertsObj" v-bind:item="item"></expertList>
        </div>
        <div class="btn-group">

            <button class="btn"  v-on:click="expertRequire"><span class="glyphicon glyphicon-edit"></span>申请成为专家</button>
            <button class="btn select" v-on:click="chooseSection">板块选择</button>
        </div>
    </div>
</template>
<script>
    import expertList from '../four/expertsList.vue'

export default {
    data:function(){
        return{
            section:'js',
            expertsObj:''
        }
    },
    components:{
        expertList
    },
	computed:{

    },
	methods:{
        chooseSection(){
        this.section = "123";
    },
        expertRequire(){
            this.$store.commit('modelShow',true);
            this.$store.commit('modelActive','modelExpertRequire');
        },

},
    created(){
        var that = this;
        $.ajax({
            url:"php/expertListSelect.php",
            type:"POST",
            data:{

            },
            dataType:"JSON",
            success:function(data){
                that.expertsObj = data;
            },
            error:function(data){
                alert("专家列表查询出错")
            }
        })
    },
    watch:{
        section(){
            alert("123");
        }
    }
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scope>
    @import '../../../../lib/css/selfSet.less';
    .hotExpert{
        display: inline-block;
        width:760px;
        height:245px;
        background-color: white;
        vertical-align: top;
        margin-left:5px;
        padding:15px;
        .title{
            font-size: 20px;
            font-weight: 600;
            min-width:150px;
            border-bottom:2px solid #c00;
            padding-bottom: 8px;

            b{
                font-size: 16px;
                margin-left:40px;
                color: #da1b4f;
            }
            span{
                float:right;
                font-size: 15px;
                font-weight: 400;
                cursor: pointer;
                color: #da1b4f;
                i{
                    margin-left:5px;
                }
            }
        }
        .btn-group{
            width:100%;
            margin-top:40px;
            button{
                background-color: #3b8cff;
                color:white;
                margin-left:15px;
                display: inline-block;
                margin-top:-20px;
            }
            .select{
                float:right;
            }
        }

        .experts{
            width:243px;
            //height:120px;
            padding-top:10px;
            padding-bottom:10px;
            display: inline-block;
            //background-color: red;
            img{
                width:100px;
                height:100px;
                display: inline-block;
            }
            .information{
                width:138px;
                height:100px;
                display: inline-block;
                vertical-align: top;
                p{
                    font-size: 14px;
                }
            }
        }
    }
</style>
