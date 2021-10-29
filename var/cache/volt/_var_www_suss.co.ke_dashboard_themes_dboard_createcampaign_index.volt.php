<div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-chart-line icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Create Campaign
                    <div class="page-title-subheading"> </div>
                </div>
            </div>
            <div class="page-title-actions">
                
            </div>    
        </div>
    </div>    
    
    
    <div class="row">

        <div class="col-lg-8 col-md-12 col-12 ">


            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Campaign Details</h5>

                   
     

                    <form class="" action="/createCampaign/create" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="doadd" value="y"> 
                        <!-- input type="hidden" name="ct" value="y" -->   

                        <div class="position-relative form-group"><label for="campaign-name" class="">Campaign Name:</label>
                            <input name="campaign-name" id="campaign-name" value="" placeholder="Campaign Name" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="target-url" class="">Target URL:</label>
                            <input name="target-url" id="target-url" placeholder="example: https://example.com/?clickid=${SUBID}" type="url" class="form-control">
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Campaign Type:</label>
                                    <select name="direction-campaign-type" id="exampleSelect" class="form-control">
                                        <option value="onclick">Pop Ads</option> 
                                        <option value="nativeads">Nativeads for Push Notifications</option>
                                        <option value="native">Native for Interstitial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Campaign Status:</label>
                                    <select name="campaign-status" id="campaign-status" class="form-control">
                                        <option value="1">Draft</option> 
                                        <option value="2">Moderation</option> 
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Start Date:</label>
                                    <input name="start-date" id="start-date" value="" placeholder="Start Date" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Expiry Date:</label>
                                    <input name="expiry-date" id="expiry-date" value="" placeholder="Expiry Date" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                     
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Target Countries:</label>
                                    <select multiple name="target-countries[]" id="target-countries" class="form-control" size="9">                          
                                        <option value="ao">Angola</option> 
                                        <option value="cm">Cameroon</option> 
                                        <option value="td">Chad</option> 
                                        <option value="cd">Democratic Republic of the Congo</option> 
                                        <option value="ke">Kenya</option> 
                                        <option value="mg">Madagascar</option>              
                                        <option value="mw">Malawi</option> 
                                        <option value="ng">Nigeria</option> 
                                        <option value="rw">Rwanda</option> 
                                        <option value="za">South Africa</option> 
                                        <option value="tz">Tanzania</option> 
                                        <option value="ug">Uganda</option> 
                                        <option value="zm">Zambia</option> 
                                    </select> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Is Adblock Buy?:</label>
                                    <select name="is-adblock-buy" id="is-adblock-buy" class="form-control">
                                        <option value="0">No</option> 
                                        <option value="1">Yes</option> 
                                    </select>
                                </div>
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Timezone:</label>
                                    <select name="time-zone" id="time-zone" class="form-control">
                                        <option value="-4">-4</option> 
                                        <option value="-3">-3</option> 
                                        <option value="-2">-2</option> 
                                        <option value="-1">-1</option> 
                                        <option value="0">0</option> 
                                        <option value="1">+1</option> 
                                        <option value="2">+2</option> 
                                        <option value="3" selected>+3</option> 
                                        <option value="4">+4</option> 
                                    </select>
                                </div>
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Rates:</label>
                                    <div class="input-group">                                
                                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                        <input value="0.01" step="0.01" type="number" name="rate-amount" id="rate-amount" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <hr>
                            </div> 
                        </div>
  
                        <div class="form-row">
                            <h2>Creatives</h2> 
                        </div>

                        <div class="position-relative form-group"><label for="creative-title" class="">Creative Title:</label>
                            <input name="creative-title" id="creative-title" value="" placeholder="Creative Title" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label for="creative-description" class="">Creative Description:</label>
                            <input name="creative-description" id="creative-description" placeholder="Creative Description" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group"><label for="creative-icon" class="">Creative Icon:</label>
                            <input name="creative-icon" id="creative-icon" value="" placeholder="Creative Icon" type="file" class="form-control-file">
                        </div>
                        <div class="position-relative form-group">
                            <label for="creative-image" class="">Creative Image:</label>
                            <input name="creative-image" id="creative-image" placeholder="Creative Image" type="file" class="form-control-file">
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <hr> 
                            </div> 
                        </div>
 
                        <div class="form-row">
                            <div class="col-md-12">
                                <hr>
                                <button class="mt-1 btn btn-primary btn-lg">Submit</button>
                            </div> 
                        </div>
  
                    </form>
                </div>

            </div>

        </div>

    </div>