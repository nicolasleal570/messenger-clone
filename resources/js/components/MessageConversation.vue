<template>
        <b-media :right-align="writtenByMe" vertical-align="center" class="my-3">
            <b-img slot="aside"
                rounded="circle" width="60" height="60" alt="Person" :src="image" 
            ></b-img>

            <b-card>
                <p class="mb-0">
                    <slot></slot> <!-- Inyecta el contenido del msg -->
                </p>
            </b-card>
        </b-media>
</template>
<script>
export default {
    props: {
        writtenByMe: Boolean,
        image: String,
    },
    data(){
        return{
        }
    },
    mounted(){
        //console.log('Component mounted');
    }
}
</script>
