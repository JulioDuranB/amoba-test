<template>
  <div class="relative w-full h-ful l py-40 min-h-screen">
    <div class="container mx-auto px-4 ">
      <div class="flex content-center items-center justify-center">
        <card>
            <h3 class="text-center mb-2">Editar</h3> 
            <form @submit.prevent="actualizar">
                            
            <!-- Username -->
            <div class=" bg-purple-200 p-8 rounded-b-2xl rounded-t-2xl">
              
                <label class="col-md-3 col-form-label text-md-right">Nombre</label>
                <div class="col-md-7">
                    <input type="text"  class="form-control mb-2 mr-4" v-model="tarea.First_name">
                </div>
            
                <label class="col-md-3 col-form-label text-md-right">Apellido</label>
                <div class="col-md-7">
                    <input type="text"  class="form-control mb-2" v-model="tarea.Last_name">
                </div>

                <label class="col-md-3 col-form-label text-md-right">Cedula</label>
                <div class="col-md-7">
                    <input type="text" class="form-control mb-2" v-model="tarea.Document">
                </div>
             
                <button class="btn btn-primary bg-purple-500 rounded-b-2xl rounded-t-2xl p-2 font-medium text-white ml-12 hover:bg-purple-600 " type="submit">Actualizar</button>
                      
            </div>

            
            </form>
        </card>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  middleware: 'auth',

  metaInfo () {
    return { title: 'Home' }
  },
  
  data(){
    return {
      tarea: [],
      tarea2: []
    }
 },
  created() {
    console.log(this.$route.params)
      
    this.consulta(this.$route.params.id)
    

  },

  methods: {
    
    consulta(id){
        if(id) {
          axios.get('/api/persons/'+id)
          .then((res)=>{this.tarea = res.data})
        }
    },
    actualizar(){
      let id = this.$route.params.id
            const params = {
                first_name:this.tarea.First_name,
                last_name:this.tarea.Last_name,
                document:this.tarea.Document
                } 
            axios.put('/api/persons/'+id, params).then(this.$router.push({name: 'home'}))
    }
  }
}
</script> 
