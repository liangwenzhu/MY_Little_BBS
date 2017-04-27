<template>

</template>
<script>
    module.exports = {
        components:{
            'jqForm':{
                render(createElement){
                    return createElement('script',{attr:{
                        type:'text/javascript',src:this.src
                    }})
                }
            }
        },
        props:{
          src:{type:String,required:true},
        },
    }
</script>
<style lang="less" scoped>



</style>
