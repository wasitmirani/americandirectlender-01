<template>
    <div>
      <div class="setup-content" id="step-1" style="">
            <div class="mb-3 container">
            <div class="row">
                <div class="col-xl-6">
                  <label class="col-form-label">Client Name</label>
                  <input  type="text" class="form-control" placeholder="your Name" v-model="application.name"></input>
                </div>


                <div class="col-xl-6">
                <label class="col-form-label">Date Of Application</label>
                <input class="form-control" type="date" placeholder="" value="application.date" v-model="application.date">
              </div>

                </div>

            </div>
      </div>
    </div>
  </template>
  <script>
export default {
  props: ["application"],
};
</script>
