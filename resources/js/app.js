/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import '../css/app.css'

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ActivityComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('activity-component', require('./components/ActivityComponent.vue').default);
Vue.component('time-component', require('./components/TimeComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        timestamp: "",
        time: ""
    },
    created() {
        setInterval(this.getNow, 1000);
    },
    methods: {
        getNow: function() {
            const today = new Date();
            const date = today.getFullYear() + '-' + ( today.getMonth() + 1 ) + '-' + today.getDate();
            let hours = today.getHours();
            let meridiem = 'AM';

            if(hours > 12) {
                hours = hours - 12;
                meridiem = 'PM';
            }
            const time = hours + ":" + today.getMinutes();
            const dateTime = date + ' ' + time + ' ' + meridiem;
            this.timestamp = dateTime;
            this.time = today;
        }
    }
});
