<template>
    <div>
        <div class="setup-content" id="step-2">
            <div class="mb-3">
                <label class="col-form-label">Property Value: $ *</label>
                <input class="form-control" type="text"  value="" placeholder="$" v-model="application.property_value">
                (this can be an approximation)
            </div>
            <div class="mb-3">
                <label class="col-form-label">Any updates or changes to the property (*which can change value)?</label>
                <input class="form-control" type="text" placeholder="" v-model="application.property_update" >
            </div>
            <div class="mb-3">
                <label class="col-form-label">Property Address (if known, confirm loan limits in Lending Pad, as they are based on city/county and might be jumbo under $822k):</label>
                <input class="form-control" type="text" placeholder="" v-model="application.property_address">
            </div>
            <div class="col-auto">
                <label  class="col-form-label">Type Of Property</label>
                    <select class="form-control" v-model="application.property_type">
                        <option :selected="application.property_type === 'House'"  value="House">House</option>
                        <option :selected="application.property_type === 'Condo'" value="Condo">Condo</option>
                        <option :selected="application.property_type === 'TownHouse'" value="TownHouse">Town House</option>
                        <option :selected="application.property_type === 'GatedCommunity'" value="GatedCommunity">Gated Community</option>
                        <option :selected="application.property_type === 'GatedCommunity'" value="2-4-unit-property">2-4-unit-property</option>
                    </select>
            </div>
            <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">HOA?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="hoa1"  type="radio" :selected="application.hoa === 'yes'" name="hoa" value="yes" v-model="application.hoa">
                                <label class="form-check-label" for="hoa1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="hoa2" type="radio" :selected="application.hoa === 'no'" name="hoa" value="no" v-model="application.hoa">
                                <label class="form-check-label" for="hoa2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-auto">
                <label class="form-check-label">Any Mello-Roos/Other Fees or Special Taxes</label>
                <vs-input class="form-control" type="number" v-model="application.fee"></vs-input>
            </div>
                <div class="row mb-0">
                <label class="col-sm-3 col-form-label pb-0">Cash Out</label>
                <div class="col-sm-9">
                    <div class="mb-0">
                        <div class="form-check form-check-inline checkbox checkbox-primary">
                            <input class="form-check-input" id="cash-out"  value="yes" type="checkbox"  v-model="application.cash_out" :checked="application.cash_out == 'yes'">
                            <label class="form-check-label" for="cash-out">Yes</label>
                          (for cash out, your name needs to be on title for 6+ months)
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <label class="col-sm-3 col-form-label pb-0">Refinance</label>
                <div class="col-sm-9">
                    <div class="mb-0">
                        <div class="form-check form-check-inline checkbox checkbox-primary">
                            <vs-checkbox class="form-check-input" id="refinance"  value="yes" type="checkbox"  v-model="application.refinance"></vs-checkbox>
                            <label class="form-check-label" for="refinance">Yes</label>
                            (if refinance, closing costs to be included?)
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Have You Made all Your Payments On-Time in the last 12 Months?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="payment_assurance1" type="radio" name="payment_assurance" value="yes" :selected="application.payment_assurance === 'yes'" v-model="application.payment_assurance">
                                <label class="form-check-label" for="payment_assurance1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="payment_assurance2" type="radio" name="payment_assurance" value="no"  :selected="application.payment_assurance === 'no'" v-model="application.payment_assurance">
                                <label class="form-check-label" for="payment_assurance2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">If Payments Have Been Deferred, have you Made Payments on Time in the Last 3 Months?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="peyment_security1" type="radio" value="yes" :selected="application.payment_security === 'yes'" v-model="application.payment_surity" >
                                <label class="form-check-label" for="peyment_security1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="peyment_security2" type="radio"  value="no" :selected="application.payment_security === 'no'" v-model="application.payment_surity" >
                                <label class="form-check-label" for="peyment_security2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="row mb-0">
                <label class="col-sm-3 col-form-label pb-0">Purchase</label>
                <div class="col-sm-9">
                    <div class="mb-0">
                        <div class="form-check form-check-inline checkbox checkbox-primary">
                            <input class="form-check-input" id="purchase" value="yes" type="checkbox" v-model="application.purchase" >
                            <label class="form-check-label" for="purchase">Yes</label>
                            (*Closing costs cannot be financed on new purchase)
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Do You Have a Second Loan?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                  <input class="form-check-input" id="second_loan1" type="radio" :selected="application.second_loan === 'yes'"  value="yes" v-model="application.second_loan">
                                  <label class="form-check-label" for="second_loan1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                  <input class="form-check-input" id="second_loan2" type="radio"  value="no" :selected="application.second_loan === 'no'" v-model="application.second_loan">
                                  <label class="form-check-label" for="second_loan2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">If Yes</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="is_second_loan1" type="radio" value="payoff" :selected="application.is_second_loan === 'payoff'" v-model="application.is_second_loan">
                                <label class="form-check-label" for="is_second_loan1">Payoff</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="is_second_loan2" type="radio" value="subordinate" :selected="application.is_second_loan === 'subordinate'" v-model="application.is_second_loan">
                                <label class="form-check-label" for="is_second_loan2">Subordinate</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

        </div>

    </div>
</template>
  <script>
    export default{
        props:['application']

      }
  </script>

