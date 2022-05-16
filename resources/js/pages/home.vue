<template>
  <div class="px-4 md:px-10 mx-auto w-full">
    <div class="flex flex-wrap py-4">
      <div class="w-full lg:w-4/12 px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
          <div class="flex-auto p-4 ">
            <div class="flex flex-wrap mb-4" v-for="task in tasks2" :key="task.id">
              <div class="relative w-auto pl-4 flex-initial">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                      <i class="far fa-chart-bar"></i>
                  </div>
              </div>
              <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                  <h5 class="text-blueGray-400 uppercase font-bold text-xs">{{ task.First_name }} {{ task.Last_name }}</h5>
                  <span class="font-semibold text-xl text-blueGray-700">{{ task.Document }}</span>
              </div>
          </div>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-8/12 px-4 pt-10 ">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
          <div class="rounded-t mb-0 px-4 py-3 border-0">
              <div class="flex flex-wrap items-center">
                  <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <span class="ml-4">Nombre</span>
                      <input type="search" class="border-2" name="texto" v-model="search" @keyup="buscarUsuario">
                  </div>
              </div>
          </div>
          <div class="block w-full overflow-x-auto px-4 pb-4">
              <table class="items-center w-full bg-transparent border-collapse">
                  <thead>
                      <tr>
                          <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">ID</th>
                          <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Nombre</th>
                          <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Apellido</th>
                          <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">Documento</th>
                          <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="task2 in tasks" :key="task2.id">
                          <td>{{ task2.id }}</td>
                          <td>{{ task2.First_name }}</td>
                          <td>{{ task2.Last_name }}</td>
                          <td>{{ task2.Document }}</td>
                          <td>
                            <button class=" btn btn-primary bg-green-500 rounded-b-2xl rounded-t-2xl  ml-10 p-2 font-medium text-white hover:bg-green-600"><router-link :to="{ name:'update', params: {id:task2.id}}">Editar</router-link></button>              
                            <button @click="deletePost(task2.id)" type="button" class=" btn btn-primary bg-red-400 rounded-b-2xl rounded-t-2xl p-2 mt-2 font-medium text-white hover:bg-red-600"><i class="fas fa-trash mr-1">Borrar</i></button>         
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
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
      tasks: [],
      tasks2: [],
      search: '',
      setTimeouthBuscador:''
    }
  },
  watch: {
      search(newValue, oldValue) {
        if (newValue.length > 3) {
          this.traerUsuario(newValue)
        }else if (newValue.length == 0){
          this.getData()
        }
      }
  },
  created() {
    console.log(this.$route.query)

    this.getData()
    
    axios.get('/api/persons?type=0')
      .then(response => this.tasks2 = response.data)
      .catch();
    
    this.traerUsuario(this.$route.query.texto)
 },
  methods: {
    
    

    deletePost(id){
        if(id) {
          axios.delete('/api/persons/'+id)
          .then((res)=>{this.getData()})
        }
    },
    getData(){
      axios.get('/api/persons?type=1')
      .then(response => this.tasks = response.data)
      .catch();
    },
    traerUsuario(search){
      if(search){
          axios.get('/api/persons?type=1&search='+search).then((res) => {this.tasks = res.data})}

    },
    buscarUsuario(){
      clearTimeout( this.setTimeouthBuscador)
      this.setTimeouthBuscador= setTimeout( this.traerUsuario, 360)
    }
  }
}
</script> 
