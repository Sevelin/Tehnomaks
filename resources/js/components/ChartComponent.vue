<!-- Шаблон для получения данных и последующей передачи их в шаблон с графиком -->
<template>
    <div class="chart">
        <line-chart :chart-data="chartData" 
                    :options="chartOptions"
        >
    </line-chart>
    </div>
</template>


<script>

import axios from 'axios';
import LineChart from './ChartItemComponent'
    
export default{
    name: 'Chart',
    components:{
        LineChart
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
            chartData: [],
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false
            },
        }
    },
    mounted(){
        this.getLinks(this.id);
//        console.log(this.chartData);
    },
    computed:{
        
    },
    methods:{
        // получаем список ссылок для конкретного пользователя
        // передаём id пользователя параметром
        getLinks(id)
        {
            return axios('api/historyClick/' + id,{
                method: "GET"
            })
            .then(response => {
                this.chartData = response.data;
                console.log(this.chartData);
            })
            .catch(error => {
                console.log(error);
            });
        },
        
    }
}
</script>


<style>
    
</style>