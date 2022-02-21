<template>
  <div>
      <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                            <div class="card mb-0">
                              <div class="card-header">
                                <h5 class="mb-0">Log Activities</h5>

                              </div>
                              <div class="card-body p-0">
                                <div class="taskadd">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <tbody>
                                      <tr>
                                        <td>
                                          <h6 class="task_title_0">Activity</h6>
                                          <p class="project_name_0">General</p>
                                        </td>
                                        <td>
                                          <p class="task_desc_0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                                        </td>
                                        <td><a class="me-2" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg></a><a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></a></td>
                                        <td><a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td>
                                      </tr>

                                    </tbody></table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

  </div>
</template>
<script>
 export default{
     data(){
         return{
             activities:""

         }
     },
     methods:{
        async getUsers(page=1){
                  this.loading =true;
                  this.page_num = page;
                 const url="/log/activities?page=" + page + "&query=" + this.query;
               await axios.get(url).then((res)=>{
                   this.users = res.data.users;
                   this.total_users=res.data.total_users;
                    this.roles=res.data.roles;
                   this.loading =false;
               }).catch((err)=>{
                        this.$root.alertNotificationMessage(err.response.status,err.response.data);

                  });
            },

     }
 }
</script>
