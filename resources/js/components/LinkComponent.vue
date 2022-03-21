<template>
    <div class="list-links">
       <table>
           <tr>
               <th> Ид </th>
               <th> Ссылка </th>
               <th> Кликов </th>
               <th> Приватность </th>
               <th> Удалить </th>
           </tr>
           <tr v-for="item in arrayLinks"
           :key="item.id">
                <td> {{ item.id }} </td>
                <td> <a :href="item.name_url"> {{item.name}} </a> </td>
                <td> {{ item.count_click }} </td>
                <td> <button v-if="item.private == 0"
                            class="button" 
                            name="hide"
                            @click="upLink(item.id, 'hide')"> 
                        Лично
                    </button> 
                    <button v-else-if="item.private == 1"
                            class="button"
                            name="show" 
                            @click="upLink(item.id, 'show')"> 
                        Для всех 
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
            private: 0,
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
                this.getLinks(this.id);
                //console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },
        
        // ппередаём ссылку на обновление
        upLink(id, action)
        {
            let change = (action == 'show') ? 0 : 1;
            return axios('api/actionLinkList/' + id,{
                method: "PATCH",
                params:{
                    access: change
                }
            })
            .then(response => {
                this.getLinks(this.id);
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