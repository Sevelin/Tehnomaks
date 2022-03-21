<template>
    <div class="list-links">
       <table class="table">
            <thead class="thead-dark">
               <tr>
                   <th scope="col"> Ид </th>
                   <th scope="col"> Ссылка </th>
                   <th scope="col"> Кликов </th>
                   <th scope="col"> Приватность </th>
                   <th scope="col"> Удалить </th>
               </tr>
           </thead>
           <tbody>
               <tr v-for="item in arrayLinks"
               :key="item.id">
                    <td> {{ item.id }} </td>
                    <td> 
                       <a :href="item.name_url"
                           class="text-decoration-none"> 
                            {{item.name}} 
                        </a> 
                    </td>
                    <td> {{ item.count_click }} </td>
                    <td> <button v-if="item.private == 0"
                                type="button" 
                                class="btn btn-secondary"
                                name="hide"
                                @click="upLink(item.id, 'hide')"> 
                            Лично
                        </button> 
                        <button v-else-if="item.private == 1"
                                type="button"
                                class="btn btn-primary"
                                name="show" 
                                @click="upLink(item.id, 'show')"> 
                            Для всех 
                        </button> 
                    </td>
                    <td> <button type="button"
                                class="btn btn-danger"
                                @click="delLink(item.id)"> 
                            Удалить 
                        </button> 
                    </td>
                </tr>
            </tbody>
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