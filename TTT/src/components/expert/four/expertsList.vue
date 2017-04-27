<template>
    <div class="experts">
        <div class="child">
            <img v-bind:src="userHead">
            <div class="information">
                <p>姓名：{{item.relName}}</p>
                <p>擅长领域：{{item.major}}</p>
                <p>私信</p>
            </div>
        </div>
    </div>
</template>
<script>
//import aaa from '../seven/inform-bottom.vue'

export default {
    props:['item'],
    data:function(){
        return{

        }
    },
    components:{
        //aaa,
    },
	computed:{
        userHead(){
            return "http://localhost:8081/luntan/php/upload/"+this.item.userHead;
        },
    },
	methods:{

    },
    // props:['message']
}
</script>
<style lang="less" rel="stylesheet/less" type="text/css" scoped>
    @import '../../../../lib/css/selfSet.less';

</style>
