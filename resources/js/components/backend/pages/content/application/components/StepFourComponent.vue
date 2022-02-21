<template>
   <div>
        <div class="setup-content" id="step-4" style="">

            <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Is Property Insured:</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="radio11" type="radio" name="property_insured" :selected="application.property_insured" value="yes" v-model="application.property_insured">
                                <label class="form-check-label" for="radio11">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="radio22" type="radio" name="property_insured" :selected="application.property_insured" value="no" v-model="application.property_insured">
                                <label class="form-check-label" for="radio22">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
             <div class="mb-3">
                <label class="col-form-label">List all Liabilities/Liens/Loans/Investments/Cosign on Loans</label>
                <textarea class="form-control" v-model="application.liabilities_loans"></textarea>
            </div>



        </div>

   </div>
</template>
<script>
    export default{
        props:['application','handleFileUpload'],


      }
</script>

