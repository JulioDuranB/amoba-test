<template>
    <div>
        <h3>Agregar usuario</h3>
        <form @sutmit.prevent="agregar">
            <input type="text" placeholder="First_name" class="form-control mb-2" v-model="tarea.First_name">
            <input type="text" placeholder="Last_name" class="form-control mb-2" v-model="tarea.Last_name">
            <input type="text" placeholder="Document" class="form-control mb-2" v-model="tarea.Document">
            <button class="btn btn-primary" type="submit">Agregar</button>
        </form>

        <ul class="list-group">
            <li class="list-group-item">

            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tareas:[],
            tarea: {First_name: '', Last_name: '', Document: ''}
        }
    },
    

    methods:{
        agregar(){
            console.log(this.tarea.First_name, this.tarea.Last_name, this.tarea.Document);
            const params = {
                First_name: this.tarea.First_name,
                Last_name:  this.tarea.Last_name,
                Document:   this.tarea.Document
                } 
            axios.post('/registro', params)
        }
    }

}

</script> 





