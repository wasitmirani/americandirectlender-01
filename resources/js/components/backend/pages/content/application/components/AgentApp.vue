<template>
<div class="mt-2">
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

        </div>
      </template>

      <span>{{ application.property_detail }}</span>
      <div class="user-status table-responsive">

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

        <div>
            <vs-button success  :to="{ name: 'assign-apps', params: { id: application.id ,role: 'agent', user:application.user_id  } }"> Modify </vs-button>
        </div>

      </template>
    </vs-alert>
    <ul class="pagination pagination-primary mt-4">

    </ul>


</div>
</template>
<script>
   export default{
       props:['application']

   }
</script>
