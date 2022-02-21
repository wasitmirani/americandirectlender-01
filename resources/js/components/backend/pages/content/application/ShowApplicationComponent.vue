<template>
    <div>
      <BreadCrumb activename="Application Detail" ></BreadCrumb>
        <div class="col-lg-12">
          <div class="header-faq">
            <h5 class="mb-0">Application Detail</h5>
          </div>
        </div>
        <div class="col-sm-12 col-xl-12 xl-100">
          <div class="card">
            <div class="card-body">
              <div class="col-sm-12 col-xl-12 xl-100">
                <div class="card">
                  <div class="card-header pb-0">
                                  </div>
                 
                <AppDetail :application="application"></AppDetail>
                </div>
              </div>
            
            
            </div> 
          </div>
        </div>
    </div>
</template>
<script>
import BreadCrumb from '../../../components/BreadcrumbComponent.vue'
import AppDetail from "./components/AppDetail.vue";

export default{
  components:{
    BreadCrumb,
    AppDetail
  },

    data(){
        return{
            application : {},

        }
    },
    mounted(){
          if(this.$route.params.id){
                  let url="/customer/applications/"+this.$route.params.id;
                     axios.get(url).then((res)=>{
                // this.user=res.data.user;

                this.application = res.data.application
                  console.log(this.application)


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
