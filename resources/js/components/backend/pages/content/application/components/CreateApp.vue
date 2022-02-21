<template>
  <div>
       <div class="container">
      <form-wizard @on-complete="onComplete" color="#4b4d72">
        <h2 slot="title">Create Application</h2>
        <tab-content title="Step One" color="#4b4d72" >
            <div class="setup-content" id="step-1" style="">
                <div class="mb-3 container">
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="col-form-label">Client Name</label>
                            <input  type="text" class="form-control" placeholder="your Name" v-model="application.name" required></input>
                        </div>
                        <div class="col-xl-6">
                            <label class="col-form-label">Date Of Application</label>
                            <input class="form-control" type="date" placeholder="" value="application.date" v-model="application.date" requird>
                        </div>
                    </div>
                </div>
            </div>
        </tab-content>
        <tab-content title="Step Two" >
            <div class="setup-content" id="step-2">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="col-form-label">Property Value: $ *</label>
                            <input class="form-control" type="text"  value="" placeholder="$" v-model="application.property_value" required>
                            (this can be an approximation)
                        </div>
                        <div class="col-xl-6">
                            <label class="col-form-label">Any updates or changes to the property (*which can change value)?</label>
                            <input class="form-control" type="text" placeholder="" v-model="application.property_update" required >
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="col-form-label">Property Address (if known, confirm loan limits in Lending Pad, as they are based on city/county and might be jumbo under $822k):</label>
                            <input class="form-control" type="text" placeholder="" v-model="application.property_address" required>
                        </div>
                        <div class="col-xl-6">
                        <label  class="col-form-label">Type Of Property</label>
                    <select class="form-control" v-model="application.property_type">
                        <option :selected="application.property_type === 'House'"  value="House">House</option>
                        <option :selected="application.property_type === 'Condo'" value="Condo">Condo</option>
                        <option :selected="application.property_type === 'TownHouse'" value="TownHouse">Town House</option>
                        <option :selected="application.property_type === 'GatedCommunity'" value="GatedCommunity">Gated Community</option>
                        <option :selected="application.property_type === 'GatedCommunity'" value="2-4-unit-property">2-4-unit-property</option>
                    </select>
                        </div>

                    </div>

                </div>

                <div class="col-auto">
                 <div class="row">
                     <div class="col-xl-6">
                           <fieldset class="mb-3">
                    <div class="row">

                        <label class="col-form-label">HOA?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="hoa1"  type="radio" :selected="application.hoa === 'yes'" name="hoa" value="yes" v-model="application.hoa" required>
                                <label class="form-check-label" for="hoa1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="hoa2" type="radio" :selected="application.hoa === 'no'" name="hoa" value="no" v-model="application.hoa" required>
                                <label class="form-check-label" for="hoa2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                     </div>
                     <div class="col-xl-6">
                           <div class="col-auto">
                    <label class="form-check-label">Any Mello-Roos/Other Fees or Special Taxes</label>
                    <input class="form-control" type="number" v-model="application.fee">
                </div>
                     </div>
                 </div>

                </div>

                <div class="row mb-0">

                    <div class="col-xl-6">
                              <label class="col-sm-3 col-form-label pb-0">Cash Out</label>
                <div class="col-sm-9">
                    <div class="mb-0">
                        <div class="form-check form-check-inline checkbox checkbox-primary">
                            <input class="form-check-input" id="cash-out"  value="yes" type="checkbox"  v-model="application.cash_out" :checked="application.cash_out == 'yes'"  required>
                            <label class="form-check-label" for="cash-out">Yes</label>
                          (for cash out, your name needs to be on title for 6+ months)
                        </div>
                    </div>
                </div>

                    </div>
                     <div class="col-xl-6">
                             <label class="col-sm-3 col-form-label pb-0">Refinance</label>
                <div class="col-sm-9">
                    <div class="mb-0">
                        <div class="form-check form-check-inline checkbox checkbox-primary">
                            <input class="form-check-input" id="refinance"  value="yes" type="checkbox"  v-model="application.refinance">
                            <label class="form-check-label" for="refinance">Yes</label>
                            (if refinance, closing costs to be included?)
                        </div>
                    </div>
                </div>
            </div>
                </div>
                <div class="col-auto">
                    <div class="col-xl-6">
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
                     <div class="col-xl-6">
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

                     </div>


                </div>

                <div class="row mb-0">
                    <div class="col-xl-6">
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
                    <div class="col-xl-6">
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
                    </div>

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
        </tab-content>
        <tab-content title="Step Three">
            <div class="setup-content" id="step-3" style="">
                <div class="col-auto">
                    <div class="row">
                        <div class="col-xl-6">
                            <fieldset class="mb-3">
                           <div class="row">
                        <label class="col-form-label">Loan Amount</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="loan_amount1" type="radio"  name="loan_amount"  value="0-548k" :selected="application.loan_amount == '0-548k'"  v-model="application.loan_amount">
                                <label class="form-check-label" for="loan_amount1">0-548k</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="loan_amount2" type="radio" name="loan_amount"  value="0-548k" :selected="application.loan_amount == '0-548k'" v-model="application.loan_amount">
                                <label class="form-check-label" for="loan_amount2">0-548k</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="loan_amount2" type="radio" name="loan_amount"  value="$822k+" :selected="application.loan_amount == '$822k+'" v-model="application.loan_amount">
                                <label class="form-check-label" for="loan_amount2">$822k+</label>
                            </div>
                            (*category A has lowest rates, then followed by category B and then C)
                        </div>
                    </div>
                      </fieldset>
                        </div>
                        <div class="col-xl-6">
                              <div class="mb-3">
                <label class="col-form-label">Cash Reserve</label>
                <input class="form-control" type="number" placeholder="$" value="" v-model="application.cash_reserve" >
                (this can be approximate, not held after escrow close, jumbo/investment loans usually require 6-12 months depending on the program (must be checked later))
            </div>
                        </div>
                    </div>

            </div>

             <div class="mb-3">
                <label class="col-form-label">FICO Score(s): *</label>
                <div class="row">
                    <div class="col-3">
                         <input class="form-control" type="text" placeholder="Experian___"  v-model="application.fico_one">
                    </div>
                    <div class="col-3">
                         <input class="form-control" type="text" placeholder="Equifax___" v-model="application.fico_two">
                    </div>
                    <div class="col-3">

                <input class="form-control" type="text" placeholder="Transunion___" v-model="application.fico_three">

                    </div>
                </div>
                (*we use the middle score)
            </div>
                <div class="col-auto">
                    <div class="row">
                         <div class="col-xl-6">
                          <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Loan Doc Type</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="loan_doc1" type="radio" name="loan_doc" value="Full" :selected="application.doc_type == 'Full'" v-model="application.doc_type">
                                <label class="form-check-label" for="loan_doc1">Full </label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="loan_doc2" type="radio" name="loan_doc" value="Bank Statement" :selected="application.doc_type == 'Bank Statement'" v-model="application.doc_type">
                                <label class="form-check-label" for="loan_doc2">Bank Statement</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="loan_doc3" type="radio" name="loan_doc" value="No Doc" :selected="application.doc_type == 'No Doc'" v-model="application.doc_type">
                                <label class="form-check-label" for="loan_doc3">No Doc</label>
                            </div>

                        </div>
                    </div>
                </fieldset>
                    </div>
                     <div class="col-xl-6">
                               <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Occupant</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="occupant1" type="radio" name="occupant" value="Owner" :selected="application.occupant ===  'Owner'" v-model="application.occupant">
                                <label class="form-check-label" for="occupant1">Owner </label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="occupant2" type="radio" name="occupant" value="Investment" :selected="application.occupant === 'Investment'"  v-model="application.occupant">
                                <label class="form-check-label" for="occupant2">Investment</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

                     </div>

                    </div>


            </div>

              <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <div class="col-xl-6">
                                 <label class="col-form-label">Income Type</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="income_type1" type="radio" name="income_type" value="W-2" :selected="application.income_type === 'W-2'" v-model="application.income_type">
                                <label class="form-check-label" for="income_type1">W-2 </label>
                            </div>

                        </div>
                        </div>
                        <div class="col-xl-6">
                               <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="income_type2" type="radio" name="income_type" value="1099" :selected="application.income_type === '1099'" v-model="application.income_type">
                                <label class="form-check-label" for="income_type2">1099</label>
                            </div>
                        </div>

                    </div>
                </fieldset>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-xl-6">
                        <label class="col-form-label">  Please explain/clarify any other applicable sources of income:</label>
                        <input class="form-control" type="text" placeholder="" value="" v-model="application.income_source">
                    </div>
                    <div class="col-xl-6">
                        <label class="col-form-label">Please Note any Recent Promotions, Changes in Salary, and Whether You are Paying Yourself:</label>
                        <input class="form-control" type="text" placeholder="" value="" v-model="application.recent_business_Activity">
                    </div>
                </div>

            </div>
               <div class="col-auto">
                   <div class="row">
                             <div class="col-xl-6">
                           <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">If a Business, which type?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_type1" type="radio" name="business_type" value="DBA" :selected="application.income_type === 'DBA'"   v-model="application.business_type">
                                <label class="form-check-label" for="business_type1">DBA</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_type2" type="radio" name="business_type" value="LLC" :selected="application.income_type === 'LLC'"  v-model="application.business_type">
                                <label class="form-check-label" for="business_type2">LLC</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_type3" type="radio" name="business_type" value="C-Corp" :selected="application.income_type === 'C-Corp'"  v-model="application.business_type">
                                <label class="form-check-label" for="business_type3">C-Corp</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                   </div>
                              <div class="col-xl-6">
                        <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label"> Is Business Listed Online or on Social Media?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="online1" type="radio" name="is_online" :selected="application.is_online === 'yes'"  value="yes" v-model="application.is_online">
                                <label class="form-check-label" for="online1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="online2" type="radio" name="is_online" :selected="application.is_online === 'no'"  value="no" v-model="application.is_online">
                                <label class="form-check-label" for="online2">No</label>
                            </div>

                        </div>
                    </div>
                </fieldset>
                    </div>

                   </div>



            </div>

            <div class="mb-3">
                <label class="col-form-label">If not Why?:</label>
                <input class="form-control" type="text" placeholder="" v-model="application.is_online_reason">
            </div>
            <div class="col-auto">
                <div class="row">
                      <div class="col-xl-6">
                      <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Tax Return Provided?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="tax_return1" type="radio" name="tax_return" value="yes" :selected="application.tax_return === 'yes'"  v-model="application.tax_return">
                                <label class="form-check-label" for="tax_return1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="tax_return2" type="radio" name="tax_return" value="no"  :selected="application.tax_return === 'no'" v-model="application.tax_return">
                                <label class="form-check-label" for="tax_return2">No</label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                </div>
                <div class="col-xl-6">
                      <div class="mb-3">
                <label class="col-form-label">List Any Recently Closed/Opened Business(es):</label>
                <input class="form-control" type="text" placeholder="" v-model="application.recent_business">
            </div>

                </div>

                </div>


            </div>

            <div class="col-auto">
                <div class="row">
                          <div class="col-xl-6">
                       <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Number of Years in Same Line of Business:</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_line1" type="radio" name="business_line" value="1-2 Year(s)" :selected="application.business_line === '1-2 Year(s)'"  v-model="application.business_line" >
                                <label class="form-check-label" for="business_line1">1-2 Year(s)</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_line2" type="radio" name="business_line" value="2-5 Years"  :selected="application.business_line === '2-5 Years'" v-model="application.business_line">
                                <label class="form-check-label" for="business_line2">2-5 Years </label>
                            </div>
                               <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_lin3" type="radio" name="business_line" value="5+ Years"  :selected="application.business_line === '5+ Years'" v-model="application.business_line">
                                <label class="form-check-label" for="business_lin3">5+ Years</label>
                            </div>
                            (*2 years required unless you received a recent degree, certificate, training etc.)
                        </div>
                    </div>
                </fieldset>
                </div>
                 <div class="col-xl-6">
                       <div class="mb-3">
                <label class="col-form-label">Please Advice:</label>
                <input class="form-control" type="text" placeholder="" v-model="application.advice">
            </div>

                 </div>


                </div>

            </div>

            <div class="col-auto">
                <div class="row">
                        <div class="co-xl-6">
                    <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Are any Business Partners a Spouse/Domestic/Civil Partner?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_partner1" type="radio" name="business_partner" value="yes" v-model="application.is_business_partner" :selected="application.is_business_partner === 'yes' ">
                                <label class="form-check-label" for="business_partner1">yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="business_partner2" type="radio" name="business_partner" value="no"  v-model="application.is_business_partner" :selected="application.is_business_partner === 'no'">
                                <label class="form-check-label" for="business_partner2">no</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                </div>
                <div class="co-xl-6">
                               <div class="col-auto">
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Credit/Financial History?</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="financial_history1" type="radio" name="financial_history" value="Foreclosure" :selected="application.fincial_history === 'Foreclosure'" v-model="application.financial_history">
                                <label class="form-check-label" for="financial_history1">Foreclosure</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="financial_history2" type="radio" name="financial_history" value="Bankruptcy" :selected="application.fincial_history === 'Bankruptcy'" v-model="application.financial_history">
                                <label class="form-check-label" for="financial_history2">Bankruptcy</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="financial_history3" type="radio" name="financial_history" value="Late Payment" :selected="application.fincial_history === 'Late Payment'" v-model="application.financial_history">
                                <label class="form-check-label" for="financial_history3">Late Payment</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="financial_history4" type="radio" name="financial_history" value="Collection" :selected="application.fincial_history === 'Collection'" v-model="application.financial_history">
                                <label class="form-check-label" for="financial_history4">Collection</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
                </div>


                </div>

            </div>

             <div class="mb-3">
                 <div class="row">
                     <div class="col-xl-6">
                        <label class="col-form-label">If Investment Property: Monthly Rent $:</label>
                        <input class="form-control" type="text" placeholder="$" v-model="application.investment_property">
                     </div>
                     <div class="col-xl-6">
                            <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Renovation</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="renovation1" type="radio" name="renovation" value="yes" :selected="application.renovation === 'yes'" v-model="application.renovation">
                                <label class="form-check-label" for="renovation1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="renovation2" type="radio" name="renovation" value="no" :selected="application.renovation === 'no'" v-model="application.renovation">
                                <label class="form-check-label" for="renovation2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                     </div>
                 </div>

            </div>
            <div class="col-auto">

                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label">Mortgage Statement Provided:</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="mortgage_statement1" type="radio" name="mortgage" :selected="application.mortgage_statement === 'yes'" value="yes" v-model="application.mortgage_statement">
                                <label class="form-check-label" for="mortgage_statement1">Yes</label>
                            </div>
                            <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="mortgage_statement2" type="radio" name="mortgage" :selected="application.mortgage_statement === 'no'" value="no"  v-model="application.mortgage_statement">
                                <label class="form-check-label" for="mortgage_statement2">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>


            </div>
        </tab-content>
        <tab-content title="Step Three">
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
        </tab-content>
        <!-- <vs-button >Back</vs-button> -->
        <vs-button flat danger slot="prev" size="large" > Back </vs-button>
        <vs-button slot="next" size="large" >Next</vs-button>
        <vs-button slot="finish" size="large">Create</vs-button>
      </form-wizard>
    </div>
  </div>
</template>
<script>
  export default{

   data(){
       return{
           application:{
           }
       }
   },
     methods: {

    onComplete: function () {
      let formData = new FormData();
      formData = Object.assign(this.application, formData);

      axios
        .post("customer/application", formData)
        .then((res) => {
          this.$root.alertNotificationMessage(
            res.status,
            "Application has been created successfully"
          );
          setTimeout(() => {
            this.$router.push({ name: "Customer Applications" });
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
  },

  }
</script>
<style>
.vs-input {
  width: 100%;
}
.vs-select-content {
  width: 100%;
  max-width: 100%;
}

.wizard-icon-container {
  background-color: #4b4d72;
}
.wizard-icon-circle {
  border-color: #4b4d72;
}
</style>
