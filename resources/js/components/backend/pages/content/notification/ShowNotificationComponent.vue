<template>
    <div>
        <div class="container-fluid">
            <div class="row">


                <div class="col-xl-9 xl-60 box-col-8">


                       <!-- <div class="media"><img class="img-40 img-fluid m-r-20" src="" alt="">
                        <div class="media-body"  >
                            <div class="alert alert-primary alert-dismissible fade show" role="alert" v-for="notie in noties" :key="notie.title">
                                <router-link  :to="{ name: 'ViewNotify', params: { id: cont.id } }"><span>{{ notie }}</span></router-link>

                            </div>
                            <!-- <vs-alert title="Lorem ipsum dolor sit amet" color="rgb(231, 154, 23)" active="true" v-for="notie in noties" :key="notie.title">
                            </vs-alert> -->
                          <!-- <vs-alert v-for="notie in noties" :key="notie.title">
                               <router-link  :to="{ name: 'ViewNotify', params: { id: cont.id } }"><span>{{ notie }}</span></router-link>
                          </vs-alert> -->
                       <!-- </div>

                    </div>-->

                    <div class="alert alert-light dark alert-dismissible fade show" role="alert" v-for="notie in noties" :key="notie.title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                        </path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12" y2="17"></line>
                        </svg>
                      <p> <router-link  :to="{ name: 'ViewNotify', params: { id: cont.id } }"><span>{{ notie }}</span></router-link>.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                    </div>
                <!-- <div class="job-pagination">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-primary">
                      <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                      <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                      <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                      <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                      <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                    </ul>
                  </nav>
                </div> -->
        </div>
    </div>
</div>
    </div>
</template>
<script>
export default{
       props:['cont','getNotifications'],
    data(){
        return{


           noties:"",
           content:""

    }
    },

    mounted(){

        this.noties = JSON.parse(this.cont.data)
        var url = "/all/notification";
            axios.get(url).then((res)=>{
                //    this.notifications = res.data.notifications;
                //    this.content = res.data.notifications.content
                //    console.log(res.data.notifications.content)
                   this.loading =false;
               }).catch((err)=>{
                        this.$root.alertNotificationMessage(err.response.status,err.response.data);

                  });
    }

}
</script>
<style>
.vs-alert a{
      text-decoration:none;
  }
</style>
