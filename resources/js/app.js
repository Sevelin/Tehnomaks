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

Vue.component('link-component', require('./components/LinkComponent.vue').default);
Vue.component('chart-component', require('./components/ChartComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import axios from 'axios';

const app = new Vue({
    el: '#app',
    
    data:{
        urlRaw: '',
        smollLink: ''
    },
    methods:{
        // Уменьшаем URL
        slimUrl(urlRaw){
            
            let r_url = urlRaw;
            let url_head = '';
            let url_body = '';
            if (r_url.slice(0, 8) == 'https://')
            {
                url_head = urlRaw.slice(0, 8);
                url_body = urlRaw.slice(8).split('/');
            }else if (r_url.slice(0, 7) == 'http://')
            {
                url_head = urlRaw.slice(0, 7);
                url_body = urlRaw.slice(8).split('/');
            }else{
                url_body = urlRaw.split('/');
            }
            
            let url_result = url_head + url_body[0];
            url_result = (url_body.length >= 2) ?
                            url_result + '/' + url_body[1] :
                            url_result;
            let url_link = "<a href='"+urlRaw+"'> "+url_result +" </a>";
            this.smollLink = url_link;
        },
        /**
        * Считаем количество нажатий
        */
        counClickLink(id)
        {
            return axios('api/actionLink/' + id,{
                method: "PATCH",
                params:{
                    count_click: 'count'
                },
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(err => {
                console.log('ошибка записи');
            })
            console.log(id);
        }
    }
});
