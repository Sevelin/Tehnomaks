/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    
    data:{
        urlRaw: '',
    },
    methods:{
        // Уменьшаем URL
        slimUrl(urlRaw){
            //https://www.slimframework.com/docs/v4/start/web-servers.html
            let url_one = urlRaw.split('.')[0];
            let url_two = url_one.split('//')[1];
//                if(url_two.length > 14){
//                     url_two =  url_two.slice(0, 14);
//                }
//                url_two = url_two[0].toUpperCase()+url_two.substring(1);
                //return url_two;
            console.log(url_one);
        },
        /**
        * Считаем количество нажатий
        */
        counClickLink(id)
        {
            console.log(id);
        }
    }
});
