<script>
import axios from "axios";
import { ref } from "vue";
import "../bootstrap.js";
import './style.css'

const response = ref();

const getValue = async () => {
    try {
        response.value = await axios.get("/api/test-me");
    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};

</script>
<template>
  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/notes">Note Taker
    </a>
  </nav>

  <div class="container">
    <div style="margin-top: 80px;" class="jumbotron text-center">
      <h1 class="display-4">Task Manager<span role="img" aria-label="Memo">📝</span></h1>
      <h4 class="mt-4">Manage tasks with NextJS</h4>
    <router-link to="/test" lass="btn btn-primary btn-lg mt-4" > Let's manage some tasks </router-link>
    </div>
  </div>

</template>