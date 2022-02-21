<template>
   <div>
       <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="col-sm-12 col-xl-12">
                          <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                       <h5>Assign To Agent</h5>
                                    </div>
                                    <div class="card-body">
                                        <form class="theme-form">
                                            <div class="mb-3">
                                               <!-- <label class="col-form-label" for="recipient-name">Application:</label>
                                               <vs-input v-model="app" placeholder=""></vs-input> -->

                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Agents:</label>
                                                <vs-select primary filter   collapse-chips placeholder="Agents"  v-model="agent"  v-if="agents.length>0">
                                                    <vs-option v-for="item in agents" :key="item.id"  :label="item.name" :value="item.id" >
                                                        {{ item.name }}
                                                    </vs-option>
                                                </vs-select>
                                            </div>
                                            <vs-button color="rgb(30, 32, 79)" gradient  type="submit" @click="assignAgent">
                                               Submit
                                            </vs-button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                </div>
   </div>
</template>
<script>
export default{
    props:['agents']
}
</script>
