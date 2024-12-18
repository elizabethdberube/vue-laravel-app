<script>
import './style.css'
import "../bootstrap.js";
import { ref, onMounted } from "vue";
import axios from 'axios';
import vueCustomScrollbar from 'vue-custom-scrollbar';


export default {
  data() {
    return {
      items: []
    };
  },
  mounted() {
 axios.get('/api/tasks') 
          .then(response => {
            this.items = response.data;
          })
        .catch((err) => res.status(400).json(err));
  },

 // methods go in here
  methods: {


   async saveTask() {
    const task = { 
      id: this.id, 
      title: this.title, 
      description: this.description, 
      status: this.status,

    };
    console.log(task);
  try {
    const response = await axios.post('/api/tasks', task, {
      headers: {
        'Content-Type': 'application/json',
      },
    });
   location.reload();
  } catch (err) {
    if (err.response && err.response.status === 400) {
      console.error('400 Error:', err.response.data);
      // Handle the 400 error specifically here
    } else {
      console.error('Error:', err);
      // Handle other errors
    }
    throw err; // Optional: Re-throw the error to handle it elsewhere
  }},
   
async updateTask(item){

   const task = { 
      id: item.id, 
      title: item.title, 
      description: item.description, 
      status: item.status,

    };
  console.log(task);
  let id = task.id;
  let url = `/api/tasks/${id}`
  
  try {
    const response = await axios.put(url, task, {
      headers: {
        'Content-Type': 'application/json',
      },
    });
 
 location.reload();
  } catch (err) {
    if (err.response && err.response.status === 400) {
      console.error('400 Error:', err.response.data);
      // Handle the 400 error specifically here
    } else {
      console.error('Error:', err);
      // Handle other errors
    }}
    },
 
deleteTask: async (item) =>{

   let id = item.id;
  let url = `/api/tasks/${id}`
 
  try {
    const response = await axios.delete(url, {
      headers: {
        'Content-Type': 'application/json',
      },
    });

   location.reload();
  } catch (err) {
    if (err.response && err.response.status === 400) {
      console.error('400 Error:', err.response.data);
      // Handle the 400 error specifically here
    } else {
      console.error('Error:', err);
      // Handle other errors
    }
  
  }
  }
  }
  };
</script>
<template>
   <nav class="navbar navbar-dark bg-dark">
 
    <a class="navbar-brand mx-2" href="/">Task Manager <span role="img" aria-label="Memo">📝</span></a>

   </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-4 listcontainer" ref="listcontainer">
        <div class="card ">
        
   

        <nav aria-label="Page navigation example">
          <ul class="list-group pagination">
          <li v-for="item in items" :key="item.id" class="list-group-item page-item" >
            <form v-on:submit.prevent="updateTask(item)">
            <label class="card-title" for="title"><h5>Title:</h5></label>
            <input type="hidden" class="form-control" id="title" v-model="item.id">
             <input type="text" class="form-control" id="title" v-model="item.title">
           <label class="custom-control-label" for="description">Description:</label>
             <input type="text" class="form-control" id="description" v-model="item.description" >
          
              <div class="custom-control custom-checkbox mb-2">
              <input type="checkbox" class="custom-control-input"  v-model="item.status" value="item.status">
              <label class="custom-control-label" for="customCheck1">&nbsp;Completed</label>
              </div>
            <button class="btn btn-secondary btn-sm mx-2" @click="deleteTask(item)">Delete Task</button>

            <button type="submit" class="btn btn-secondary btn-sm mx-2" >Update Task</button>
             </form>
          </li>
          </ul>
          </nav>
      
       
        </div>
      </div>

      <div class="col-8">
      <form v-on:submit.prevent="saveTask">
        <input required class="form-control tasktitle" v-model="title" ref="tasktitle" placeholder="Task Title" maxlength="28" type="text" />
        <br>
        <textarea  class="tasktextarea"   v-model="description" placeholder="Task Description"></textarea>
          <div class="custom-control custom-checkbox mb-2">
          <input type="checkbox" class="custom-control-input"  v-model="status" >
          <label class="custom-control-label" for="customCheck1">&nbsp;Completed</label>
          </div>
        <button type="submit" class="btn btn-secondary" >Save Task</button>
      </form>
      </div>
    
    </div>
  </div>
</template>