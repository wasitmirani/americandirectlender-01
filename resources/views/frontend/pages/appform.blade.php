@extends('layouts.frontend.master')
@section('content')
<section class="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('frontend/assets/images/banner.png')}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h2><span>Feeling good</span> about making a difference.</h2>
                                    <p>We are here to remove obstacles that consumers often experience when trying to borrow money from a lender. Our highly trained Customer Care team will review important terms and conditions with you.</p>
                                    <a href="#">Apply For Home Purchase</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-links">
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>
            <div class="num-links">
                <ul>
                    <h3>GET IN TOUCH!</h3>
                    <li><a href="#">012 - 3456 - 7890</a></li>
                    <li><a href="#">info@lorem.com</a></li>
                </ul>
            </div>
        </div>
</section>
<section class="signup-step-container">
        <div class="container">
            @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs"  id="myTab" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Step 3</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i>Step 4</i></a>
                                </li>
                            </ul>
                        </div>

                        <form role="form" method="post" action="{{route('store.app.form')}}" class="login-box">
                        @csrf
                            <div class="tab-content" id="main_form myTabContent">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <h4 class="text-center">Step 1</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date *</label>
                                                <input type="date" class="form-control" name="date"  placeholder="Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Client Name *</label>
                                                <input class="form-control" type="text" name="name" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn next-step">Continue to next step</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <h4 class="text-center">Step 2</h4>
                                    <h5 class="text-center">To get to know our client’s needs better, we would like to ask some questions about your scenario:</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>01. Property Value: $ *</label>
                                                <input class="form-control" type="text" name="property_value" placeholder="" value="">
                                                <div id="emailHelp" class="form-text">(this can be an approximation) </div>
                                                <div class="form-group">
                                                    <label>Any updates or changes to the property (*which can change value)?</label>
                                                    <input class="form-control" type="text" name="propert_update" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>02. Property Address (if known, confirm loan limits in Lending Pad, as they are based on city/county and might be jumbo under $822k):</label>
                                                <input class="form-control" type="text" name="property_address" placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> 03. Type of Property:</label>
                                                <select  class="form-control" id="country" name="property_type">
                                                    <option value="Houese" selected="selec3ted">House</option>
                                                    <option value="Condo">Condo</option>
                                                    <option value="Townhouse">Townhouse</option>
                                                    <option value="Gated Community">Gated Community</option>
                                                    <option value="2–4-Unit Property"> 2–4-Unit Property  </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>HOA?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="yes" type="radio" name="hoa" id="flexRadioDefault1" >
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="no" name="hoa" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Any Mello-Roos/Other Fees or Special Taxes</label>
                                                <input class="form-control" type="number" name="fee" placeholder="$" value="$">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>04. Cash Out</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="cash_out" value="yes" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    </label>
                                                    <div id="emailHelp" class="form-text">(for cash out, your name needs to be on title for 6+ months)  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Refinance</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="refinance" value="yes" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    </label>
                                                    <div id="emailHelp" class="form-text">(if refinance, closing costs to be included? </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>Have You Made all Your Payments On-Time in the last 12 Months?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="yes" name="payment_assurance" id="flexRadioDefault3" >
                                                    <label class="form-check-label" for="flexRadioDefault3">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="no" name="payment_assurance" id="flexRadioDefault4">
                                                    <label class="form-check-label" for="flexRadioDefault4">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>If Payments Have Been Deferred, have you Made Payments on Time in the Last 3 Months?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_surity" id="flexRadioDefault5" value="yes">
                                                    <label class="form-check-label" for="flexRadioDefault5">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment_surity" id="flexRadioDefault6" value="no">
                                                    <label class="form-check-label" for="flexRadioDefault6">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Purchase</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="yes" id="defaultCheck2" name="purchase">
                                                    <label class="form-check-label" for="defaultCheck2">
                                                    </label>
                                                    <div id="emailHelp" class="form-text">(*Closing costs cannot be financed on new purchase)</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>05. Do You Have a Second Loan? </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="second_loan" value="yes" id="flexRadioDefault7" >
                                                    <label class="form-check-label" for="flexRadioDefault7">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="second_loan" value="no" id="flexRadioDefault8">
                                                    <label class="form-check-label" for="flexRadioDefault8">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label>If Yes, </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_second_loan" value="payoff" id="flexRadioDefault9" >
                                                    <label class="form-check-label" for="flexRadioDefault9">
                                                        Payoff
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_second_loan" value="subordinate" id="flexRadioDefault10">
                                                    <label class="form-check-label" for="flexRadioDefault10">
                                                        Subordinate
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li>
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3">
                                    <h4 class="text-center">Step 3</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>06. Loan Amount:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="loan_amount" value="0-548k" id="flexRadioDefault11" >
                                                    <label class="form-check-label" for="flexRadioDefault11">
                                                        0-548k
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="loan_amount"  value="0-548k" id="flexRadioDefault12">
                                                    <label class="form-check-label" for="flexRadioDefault12">
                                                        0-548k
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="loan_amount"  value="$822k+" id="flexRadioDefault13">
                                                    <label class="form-check-label" for="flexRadioDefault13">
                                                        $822k+
                                                    </label>
                                                </div>
                                                <div id="emailHelp" class="form-text">(*category A has lowest rates, then followed by category B and then C)</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>07. Cash Reserves</label>
                                                <input class="form-control" type="number" name="cash_reserve"  placeholder="$" value="$">
                                                <div id="emailHelp" class="form-text">(this can be approximate, not held after escrow close, jumbo/investment loans usually require 6-12 months depending on the program (must be checked later)) </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>08. FICO Score(s): *</label>
                                                <input class="form-control" type="text" name="fico_one" placeholder="Experian______">
                                                <input class="form-control" type="text" name="fico_two" placeholder="Equifax______">
                                                <input class="form-control" type="text" name="fico_three" placeholder="Transunion______">
                                                <div id="emailHelp" class="form-text">(*we use the middle score) </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>09. Loan Doc Type:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="loan_doc_type" value="full"  id="flexRadioDefault14" >
                                                    <label class="form-check-label" for="flexRadioDefault14">
                                                        Full
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="loan_doc_type" value="bank_statement" id="flexRadioDefault15">
                                                    <label class="form-check-label" for="flexRadioDefault15">
                                                        Bank Statements
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="loan_doc_type" value="no_doc" id="flexRadioDefault16">
                                                    <label class="form-check-label" for="flexRadioDefault16">
                                                        No Doc
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>10. Occupant: </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="occupant" value="owner" id="flexRadioDefault17" >
                                                    <label class="form-check-label" for="flexRadioDefault17">
                                                        Owner
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="occupant" value=investment" id="flexRadioDefault18">
                                                    <label class="form-check-label" for="flexRadioDefault18">
                                                        Investment/Tenant
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>11. Income Type:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="income_type" value="w-2" id="flexRadioDefault19" >
                                                    <label class="form-check-label" for="flexRadioDefault19">
                                                        W-2
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="income_type" value="1099" id="flexRadioDefault20">
                                                    <label class="form-check-label" for="flexRadioDefault20">
                                                        1099
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Please explain/clarify any other applicable sources of income:</label>
                                                    <input class="form-control" type="text" name="icome_source" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>12. Please Note any Recent Promotions, Changes in Salary, and Whether You are Paying Yourself:</label>
                                                <input class="form-control" type="text" name="promotion_detail" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>13. If a Business, which type?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_type" value="DBA" id="flexRadioDefault21" >
                                                    <label class="form-check-label" for="flexRadioDefault21">
                                                        DBA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_type" value="LLC" id="flexRadioDefault22">
                                                    <label class="form-check-label" for="flexRadioDefault22">
                                                        LLC
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_type" value="C-Corp" id="flexRadioDefault23">
                                                    <label class="form-check-label" for="flexRadioDefault23">
                                                        C-Corp
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_type" value="C-Corp" id="flexRadioDefault24">
                                                    <label class="form-check-label" for="flexRadioDefault24">
                                                        C-Corp
                                                    </label>
                                                </div>
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_type" value="" id="flexRadioDefault25">
                                                    <label class="form-check-label" for="flexRadioDefault25">
                                                        C-Corp
                                                    </label>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>14. Is Business Listed Online or on Social Media?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_oline" value="yes" id="flexRadioDefault26" >
                                                    <label class="form-check-label" for="flexRadioDefault26">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_oline" value="no" id="flexRadioDefault27">
                                                    <label class="form-check-label" for="flexRadioDefault27">
                                                        No
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label> If not, why?</label>
                                                    <input class="form-control" type="text" name="is_online_reason" placeholder="">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>15. Tax Returns Provided:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tax_return_provided" value="yes" id="flexRadioDefault28" >
                                                    <label class="form-check-label" for="flexRadioDefault28">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tax_return_provided" value="no" id="flexRadioDefault29">
                                                    <label class="form-check-label" for="flexRadioDefault29">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>16. List Any Recently Closed/Opened Business(es): </label>
                                                <input class="form-control" type="text" name="recent_busines" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label> 17. Number of Years in Same Line of Business:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_line" value="1-2 Year(s)" id="flexRadioDefault30" >
                                                    <label class="form-check-label" for="flexRadioDefault30">
                                                        1-2 Year(s)
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_line" value="2-5 Years 2-5 Years" id="flexRadioDefault31">
                                                    <label class="form-check-label" for="flexRadioDefault31">
                                                        2-5 Years 2-5 Years
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="business_line" value="5+ Years" id="flexRadioDefault32">
                                                    <label class="form-check-label" for="flexRadioDefault32">
                                                        5+ Years
                                                    </label>
                                                </div>
                                                <div id="emailHelp" class="form-text">(*2 years required unless you received a recent degree, certificate, training etc.) </div>
                                                <div class="form-group">
                                                    <label> Please advise:</label>
                                                    <input class="form-control" type="text" name="advice" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>18.  Are any Business Partners a Spouse/Domestic/Civil Partner? </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_business_partner" id="flexRadioDefault33" >
                                                    <label class="form-check-label" for="flexRadioDefault33">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="is_business_partner" id="flexRadioDefault34">
                                                    <label class="form-check-label" for="flexRadioDefault34">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label>19. Credit/Financial History:</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="financial_history" value="Foreclosure" id="flexRadioDefault35" >
                                                    <label class="form-check-label" for="flexRadioDefault35">
                                                        Foreclosure
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="financial_history" value="Bankruptcy" id="flexRadioDefault36">
                                                    <label class="form-check-label" for="flexRadioDefault36">
                                                        Bankruptcy
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="financial_history" value="Late Payment" id="flexRadioDefault37">
                                                    <label class="form-check-label" for="flexRadioDefault37">
                                                        Late Payment
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="financial_history" value="Collection" id="flexRadioDefault38">
                                                    <label class="form-check-label" for="flexRadioDefault38">
                                                        Collection
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>20. If Investment Property: </label>
                                                <label>Monthly Rent $ </label>
                                                <input class="form-control" type="number" name="investment_property" placeholder="$" value="$">
                                            </div>
                                            <label>Renovation</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="renovation" value="yes" id="flexRadioDefault365" >
                                                <label class="form-check-label" for="flexRadioDefault365">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="renovation" value="no" id="flexRadioDefault375">
                                                <label class="form-check-label" for="flexRadioDefault375">
                                                    No
                                                </label>
                                            </div>
                                            <label>Mortgage Statement Provided:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="mortgage" value="yes" id="flexRadioDefault385" >
                                                <label class="form-check-label" for="flexRadioDefault385">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="mortgage" value="no" id="flexRadioDefault395">
                                                <label class="form-check-label" for="flexRadioDefault395">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li>
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <h4 class="text-center">Step 4</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>21. Is Property Insured:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="property_insured" value="yes" id="flexRadioDefault365" >
                                                <label class="form-check-label" for="flexRadioDefault365">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="property_insured" value="no" id="flexRadioDefault375">
                                                <label class="form-check-label" for="flexRadioDefault375">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>22. List all Liabilities/Liens/Loans/Investments/Cosign on Loans: </label>
                                                <textarea  class="form-control" id="" cols="30" rows="10" name="liabilities_loans"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <strong>*NOTE: Processors, convey to clients that typically it takes 2-4 weeks to close on loans, but
                                            in cases with subordinations and rapid re-score, it will take longer!!! Please set/manage
                                            expectations accordingly!!!</strong>
                                        </div>
                                    </div>

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="submit" class="default-btn next-step">Finish</button></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('scripts')
<script>


</script>
@endsection
