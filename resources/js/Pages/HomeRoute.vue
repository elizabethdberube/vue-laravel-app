import axios from "axios";
import { ref } from "vue";

const response = ref();

const getValue = async () => {
    try {
        response.value = await axios.get("/api/test-me");
    } catch (error) {
        // Do something with the error
        console.log(error);
    }
};

<template>


  <div class="container">
    <div style="margin-top: 80px;" class="jumbotron text-center">
      <h1 class="display-4">Note Taker <span role="img" aria-label="Memo">📝</span></h1>
      <h4 class="mt-4">Take notes with Express</h4>
    <router-link to="/test" lass="btn btn-primary btn-lg mt-4" > Let's take some notes </router-link>
    </div>
  </div>

</template>