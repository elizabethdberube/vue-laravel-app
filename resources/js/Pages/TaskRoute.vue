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

   saveTask: async (task) => {
  try {
    const response = await axios.post('/api/tasks', task, {
      headers: {
        'Content-Type': 'application/json',
      },
    });
    return response.data;
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
   


updateTask: async (id) =>{
  try {
    const response = await axios.put('/api/tasks', task, {
      headers: {
        'Content-Type': 'application/json',
      },
    });
    return response.data;
  } catch (err) {
    if (err.response && err.response.status === 400) {
      console.error('400 Error:', err.response.data);
      // Handle the 400 error specifically here
    } else {
      console.error('Error:', err);
      // Handle other errors
    }
    },
 
  
 
deleteTask: async (id) =>{
  try {
    const response = await axios.delete(`/api/tasks/${id}`, {
      headers: {
        'Content-Type': 'application/json',
      },
    });
  console.log('Task deleted:', response.data); // Remove the task from items after deletion 
  items.value = items.value.filter(task => task.id !== id);
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
  }
  };
</script>
<template>
<nav class="navbar navbar-dark bg-dark">
 
    <a class="navbar-brand mx-2" href="/">Task Manager <span role="img" aria-label="Memo">📝</span></a>
    <div class="icons">
      <i class="fas fa-save text-light savetask" ref="savetask" @click="handleTaskSave"></i>
      <i class="fas fa-plus text-light newtask" ref="newtask" @click="handleNewTaskView"></i>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-4 listcontainer" ref="listcontainer">
        <div class="card scrollable-container">
        
     
       <ul class="list-group">
          <li v-for="item in items" :key="item.id" class="list-group-item" >
       
            <label class="card-title" for="title"><h5>Title:</h5></label>
             <input type="text" class="form-control" id="title" v-model="item.title" @input="updateTask(item.id)">
           <label class="custom-control-label" for="description">Description:</label>
             <input type="text" class="form-control" id="description" v-model="item.description" @input="updateTask(item.id)">
          
          <div class="custom-control custom-checkbox mb-2">
          <input type="checkbox" class="custom-control-input"  v-model="item.status" @input="handleTaskSave(item.id)">
          <label class="custom-control-label" for="customCheck1">&nbsp;Completed</label>
        </div>
            <button class="btn btn-secondary btn-sm mx-2" @click="deleteTask(item.id)">Delete Task</button>

            <button class="btn btn-secondary btn-sm" @click="updateTask(item.id)">Update Task</button>
          </li>
       </ul>
        </div>
      </div>
      <div class="col-8">
        <div id="informDiv"></div>
        <input @keyup="handleTaskSave" class="form-control tasktitle" ref="tasktitle" placeholder="Task Title" maxlength="28" type="text" />
        <br>
        <textarea @keyup="handleTaskSave" class="tasktextarea"   ref="tasktextarea" placeholder="Task Description"></textarea>
 
        <button class="btn btn-secondary" @click="handleTaskSave">Save Task</button>
      </div>
    </div>
  </div>
</template>