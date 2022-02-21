<template>
  <div>
<Breadcrumb activename="Create App" ></Breadcrumb>
<CreateApp></CreateApp>

  </div>
</template>
<script>
import Breadcrumb from "../../../components/BreadcrumbComponent.vue";
import CreateApp from "./components/CreateApp.vue";
export default{
    components:{
        Breadcrumb,
        CreateApp
    },

}
</script>
<style>
</style>
