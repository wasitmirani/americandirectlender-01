<template>
  <div>
        <Breadcrumb activename="Notify" ></Breadcrumb>
      <div class="row">
            <div class="col-12">
                   <div class="card">
                  <div class="card-header pb-0">
                    <h5>Notifications
                    <div style="float: right;">
                    <!-- <PrimaryButton icon="fas fa-plus"  label="New Notification"  v-on:activemodal="openModal($event)"></PrimaryButton> -->
                    </div>
                    </h5>
                  <div class="mb-3 col-4 mt-3">
                  </div>
                  </div>

                  <div class="card-body">
                    <content-placeholders v-if="loading">
                     <content-placeholders-heading :img="true" />
                     <content-placeholders-text :lines="1" />
                     <content-placeholders-heading :img="true" />
                     <content-placeholders-text :lines="1" />
                     <content-placeholders-heading :img="true" />
                     <content-placeholders-text :lines="1" />
                     <content-placeholders-heading :img="true" />
                     <content-placeholders-text :lines="1" />
                    </content-placeholders>
                   <!-- <notificationTable :getNotifications="getNotifications" :notifications="notifications" v-on:editItem="editItem($event)" v-on:deleteItem="deleteItem($event)" v-else></notificationTable>
                    -->
                    <div  v-for="cont in notifications" v-bind:key="cont.id">
                         <ShowNotification :getNotifications="getNotifications" :cont="cont" v-on:editItem="editItem($event)" v-on:deleteItem="deleteItem($event)" ></ShowNotification>
                    </div>

                  </div>
            </div>
        </div>
        </div>
        <vs-dialog blur   v-model="active_modal" width="50%">
         <template #header>
            <h4 class="not-margin" v-if="!edit_mode">
               Create New <b>Notification</b>
            </h4>
            <h4 class="not-margin" v-else>
               Update <b>{{notification.name}}</b> Notification
            </h4>
         </template>
         <div class="con-form">
            <form  v-on:submit.prevent="onSubmit">
                <div class="mb-3">
                   <label class="col-form-label" for="recipient-name">Notification Title:</label>
                   <vs-input   :color="this.$root.primary_color" v-model="notification.title" placeholder="Notification Title"  required/>
                  </div>
                <div class="mb-3">
                   <label class="col-form-label" for="recipient-name">Notification Body:</label>
                   <vs-input   :color="this.$root.primary_color" v-model="notification.body" placeholder="Notification Body"  required/>
                </div>
               <div class="mb-3">
                <label class="col-form-label" for="recipient-name">Select Users:</label>
                    <multiselect v-model="selected_users" placeholder="Search Users" :limit="20"
                    group-values="users"
                    group-label="name"
                    :group-select="true"
                    label="name" track-by="id" :options="users" :multiple="true"  :taggable="true" >
                      <span slot="noResult">Oops! No user found. Consider changing the search query.</span>
                    </multiselect>
               </div>
               <div class="flex">

                  <vs-button color="rgb(30, 32, 79)" gradient  type="submit"  v-if="!this.edit_mode">
                     Send
                  </vs-button>
                   <vs-button  color="rgb(59,222,200)" gradient  type="submit"   v-if="this.edit_mode">
                     Update
                  </vs-button>
               </div>
        </form>
         </div>
      </vs-dialog>
  </div>

</template>

<script>
import Breadcrumb from "../../../components/BreadcrumbComponent.vue";
import PrimaryButton from "../../../components/PrimaryButton";
import ShowNotification from "./ShowNotificationComponent"

import SearchInput from "../../../components/SearchInput.vue";
export default {

    components:{
        Breadcrumb,
        PrimaryButton,
        ShowNotification,
        SearchInput,
    },
     data(){
            return {
            notifications:{},
            notification:{},
            active_modal:false,
            edit_mode:false,
            selected_users:[],
            notification_data:{},
            users:{},
            errors:[],
            page_num:1,
            query:"",
            loading:false,
            }

     },
     mounted(){
       this.getNotifications();


     },
        methods:{
          onChange(event){
            // console.log("log",event);
          },
            editItem(item) {
            this.resetForm();
            this.edit_mode=true;
            this.active_modal=true;
            this.notification=item;
            this.selected_users=item.users.map(x=> x.id)
            },
            deleteItem(item){
            const url=`/management/notification/${item.id}`;
            Swal.fire({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!",
            }).then((result) => {
              if (result.isConfirmed) {
                axios.delete(url).then((res) => {
                    Swal.fire("Deleted!", "Your file has been deleted.", "success");
                        this.getNotifications();

                  }).catch((err)=>{
                        this.$root.alertNotificationMessage(err.response.status,err.response.data);
                   //    console.log("erro",err.response.data.message);

                  });
              }
            });
            },
            openModal(val){
             this.resetForm();
             return this.active_modal=val;
            },
            resetForm(){
            this.edit_mode=false;
            this.active_modal=false;
            this.notification={};
            this.selected_users=[];

            },
           async getNotifications(page=1){
             this.loading=true;
             this.page_num=page;
             const url="/management/notification?page=" + page + "&query=" + this.query;
               await axios.get(url).then((res)=>{
                   this.notifications = res.data.notifications;
                   this.notification_data =  res.data.notifications
                   this.users=res.data.users;
                   this.loading=false;

               }).catch((err)=>{
                     this.$root.alertErrorMessage(err.response.status,err.response.data);
               });
            },
           isquery(query) {
            return (this.query = query);
          },

          filterdata(data){
            this.notifications=data.notifications;
          },
        loadingStart(value) {

            this.loading = value;
          },

            onSubmit(){
                this.$root.alertNotificationMessage(201,"Please Wait......")
                let formData = new FormData();
                formData=Object.assign(this.notification,formData);
                formData=Object.assign({users:this.selected_users},formData)
                const url="/management/notification";
                if(!this.edit_mode){
                     axios.post(url,formData).then((res)=>{
                     this.$root.alertNotificationMessage(res.status,"New notification has been created successfully")
                     this.resetForm();
                     this.getNotifications();

                }).catch((err)=>{
                     if(err.response.status==422){
                        this.errors=err.response.data.errors;
                        return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                    }
                    this.$root.alertNotificationMessage(err.response.status,err.response.data);
                });
                }
                else {
                    let data={id:this.notification.id,name:this.notification.name,users:this.selected_users};
                    axios.put(url+"/"+this.notification.id,data).then((res)=>{

                     this.getNotifications();
                     this.resetForm();
                    this.$root.alertNotificationMessage(res.status,"notification has been updated successfully");

                }).catch((err)=>{
                     if(err.response.status==422){
                        this.errors=err.response.data.errors;
                        return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                    }
                    this.$root.alertNotificationMessage(err.response.status,err.response.data);
                });
                }

            },


    }



}
</script>
<style scoped>

  .vs-input {
   width: 100%;
   }
   .vs-select-content {
   width: 100%;
   max-width: 100%;
   }
</style>
