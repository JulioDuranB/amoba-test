<template>
  <div class="relative w-full h-ful l py-40 min-h-screen">
    <div class="container mx-auto px-4 ">
      <div class="flex content-center items-center justify-center">
        <card>
            <h3 class="text-center mb-2">Agregar</h3> 
            <form @submit.prevent="agregar">
                            
            <!-- Username -->
            <div class=" bg-purple-200 p-8 rounded-b-2xl rounded-t-2xl">
              
                <label class="col-md-3 col-form-label text-md-right">Nombre</label>
                <div class="col-md-7">
                    <input type="text"  class="form-control mb-2 mr-4" v-model="tarea.first_name">
                </div>
            
                <label class="col-md-3 col-form-label text-md-right">Apellido</label>
                <div class="col-md-7">
                    <input type="text"  class="form-control mb-2" v-model="tarea.last_name">
                </div>

                <label class="col-md-3 col-form-label text-md-right">Cedula</label>
                <div class="col-md-7">
                    <input type="text" class="form-control mb-2" v-model="tarea.document">
                </div>
             
                <button class="btn btn-primary bg-purple-500 rounded-b-2xl rounded-t-2xl p-2 font-medium text-white ml-12 hover:bg-purple-600 " type="submit">Agregar</button>
                      
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
    data() {
        return {
            
            tarea: {first_name: '', last_name: '', document: ''}
        }
    },
    methods:{
        agregar(){
            console.log(this.tarea.first_name, this.tarea.last_name, this.tarea.document);
            const params = {
                first_name:this.tarea.first_name,
                last_name:this.tarea.last_name,
                document:this.tarea.document
                } 
            axios.post('/api/persons', params).then(this.$router.push({name: 'home'}))
        },
        
    }

}

</script> 