<template>
   <div>
       <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h4 class="card-title mb-0">My Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <form>



                        <div class="row mb-2">
                          <div class="profile-title">
                            <div class="media">
                                <img class="img-70 rounded-circle" alt="" v-bind:src="user.thumbnail">
                              <div class="media-body">
                                <h3 class="mb-1 f-20 txt-primary">{{ user.name}}</h3>


                                <p class="f-12"></p>
                              </div>
                            </div>
                          </div>
                        </div>
                          <div class="mb-3">
                          <h6 class="form-label">Name</h6>
                          <input class="form-control"  v-model="user.name" name="name" required>
                        </div>
                        <div class="mb-3">
                          <h6 class="form-label">Bio</h6>
                          <textarea class="form-control" rows="5" v-model="user.user_info.about_me" name="bio" required></textarea>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Email-Address</label>
                          <input type="email" class="form-control" placeholder="your-email@domain.com" v-model="user.email" name="email" required>
                        </div>

                         <div class="mb-3">
                          <label class="form-label">Image</label>
                          <input class="form-control" type="file" name="thumbnail">
                        </div>

                        <div class="form-footer">
                          <button class="btn btn-primary btn-block" type="button" v-on:click="onSave">Save</button>
                        </div>
                      </form>
                    </div>
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
           return {
                  user:{
            name:"",
            email:"",
            thumbnail:""



        },
               errors:{}

           }
       },

       methods:{
           onSave(e){
               e.preventDefault();
                var formData = new FormData();
                formData.append('email', this.user.email);
                formData.append('name', this.user.name);
                formData.append('thumbnail', this.user.thumbnail);
                formData.append('about_me',this.user.user_info.about_me);
                formData.append('id',this.user.id);

                 axios.post('/profile/setting/',formData).then(res=>{

                        this.$root.alertNotificationMessage(res.status,"User has been Updated successfully");

                    }).catch((err)=>{
                        if(err.response.status==422){
                            this.errors=err.response.data.errors;
                            return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                        }
                    this.$root.alertNotificationMessage(err.response.status,err.response.data);

                });

           }



       },
        mounted(){

            axios.get("/profile/setting").then((res)=>{

                  this.user = res.data.user



            }).catch((err)=>{
                     if(err.response.status==422){
                         this.errors=err.response.data.errors;
                        return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                    }
                  this.$root.alertNotificationMessage(err.response.status,err.response.data);

            });





        }
   }
</script>
