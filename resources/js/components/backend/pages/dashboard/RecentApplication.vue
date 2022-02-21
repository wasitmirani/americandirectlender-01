<template>
   <div>
       <div class="row">
            <div class="table-responsive">
            <h5>Recent Applications</h5>
            <table class="table table-bordernone">
              <thead>
                <tr>
                  <th>Application Name</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="app in apps" :key="app.id">
                  <td>
                    <div class="media">
                      <img
                        class="img-fluid rounded-circle"
                        src=""
                        alt=""
                        data-original-title=""
                        title=""
                      />
                      <div class="media-body recent-" >
                       <router-link :to="{ name: 'show-application', params: { id: app.id } }"><span>{{ app.name }}<i class="icofont icofont-link-alt"></i></span></router-link>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p v-if="app.status === '1'" class="badge rounded-pill pill-badge-success">Approved</p>
                    <p v-if="app.status === '0'" class="badge rounded-pill pill-badge-warning">In Proccess</p>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>

</div>
</template>
<script>
 export default{
     props:['apps']
 }
</script>
