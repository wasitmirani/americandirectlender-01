<template>
    <div>
         <Breadcrumb activename="Settings" ></Breadcrumb>
         <div class="container-fluid">
              <div class="row">
                <div class="col-xl-12 xl-100 col-lg-12 box-col-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h5 class="pull-left">Settings</h5>
                    </div>
                    <div class="card-body">
                      <div class="tabbed-card">
                        <ul class="pull-right nav nav-pills nav-primary" id="pills-clrtab1" role="tablist">
                          <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tab1" data-bs-toggle="pill" href="#pills-clrhome1" role="tab" aria-controls="pills-clrhome1" aria-selected="true">Update Profile</a></li>
                          <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tab1" data-bs-toggle="pill" href="#pills-clrprofile1" role="tab" aria-controls="pills-clrprofile1" aria-selected="false">Update Password</a></li>
                        </ul>
                        <div class="tab-content" id="pills-clrtabContent1">
                          <div class="tab-pane fade show active" id="pills-clrhome1" role="tabpanel" aria-labelledby="pills-clrhome-tab1">
                        <div class="card-body">
                      <form>
                        <div class="row mb-2">
                          <div class="profile-title">
                            <div class="media">
                                <img class="img-70 rounded-circle"  alt="" v-bind:src="user.thumbnail">
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
                        <!-- <div class="mb-3">
                          <h6 class="form-label">Bio</h6>
                          <textarea class="form-control" rows="5"  v-model="user.user_info.about_me" name="bio" required></textarea>
                        </div> -->
                        <div class="mb-3">
                          <label class="form-label">Email-Address</label>
                          <input class="form-control" type="email" placeholder="your-email@domain.com" v-model="user.email" name="email" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Image</label>

                          <input class="form-control" type="file"  id="file" ref="file" v-on:change="handleFileUpload()">
                        </div>
                        <div class="form-footer">
                          <button class="btn btn-primary btn-block" type="button" @click="updateProfile">Save</button>
                        </div>
                      </form>
                    </div>
                    </div>
                          <div class="tab-pane fade" id="pills-clrprofile1" role="tabpanel" aria-labelledby="pills-clrprofile-tab1">
                              <div class="card-body">
                      <form>
                        <div class="mb-3">
                          <label class="form-label">Enter Password</label>
                          <input class="form-control" type="password" placeholder="Enter Password" v-model="passwords.password">
                            <span class="text-danger" v-if="errors.password">{{errors.password[0]}}</span>
                        </div>
                         <div class="mb-3">
                          <label class="form-label">Confirm Password</label>
                          <input class="form-control" type="password" placeholder="Confirm Password" v-model="passwords.password_confirmation">
                        </div>
                        <div class="form-footer">
                          <button class="btn btn-primary btn-block" @click="updatePassword">Update</button>
                        </div>
                      </form>
                    </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
         </div>
         </div>

        <!-- <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h4 class="card-title mb-0">Update Password</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <form>


                        <div class="mb-3">
                          <label class="form-label">Enter Password</label>
                          <input class="form-control" type="password" placeholder="Enter Password" v-model="passwords.password">
                            <span class="text-danger" v-if="errors.password">{{errors.password[0]}}</span>
                        </div>
                         <div class="mb-3">
                          <label class="form-label">Confirm Password</label>
                          <input class="form-control" type="password" placeholder="Confirm Password" v-model="passwords.password_confirmation">

                        </div>


                        <div class="form-footer">
                          <button class="btn btn-primary btn-block" @click="updatePassword">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div> -->



</template>
<script>
import Breadcrumb from "../../components/BreadcrumbComponent.vue";
export default{
    components:{
        Breadcrumb
    },
    data(){
        return {
            passwords:{},
            user:{},
            errors:{},
            file:""
        }
    },
    methods:{
        updatePassword(e){
            e.preventDefault();

               let formData = new FormData();
               formData=Object.assign(this.passwords,formData);
                axios.post('/password/setting/'+this.user.id,formData).then((res)=>{
                        this.$root.alertNotificationMessage(res.status,"Password Updated Successfully");
                        setTimeout(() => {
                            this.$router.push({ name: 'users' })
                        }, 1000);
                    }).catch((err)=>{
                        if(err.response.status==422){
                            this.errors=err.response.data.errors;
                            return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                        }
                    this.$root.alertNotificationMessage(err.response.status,err.response.data);

                });
  },

                handleFileUpload(){
    this.file = this.$refs.file.files[0];
  },

        updateProfile(e){
               e.preventDefault();
               let formData = new FormData();
                    formData.append('email', this.user.email);
                    formData.append('name', this.user.name);
                    formData.append('thumbnail', this.file);
                    formData.append('image', this.user.thumbnail);
                    formData.append('about_me',this.user.user_info.about_me);
                axios.post('/profile/setting/'+this.user.id,formData,
                {headers: {
                       'Content-Type': 'multipart/form-data'
                    }}).then((res)=>{

                        this.$root.alertNotificationMessage(res.status,"Profile Updated Successfully");
                        setTimeout(() => {
                            this.$router.push({ name: 'home' })
                        }, 1000);
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
