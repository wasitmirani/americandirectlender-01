<template>
 <div>
 </div>
</template>
<script>
 export default{
  props:['userByRole','userRoleLabel'],
    computed: {
    chartData: function() {
      return this.userByRole;
    },
    charLabel: function(){
        return this.userRoleLabel
    }
  },
  data(){
      return{
            series: this.chartData,
          chartOptions: {
            chart: {
              height: 390,
              type: 'radialBar',
            },
            plotOptions: {
              radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                  margin: 5,
                  size: '30%',
                  background: 'transparent',
                  image: undefined,
                },
                dataLabels: {
                  name: {
                    show: false,
                  },
                  value: {
                    show: false,
                  }
                }
              }
            },
            colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
             labels:"",
            legend: {
              show: true,
              floating: true,
              fontSize: '16px',
              position: 'left',
              offsetX: 160,
              offsetY: 15,
              labels: {
                useSeriesColors: true,
              },
              markers: {
                size: 0
              },
              formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
              },
              itemMargin: {
                vertical: 3
              }
            },
            responsive: [{
              breakpoint: 480,
              options: {
                legend: {
                    show: false
                }
              }
            }]
          },

      }
  },

    methods:{
        init(){
            this.series = this.userByRole
        },
        label(){
            this.chartOptions.labels = this.userRoleLabel
        },
    updateLabels: function() {

      this.chartOptions = {
        labels: this.userRoleLabel ,
      }
    }
    },

    watch:{
        userByRole: function(new_role){
            this.init();

        },

    },
    watch:{
        userRoleLabel: function(new_role){
            this.updateLabels();
        }
    }
 }
</script>
