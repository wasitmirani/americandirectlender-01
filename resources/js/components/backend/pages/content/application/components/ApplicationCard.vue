<template>
  <div class="mt-2">
    <!-- <div class="project-box">
      <span class="badge badge-primary" style="margin-right: 31px">
        <router-link
          :to="{ name: 'show-application', params: { id: application.id } }"
          ><i class="fa fa-eye text-light"></i
        ></router-link>
      </span>
      <span class="badge badge-primary">
        <router-link
          :to="{ name: 'update-application', params: { id: application.id } }"
          ><i class="fa fa-edit text-light"></i
        ></router-link>
      </span>

      <h6>{{ application.name }}</h6>

      <div class="media">
        <div class="media-body">
          <p></p>
        </div>
      </div>
      <p>{{ application.property_detail }}.</p>
      <div class="row details">
        <div class="col-6"><span>Property Value</span></div>
        <div class="col-6 font-primary">{{ application.property_value }}</div>
        <div class="col-6"><span>Property Type</span></div>
        <div class="col-6 font-primary">{{ application.property_type }}</div>
        <div class="col-6"><span>Property Update</span></div>
        <div class="col-6 font-primary">{{ application.property_update }}</div>
      </div>
      <div class="customers">
        <ul>
          <!-- <li class="d-inline-block"><img class="img-30 rounded-circle" src="assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                  <li class="d-inline-block"><img class="img-30 rounded-circle" src="assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                  <li class="d-inline-block"><img class="img-30 rounded-circle" src="assets/images/user/1.jpg" alt="" data-original-title="" title=""></li> -->
    <!-- <li class="d-inline-block ms-2">
                                    <p class="f-12">+10 More</p>
                                  </li>
        </ul>
      </div>
      <div class="project-status mt-4">
        <div class="media mb-0">
          <p v-if="application.status == '1'">Assigned</p>
          <p v-if="application.status == '0'">Pending</p>
          <div class="media-body text-end"><span></span></div>

          <router-link
            :to="{ name: 'assign-apps', params: { id: application.id } }"
          >
            <vs-button> Assign </vs-button>
          </router-link>
        </div>
      </div>
    </div> -->
    <!-- <vs-alert shadow>
      <template #title> {{ application.name }} </template>

      <template #footer>
        <vs-button flat danger> Cancel </vs-button>
        <vs-button v-if="application.status == 1"> Accept </vs-button>
      </template>
    </vs-alert> -->
    <strong>{{ application.created_at | dateformat }}</strong>

    <vs-alert shadow>
      <template #title>
          <router-link :to="{ name: 'show-application', params: { id: application.id } }" class="name">
        {{ application.name }}
        </router-link>
        <div style="float: right">
            <vs-button success icon :to="{ name: 'show-application', params: { id: application.id } }">
              <i class="fas fa-eye"></i>
            </vs-button>
            <vs-button primary icon  :to="{ name: 'update-application', params: { id: application.id } }" v-if="role == 'admin'">
              <i class="fas fa-edit"></i>
            </vs-button>
        </div>
      </template>

      <span>{{ application.property_detail }}</span>
      <div class="user-status table-responsive">
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
        <table class="table table-bordernone">
          <thead>
            <tr>
              <th scope="col">Property Type</th>
              <th scope="col">Property Value</th>
              <th scope="col">Status</th>
              <th scope="col">Income Type</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="span badge rounded-pill pill-badge-primary">
                  {{ application.property_type }}
                </div>
              </td>
              <td class="f-w-600">${{ application.property_value }}</td>

              <td >

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

              <td>
                <div class="span badge rounded-pill pill-badge-primary">
                  {{ application.income_type }}
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <template #footer>
        <vs-button flat danger @click="deleteItem(application.id)"> Cancel </vs-button>
        <div v-if="role == 'admin'">
        <router-link :to="{ name: 'assign-apps', params: { id: application.id ,role: role } }">
          <vs-button v-if="application.status == '0'"> Accept </vs-button>
        </router-link>
        </div>
        <div v-if="role == 'agent' || 'customer'" >
            <vs-button success  :to="{ name: 'assign-apps', params: { id: application.id ,role: role, user:application.user_id  } }"> Modify </vs-button>
        </div>

      </template>
    </vs-alert>
    <ul class="pagination pagination-primary mt-4">
      <pagination
        :data="application"
        :limit="5"
        @pagination-change-page="getApplications"
      ></pagination>
    </ul>
  </div>
</template>
<script>
export default {
  props: [
    "application",
    "getApplications",
    "roles",
    "role",
    "getRoles",
    "applications",
  ],

  data() {
    return {
      app: "",
      agent: "",
      comment: "",
      active: false,
      loading:false,
    };
  },
  methods: {
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
            .post("/delete/application", form_data)
            .then((res) => {
                this.getApplications();
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
    openModal(val) {
      this.resetForm();
      return (this.active_modal = val);
    },
    resetForm() {
      this.active_modal = false;
    },
    updateStatus: function () {
      let formData = new FormData();

      formData.append("app", this.app);
      formData.append("agent", this.agent);

      axios
        .put("/update/status/" + this.application.id, formData)
        .then((res) => {
          this.$root.alertNotificationMessage(
            res.status,
            "Status has been updated successfully"
          );
          setTimeout(() => {
            this.$router.push({ name: "users" });
          }, 1000);
        })
        .catch((err) => {
          if (err.response.status == 422) {
            this.errors = err.response.data.errors;
            return this.$root.alertNotificationMessage(
              err.response.status,
              err.response.data.errors
            );
          }
          this.$root.alertNotificationMessage(
            err.response.status,
            err.response.data
          );
        });
    },
    onSubmit() {
      let formData = new FormData();

      formData.append("app", this.app);
      formData.append("agent", this.agent);
      axios
        .post("/assign/app", formData)
        .then((res) => {
          this.$root.alertNotificationMessage(
            res.status,
            "Application Assigned To Agent successfully"
          );
          setTimeout(() => {
            this.$router.push({ name: "users" });
          }, 1000);
        })
        .catch((err) => {
          if (err.response.status == 422) {
            this.errors = err.response.data.errors;
            return this.$root.alertNotificationMessage(
              err.response.status,
              err.response.data.errors
            );
          }
          this.$root.alertNotificationMessage(
            err.response.status,
            err.response.data
          );
        });
    },
    mounted(){

        console.log(this.application)

    }
  },

};
</script>

<style>
.vs-card-content.type-3 .vs-card {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  max-width: 100%;
}
.vs-button__content {
  /* width: ; */
  /* height:  !important; */
}
a{
    text-decoration: none;
}
</style>
