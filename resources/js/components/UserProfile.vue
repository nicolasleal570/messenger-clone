<template>
    <b-container style="height: calc(100vh - (1.5rem * 2) - 56px);">

        <b-form action="https://messenger.test/profile" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_token" v-model="csrfToken">

            <b-form-group
            label="Correo Electrónico:"
            description="We'll never share your email with anyone else."
            >
                <b-form-input
                    v-model="user.email"
                    disabled
                    type="email"
                    placeholder="Ingresa tu email"
                ></b-form-input>
            </b-form-group>

            <b-form-group label="Nombre:">
                <b-form-input
                    v-model="user.name"
                    required
                    name="name"
                    placeholder="Ingresa tu nombre"
                ></b-form-input>
            </b-form-group>

            <b-form-group label="Nueva contraseña:">
                <b-form-input
                    type="password"
                    name="password"
                    placeholder="Ingresa una nueva contraseña"
                ></b-form-input>
            </b-form-group>

            <!-- <b-form-group label="Confirmar contraseña:">
                <b-form-input
                    type="password"
                    placeholder="Ingresa otra vez la contraseña"
                ></b-form-input>
            </b-form-group> -->

            <b-form-group label="Imagen de Perfil:">
                <b-img rounded="circle" width="100" height="100" alt="Imagen Perfil" :src="image" class="my-4"  
                ></b-img>
                <b-form-file
                    type="file"
                    placeholder="Elige una nueva imagen de perfil..."
                    name="avatar"
                />
            </b-form-group>

            <b-button type="submit" variant="primary">Guardar cambios</b-button>
        </b-form>

  </b-container>
</template>

<script>
  export default {
    props: {
        user: Object,
        csrfToken: String
    },
    data() {
      return {
      }
    },
    methods: {
    },
    computed: {
        image(){
            return `/users/${this.user.avatar}`;
        }
    }
  }
</script>