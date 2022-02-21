<template>
  <div>
    <BreadCrumb activename="My Apps"></BreadCrumb>
     <div class="container-fluid">
            <div class="row project-cards">

              <div class="col-sm-12">
                <div class="card">

                  <div class="card-body">

                    <div class="tab-content" id="top-tabContent">
                      <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="row">
                            <SearchInput :apiurl="'/customer/applications?page=' +this.page_num"
                                        v-on:query="isquery($event)"
                                        v-on:loading="loadingStart($event)"
                                        v-on:reload="getApplications()"
                                        v-on:filterList="filterdata($event)"
                                        label="Search Applications">
                            </SearchInput>
                        <div class="col-xxl-12 col-lg-12" >
                          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">App Name</th>
                  <th scope="col">Property Type</th>
                  <th scope="col">Property Value</th>
                  <th scope="col">Status</th>
                  <th scope="col">Income Type</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="application in applications" :key="application.id" >
                  <th scope="row">{{ application.id }}</th>
                  <td>{{ application.name }}</td>
                  <td>{{ application.property_type }}</td>
                  <td>${{ application.property_value }}</td>
                   <td>
                <div
                  class="span badge rounded-pill pill-badge-success"
                  v-if="application.status == 1"
                >
                  Approved
                </div>
                <div class="span badge rounded-pill pill-badge-warning" v-else>
                  Pending
                </div>
              </td>
              <td> {{ application.income_type }}</td>
              <td>
                <vs-button success icon :to="{ name: 'show-application', params: { id: application.id } }">
                   <i class="fas fa-eye"></i>
                </vs-button>
         
              </td>
                </tr>
              </tbody>
            </table>
          </div>
                        </div>
                        <pagination :data="applications" @pagination-change-page=" getApplications"></pagination>
                        <h6 class="text-center text-warning" v-if="applications.length < 1">No Application Found</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
  </div>
</template>
<script>
 import BreadCrumb from "../../../components/BreadcrumbComponent.vue";
import AppDetail from "./components/AppDetail.vue";
 import SearchInput from "../../../components/SearchInput.vue";
 export default{
    components:{
        BreadCrumb,
        AppDetail,
        SearchInput
    },
    data(){
        return{
        applications:{},
        query:"",

        }
    },
     methods:{
             isquery(query) {
            return (this.query = query);
          },

        loadingStart(value) {

            this.loading = value;
          },
          filterdata(data){
            this.applications=data.applications.data;
          },

     },
    mounted(){
           axios.get('my/applications').then((res)=>{
                this.applications = res.data.applications

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
