<template>
   <div>
       <h1>Upload File</h1>
        <div class="centerx">
            <div class="centerx">
              <input  type="file" multiple class="form-control-file">
              <vs-button >

              </vs-button>
            </div>
        </div>
   </div>
</template>
<script>
export default{

    methods:{
          uploadFile(){
                let formData = new FormData();
                formData.append('thumbnail', this.thumbnail);
                axios.post('/upload/file',formData).then((res)=>{
                        this.$root.alertNotificationMessage(res.status,"File Uploaded Successfully");
                            setTimeout(() => {
                            this.$router.push({ name: 'assign-apps' })
                        }, 1000);

                    }).catch((err)=>{
                        if(err.response.status==422){
                            this.errors=err.response.data.errors;
                            return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                        }
                    this.$root.alertNotificationMessage(err.response.status,err.response.data);

                });

            },
    }


}
</script>
