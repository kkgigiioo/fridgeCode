require('./bootstrap');
import VueRouter from 'vue-router';
import routes from './routes';
import axios from 'axios';
import firebase from 'firebase/app';

window.Vue = require('vue');


//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.prototype.$axios = axios;

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDmWjRTN2Z621-LE04YNc3gCB-DyEOsKvQ",
    authDomain: "fridgecodemobileapp.firebaseapp.com",
    databaseURL: "https://fridgecodemobileapp.firebaseio.com",
    projectId: "fridgecodemobileapp",
    storageBucket: "fridgecodemobileapp.appspot.com",
    messagingSenderId: "362659499973",
    appId: "1:362659499973:web:2704d19759d8d88c1ec5ac"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

Vue.use(VueRouter);

const router = new VueRouter({
    routes
})

new Vue({
    router,
    render: h => h(App)
}).$mount('#app');
