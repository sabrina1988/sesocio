<template>
    <div class="container">
        <h1>Ingresar</h1>
       
        <form>
            <div class="row">
                <div class="col-12 col-sm-8">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="email" @keyup.enter="enviar">
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" v-model="password" @keyup.enter="enviar">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" @click="enviar">Enviar</button>
        </form>   
        <div class="alert alert-danger mt-5" role="alert" v-if="errors!=null">
            <h4 class="alert-heading">Atención!</h4>
            <p v-for="(error, key) in errors" :key="key"> {{key}}: {{error[0]}} </p>
        </div>     
    </div>    
</template>

<script>
export default {
    data(){
        return {
            email: '',
            password: '',
            errors: null
        }        
    },
    methods:{
        enviar(){
            this.errors=null;

            if(this.email.length && this.password.length){
                const params = {
                    email: this.email, password: this.password
                }

                this.$http.post('/token',params)
                    .then(response=>{
                        this.$store.dispatch('guardarToken',response.data.token);
                        this.$router.push({name:'Home'})
                    })
                    .catch(error=>{
                        this.errors=error.response.data;                       
                    });
            }else{
                alert('complete los datos');
            }
        }
    }
}
</script>
