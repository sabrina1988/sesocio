<template>
  <div class="users">
    <div v-if="error" class="error">
      <p>{{ error }}</p>
    </div>

    <div v-if="users.data.length">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Rol</td>
                    <td>Description</td>
                    <td>Name</td>
                </tr>
            </thead>
            
            <tbody>
                  <tr v-for="{ id, rol, description, name } in users.data" :key="id">
                    <td>{{ id }}</td>
                    <td>{{ rol }}</td>
                    <td>{{ description }}</td>
                    <td>{{ name }}</td>
                </tr>
            </tbody>          
        </table>

        <div class="mt-5">
            <button class="btn btn-primary" :disabled="! anteriorActivo" @click="getUsers(linkAnterior)">Anterior</button>
                {{paginacionEstado}}
            <button class="btn btn-primary" :disabled="! siguienteActivo" @click="getUsers(linkSiguiente)">Siguiente</button>
            <router-link :to="{ name: 'Home' }">Home</router-link> 
        </div>
    </div>
    
    <div v-else>
      <h3>No hay usuarios</h3>
    </div>
    

  </div>
</template>

<script>

export default {
  data() {
    return {
      users: {
        data: [],
        links: {
            next:null,
            prev:null
        }
      },
      error: "",
    };
  },
  mounted() {
    this.getUsers();
  },
  computed:{
      anteriorActivo(){
          return this.users.links.prev!==null;
      },

      siguienteActivo(){
          return this.users.links.next!==null;
      },

      linkSiguiente(){                              
          return  this.users.links.next.split('/').slice(-1).pop() || null;
      },

      linkAnterior(){                              
          return  this.users.links.prev.split('/').slice(-1).pop() || null;
      },

      paginacionEstado(){
          return this.users.meta? `${this.users.meta.current_page} de ${this.users.meta.last_page}` : null;
      }
  },
  methods: {   
    getUsers(url='roles/15/user') {
        const config = {                 
            headers: {
                Authorization: this.$store.state.token
            }
        }

        this.$http.get(`/${url}`, config ).then(response=>{
            this.users = response.data;
        });
    },

  },
};
</script>