<template>
    <b-form>
        <b-form-group>
            <b-form-input class="text-center"
                type="text"
                v-model="querySearch"
                placeholder="Buscar Contacto"
            ></b-form-input>
        </b-form-group>
    </b-form>
</template>

<script>
    export default {
        methods: {

        },
        computed: {
            querySearch: {
                get(){
                    return this.$store.state.querySearch;
                },
                set(value){
                    this.$store.commit('newQuerySearch', value);
                }
            }
        },
    }
</script>
