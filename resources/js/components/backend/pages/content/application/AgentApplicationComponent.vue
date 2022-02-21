<template>
    <div>
        <div class="container-fluid center" ref="target" id="target" >
            <div class="row project-cards">
                 <div class="col-sm-12">




                                    <div class="row">
                                        <div class="col-xxl-6 col-lg-6 " v-for="application in applications" :key="application.id">
                                            <AgentApp  :application="application"></AgentApp>
                                        </div>


                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import AgentApp from './components/AgentApp.vue'

export default{
    components:{
        AgentApp
    },
    data(){
    return{
        applications:{},
         page_num:1,
         role:""
    }
    },
    methods:{
         async getApplications(page=1){

              this.page_num = page;
              const url="/agent/application?page=" + page + "&query=" + this.query;

               await axios.get(url).then((res)=>{

                   this.applications = res.data.applications;


                    // this.roles=res.data.roles;
                   this.loading =false;
               }).catch((err)=>{
                        this.$root.alertNotificationMessage(err.response.status,err.response.data);

                  });

        }

    },
    mounted(){
        this.getApplications()
    }
}


</script>
