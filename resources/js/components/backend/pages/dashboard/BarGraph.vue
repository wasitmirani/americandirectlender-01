<template>
   <div>
      <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
   </div>
</template>
<script>
  export default{
      props:['total_apps','dates'],
      data(){
          return {
              apps:[],

            series: [
                {
              name: "Applications",
              data:[]
          }],
          chartOptions: {

            chart: {
              height: 350,
              type: 'line',
              zoom: {
                enabled: false
              }
            },
            dataLabels: {
              enabled: true
            },
            stroke: {
              curve: 'straight'
            },
            title: {
              text: 'Applications Statistics',
              align: 'left'
            },
            grid: {
              row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
              },
            },
            xaxis: {

              categories: ['mon','sun']
            }
          },


        }
      },
      methods:{
         init(){
              this.series[0].data  = this.total_apps
         },
          date(){
              this.chartOptions.xaxis.categories = this.dates

         }
      },
       watch:{

          total_apps: function(new_value){

             this.init();
          },
          dates:function(new_value){
              this.date()
          }

      },



  }
</script>
