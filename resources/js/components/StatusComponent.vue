<template>
	<b-img rounded="circle"
	blank width="10" height="10"
	:title="online ? 'Conectado' : 'Desconectado'"
	:blank-color="online ? 'green' : 'red'"    
	/>
</template>
<script>
export default {
    props: {
        online: Boolean
    },
    data(){
        return {
        }
    },
    mounted(){            
    },
}
</script>
