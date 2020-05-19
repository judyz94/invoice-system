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
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue select
import Vue from 'vue'
import vSelect from 'vue-select'
import SearchForm from './components/SearchForm';

Vue.component('v-select', vSelect);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-form', SearchForm);

//Vee validate
import { extend } from 'vee-validate';
import { required, email } from 'vee-validate/dist/rules';

// Add the rules
extend('required', {
    ...required,
    message: 'This field is required.'
});

extend('email', {
    ...email,
    message: 'Enter a valid email with the format "example@mail.com".'
});

extend('min', {
    validate(value, args) {
        return value.length >= args.length;
    },
    params: ['length'],
    message: 'The name must be at least 5 characters.'
});

// Register globally
import { ValidationProvider } from 'vee-validate';
Vue.component('ValidationProvider', ValidationProvider);

import CustomerForm from './components/CustomerForm';
Vue.component('customer-form', CustomerForm);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
