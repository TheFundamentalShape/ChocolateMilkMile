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
import RegistrantsList from './components/RegistrantsList';
import EventList from './components/EventList';
import UserRegistrations from './components/UserRegistrations';
import VueQrcode from '@chenfengyuan/vue-qrcode';
import ManagerNav from './components/ManagerNav';
import RegistrantNav from './components/RegistrantNav';
import NavigationLink from './components/NavigationLink';
import RegistrationForm from './components/RegistrationForm';

import axios from 'axios';

Vue.use(axios);

// Vue.component('registration-information', require('./components/RegistrationInformation').default);
Vue.component(VueQrcode.name, VueQrcode);

const app = new Vue({
    el: '#app',
    data: {
        confirmation_number: null,
        registration: null,
        event: null,
        errors: null,
        api_key: null
    },
    components: {
        'RegistrationInformation' : RegistrationInformation,
        'RegistrantsList': RegistrantsList,
        'EventList': EventList,
        'UserRegistrations': UserRegistrations,
        'ManagerNav': ManagerNav,
        'NavigationLink': NavigationLink,
        'RegistrantNav': RegistrantNav,
        'RegistrationForm': RegistrationForm,
        QrcodeStream,
    },
    methods: {
        onDecode (confirmationNumber) {
            this.confirmation_number = confirmationNumber;
            axios
                .get('/manager/api/confirmation/' + this.confirmation_number)
                .then(response => {
                    this.event = response.data.event;
                    this.registration = response.data;
                })
                .catch(error => {

                    alert('That is not a valid confirmation number. Please try again.');

                });
        },

        updateRegistration () {
            axios
                .post('/manager/check-in', {
                    'confirmation_number': this.registration.confirmation_number
                })
                .then(response => {this.registration = response.data.registration});
        }



    }
});
