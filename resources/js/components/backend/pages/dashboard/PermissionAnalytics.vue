<template>
   <div>
       <div id="circlechart">
        </div>
   </div>
</template>
<script>
export default{
     props:['users','labels'],
    data(){
        return{
            userByPermission:[],
            userPermissionLabel:[]
        }
    },
    methods:{
        radialBar(){
            var options11 = {
            chart: {
                height: 350,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
            dataLabels: {
                name: {
                    fontSize: '22px',
                },
                value: {
                    fontSize: '16px',
                },
                total: {
                    show: true,
                    label: 'Permissions',
                    formatter: function(w) {
                        return 5;
                    }
                }
            }
            }
        },
        series: this.userByPermission,
        labels: this.userPermissionLabel,
        colors: [vihoAdminConfig.primary, vihoAdminConfig.secondary, '#222222', '#717171']
            }
        },
        init(){
            this.userByPermission = this.user;
        },
        initLabels(){
            this.userPermissionLabel = this.labels
        }
    },
    watch:{
        users:function(new_value){
            this.init();
        },
        labels:function(new_value){
            this.initLabels()

        }
    },
    mounted(){
        this.radialBar();
    }
}
</script>
