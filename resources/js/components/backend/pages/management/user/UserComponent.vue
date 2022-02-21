<template>
  <div>
      <Breadcrumb activename="Users Management" ></Breadcrumb>
          <div class="row">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></div>
                      <div class="media-body"><span class="m-0">Total Users</span>
                        <h4 class="mb-0 counter">{{total_users}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6" v-for="item in roles" :key="item.id" >
                <div class="card o-hidden border-0">
                  <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                      <div class="align-self-center text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></div>
                      <div class="media-body"><span class="m-0"> {{item.name}}s</span>
                        <h4 class="mb-0 counter">{{item.users_count}}</h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        <div class="row">
            <div class="col-12">
                   <div class="card">
                  <div class="card-header pb-0">
                    <h5>
                    <h5>Users Listing
                    <div style="float: right;">
                            <vs-button color="rgb(30, 32, 79)" gradient :active="true" to="/create/user">
                                <i class="fas fa-plus" style="margin-right: 10px;" ></i>
                                Add User
                            </vs-button>
                     </div>
                    </h5>
                      <div class="mb-3 col-4 mt-3">

                        <SearchInput :apiurl="'/management/user?page=' +this.page_num"
                        v-on:query="isquery($event)"
                        v-on:loading="loadingStart($event)"
                        v-on:reload="getUsers()"
                        v-on:filterList="filterdata($event)"
                        label="Search Users"></SearchInput>
                    </div>
                    </h5>
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
                      <UserTable :getUsers="getUsers" :users="users" v-on:deleteItem="deleteItem($event)" v-else></UserTable>
                  </div>
            </div>
        </div>
        </div>

  </div>

</template>

<script>
import Breadcrumb from "../../../components/BreadcrumbComponent.vue";
import UserTable from "./UsersTable.vue";
import SearchInput from "../../../components/SearchInput.vue";

export default {
    components:{
        Breadcrumb,
        UserTable,
        SearchInput,
    },
    data(){
        return {
            users:{},
            query:"",
            loading:false,
            total_users:0,
            roles:{},
            form:{
                name:"",
            },
            page_num:1,
        };
    },
    mounted(){
        this.getUsers();


    },
    methods:{

         isquery(query) {
            return (this.query = query);
          },
          openModal(val){
            // this.resetForm();
           return this.active_modal=val;
          },
          filterdata(data){
            this.users = data.users;
          },
           loadingStart(value) {
           console.log(value);
            this.loading = value;
          },
           async getUsers(page=1){
                  this.loading =true;
                  this.page_num = page;
                 const url="/management/user?page=" + page + "&query=" + this.query;
               await axios.get(url).then((res)=>{
                   this.users = res.data.users;
                   this.total_users=res.data.total_users;
                    this.roles=res.data.roles;
                   this.loading =false;
               }).catch((err)=>{
                        this.$root.alertNotificationMessage(err.response.status,err.response.data);

                  });
            },
            deleteItem(item) {
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
                axios.delete("/management/user/" + item.id).then((res) => {
                    Swal.fire("Deleted!", "Your file has been deleted.", "success");
                      this.getUsers();

                  }).catch((err)=>{
                        this.$root.alertNotificationMessage(err.response.status,err.response.data);
                   //    console.log("erro",err.response.data.message);

                  });
              }
            });
          },


    }


}
</script>

<style>
.vs-button__content {
    width: 130px;
    height: 49px;
}
.dashboard-2-main .card-body .table-bordernone .u-s-tb {
    display: inline-flex;
    align-items: center;
}
.dashboard-2-main .card-body .d-inline-block h6 {
    padding: 0 0 0 15px;
}
</style>
