<template>
  <div>
    <Breadcrumb activename="Approved Apps"></Breadcrumb>
    <div class="container-fluid">
      <div class="row">
        <div class="card-body">
                <SearchInput :apiurl="'/customer/applications?page=' +this.page_num"
                    v-on:query="isquery($event)"
                    v-on:loading="loadingStart($event)"
                    v-on:reload="getApplications()"
                    v-on:filterList="filterdata($event)"
                    label="Search Applications">
                </SearchInput>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">App Name</th>
                  <th scope="col">Agent Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="application in applications" :key="application.id" >
                  <th scope="row">{{ application.id }}</th>
                  <td>{{ application.name }}</td>
                  <td>
                    <span v-for="user in application.agent" :key="user.id">
                        <div class="span badge rounded-pill pill-badge-primary ml-2 mr-2" >
                            <span class="span-name"> {{ user.name }}</span>
                        </div>
                    </span>
                  </td>
                  <td>
                    <a role="button" @click="deleteItem(application.id)"
                      ><i class="fa fa-trash text-danger"></i
                    ></a>
                <router-link :to="{ name: 'assign-apps', params: { id: application.id } }">
                    <i class="fa fa-edit text-success"></i>
                </router-link>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Breadcrumb from "../../../components/BreadcrumbComponent.vue";
import SearchInput from "../../../components/SearchInput.vue";
export default {
  components: {
    Breadcrumb,
    SearchInput
  },
  data() {
    return {
      applications: {},
       query:"",
       page_num : "",
       loading:false,

    };
  },
  mounted() {
    this.getApplications();
  },
  methods: {
        isquery(query) {
            return (this.query = query);
        },
        loadingStart(value) {
            this.loading = value;
        },
        filterdata(data){
            this.applications = data.applications.data;
        },
    async getApplications(page = 1) {
      this.loading = true;
      this.page_num = page;
      const url = "/assigned/app?page=" + page + "&query=" + this.query;
      await axios
        .post(url)
        .then((res) => {
          this.applications = res.data.assignedApps.data;
          this.loading = false;
        })
        .catch((err) => {
          this.$root.alertNotificationMessage(
            err.response.status,
            err.response.data,
            this.loading =false
          );
        });
    },
    deleteItem: function (id) {
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
          let form_data = new FormData();
          form_data.append("id", id);
          axios
            .post("/delete/app", form_data)
            .then((res) => {
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
            })
            .catch((err) => {
              this.$root.alertNotificationMessage(
                err.response.status,
                err.response.data
              );
            });
        }
      });
    },
  },

};
</script>
<style>
</style>
