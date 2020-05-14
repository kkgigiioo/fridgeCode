<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Fridge Code Web App Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link clrouter-linkss="nav-link" to="{{ url('/') }}">Welcome</router-link>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div v-if="loggedIn">
              <router-link class="dropdown-item" to="/login">Login</router-link>
              <router-link class="dropdown-item" to="/register">Register</router-link>
            </div>
            <a v-else @click="logout" href="javascript:;" class="drowdown-item">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import * as firebase from 'firebase/app';
import 'firebase/auth';

export default {
  name: 'navbar',
  props: ['app'],
  created() {
    firebase.auth().onAuthStateChanged(user => {
      this.loggedIn = !!user;
      /*if(user) {
        this.loggedIn = true;
      }
      else {
        this.loggedIn = false;
      }*/
    })
  },
  data() {
    return {
      loggedIn: false
    }
  },
  methods: {
    async logout() {
      try {
        const data = await firebase.auth().signOut();
        console.log(data);
        this.$router.replace({name: "welcome"})
      }
      catch(err) {
        console.log(err);
      }  
    }
  }
}
</script>

<style>

</style>