<template>
   <div>
       <div class="row">
               <div class="col-sm-4 pe-0">
                <div class="media border-after-xs">
                  <div class="align-self-center me-3 text-start">
                    <span class="widget-t mb-1"></span>
                    <h5 class="mb-0">Total Applications</h5>
                  </div>
                  <div class="media-body align-self-center">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-arrow-down font-primary"
                    >
                      <line x1="12" y1="5" x2="12" y2="19"></line>
                      <polyline points="19 12 12 19 5 12"></polyline>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="mb-0">
                      {{ this.total_applications }}<span class="counter"></span>
                    </h5>
                    <span class="mb-1"></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 ps-0">
                <div class="media">
                  <div class="align-self-center me-3 text-start">
                    <span class="widget-t mb-1"></span>
                    <h5 class="mb-0">Approved Applications</h5>
                  </div>
                  <div class="media-body align-self-center">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-arrow-up font-primary"
                    >
                      <line x1="12" y1="19" x2="12" y2="5"></line>
                      <polyline points="5 12 12 5 19 12"></polyline>
                    </svg>
                  </div>
                  <div class="media-body ps-2">
                    <h5 class="mb-0">
                      {{ this.assigned_apps }}<span class="counter"></span>
                    </h5>
                    <span class="mb-1"></span>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 pe-0">
                <div class="media border-after-xs">
                  <div class="align-self-center me-3 text-start">
                    <span class="widget-t mb-1"> </span>
                    <h5 class="mb-0">Pending Application</h5>
                  </div>
                  <div class="media-body align-self-center">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="feather feather-arrow-up font-primary"
                    >
                      <line x1="12" y1="19" x2="12" y2="5"></line>
                      <polyline points="5 12 12 5 19 12"></polyline>
                    </svg>
                  </div>
                  <div class="media-body">
                    <h5 class="mb-0">
                      <span class="counter">{{
                        parseInt(this.total_applications) -
                        parseInt(this.assigned_apps)
                      }}</span>
                    </h5>
                    <span class="mb-1"></span>
                  </div>
                </div>
              </div>


       </div>

   </div>
</template>
<script>
   export default{
       props:['total_applications','assigned_apps']
   }
</script>
