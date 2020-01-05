/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/RegistrationInfo.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { QrcodeStream } from 'vue-qrcode-reader';
import RegistrationInformation from './components/RegistrationInformation';

import axios from 'axios';

Vue.use(axios);

// Vue.component('registration-information', require('./components/RegistrationInformation').default);

const app = new Vue({
    el: '#app',
    data: {
        registration: null,
        event: null,
        errors: null
    },
    components: {
        'RegistrationInformation' : RegistrationInformation,
        QrcodeStream,
    },
    methods: {
        onDecode (confirmationNumber) {
            axios
                .get('/api/confirmation/' + confirmationNumber)
                .then(response => {
                    this.event = response.data.event;
                    this.registration = response.data.registration;
                });
        },

        updateRegistration () {
            axios
                .post('/api/checkin', {
                    'confirmation_number': this.registration.confirmation_number
                })
                .then(response => {this.registration = response.data.registration;});
        }



    }
});
