<template>
<div>
     <Breadcrumb activename="Notifications" ></Breadcrumb>
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header pb-0">
                <h5></h5><span v-for="notify in this.body" :key="notify.title">  {{ notify }}</span>
                  <vs-alert>
                    <h4>{{  notify }}</h4>
                     {{ body.body }}
                </vs-alert>
            </div>
            <div class="card-body">
                <div id="the-basics">
                    <form class="theme-form">
                        <div class="form-group">
                            <span class="twitter-typeahead" style="position: relative; display: inline-block;">
                            {{ notification.created_at | timeformat }}
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</template>
<script>
import Breadcrumb from "../../../components/BreadcrumbComponent.vue";
export default {
    components:{
        Breadcrumb

    },
    data(){
        return {
            notification:"",
            body:""
        }

    },
       mounted(){
           if(this.$route.params.id){
                var url = "/notification/"+this.$route.params.id;
                    axios.get(url).then((res)=>{
                // this.user=res.data.user;

                this.notification = res.data.notification
                this.body = JSON.parse(res.data.notification.data)
                  console.log(this.notification)

            }).catch((err)=>{
                     if(err.response.status==422){
                         this.errors=err.response.data.errors;
                        return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                    }
                  this.$root.alertNotificationMessage(err.response.status,err.response.data);

            });
           }


        }
}


</script>
