<template>
    <div class="list-links">
       <table>
           <tr>
               <th> Ид </th>
               <th> Ссылка </th>
               <th> Кликов </th>
               <th> Приватность </th>
               <th> Изменить </th>
               <th> Удалить </th>
           </tr>
           <tr v-for="item in arrayLinks"
           :key="item.id">
                <td> {{ item.id }} </td>
                <td> <a :href="item.name_url"> {{item.name}} </a> </td>
                <td> {{ item.count_click }} </td>
                <td> {{ item.private }} </td>
                <td> <button class="button" 
                            @click="upLink(item.id)"> 
                        Изменить 
                    </button> 
                </td>
                <td> <button class="button"
                            @click="delLink(item.id)"> 
                        Удалить 
                    </button> 
                </td>
            </tr>
       </table>
    </div>
</template>


<script>

import axios from 'axios';
    
export default{
    name: 'Link',
    components:{
        
    },
    props:{
        id:{
            type: Number,
            default(){
                return[];
            }
        },
    },
    data(){
        return{
            // сохраняем список ссылок
            arrayLinks: [],
        }
    },
    async mounted(){
        this.getLinks(this.id);
        
    },
    computed:{
        
    },
    methods:{
        // получаем список ссылок для конкретного пользователя
        // передаём id пользователя параметром
        getLinks(id)
        {
            return axios('api/actionLinkList/' + id,{
                method: "GET"
            })
            .then(response => {
                this.arrayLinks = response.data;
                //console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },
        
        // передаём ссылку на удаление
        delLink(id)
        {
            return axios('api/actionLinkList/' + id,{
                method: "DELETE"
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },
        
        // ппередаём ссылку на обновление
        upLink(id)
        {
            return axios('api/actionLinkList/' + id,{
                method: "PATCH"
            })
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>


<style>
    
</style>