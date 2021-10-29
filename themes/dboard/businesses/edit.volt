

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-shipping-fast icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Add Business
                <div class="page-title-subheading"> 
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block ">  
                {{ link_to("businesses", 'class': 'btn-shadow btn btn-alternate', '<span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-arrow-left fa-w-20"></i></span> Go Back') }}
            </div>
        </div>    
    </div>
</div>    
 




<div class="row"> 
    <div class="col-lg-12">

        <div class="main-card mb-3 card">

            <div class="card-body"><h5 class="card-title mb-5">Enter the Businesses Details Below</h5>
  
                {{ flash.output() }}
                
                <form role="form" method="post" action="{{ url("businesses/create") }}">
                     
                    <div class="box-body "> 
                        <div class="container">
                        <div class="row">      
        
                        <!-- text input --> 

                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="company" class="sr-only">Company Name</label> 
                                 {{ form.render('company') }}
                            </div> 
                        </div> 
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label for="api_id" class="sr-only">Business API Token</label> 
                                 {{ form.render('api_id') }}
                            </div> 
                        </div> 
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="address" class="sr-only">Business Address</label> 
                                 {{ form.render('address') }}
                            </div> 
                        </div>  
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="city" class="sr-only">Business City</label> 
                                 {{ form.render('city') }}
                            </div> 
                        </div> 
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="profilesId" class="sr-only">Business is a Client</label>
                                 {{ form.render('is_customer') }} 
                            </div> 
                        </div> 
                         
                        </div></div>                
                        <!-- /.row-container -->
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">    
                        {{ tag_html('button', ['id': 'saveNewUser', 'type': 'submit', 'class': 'btn-shadow btn btn-primary btn-lg ml-3'], false, true, true) }}
                            <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-save fa-w-20"></i></span>  Update Business
                        {{ tag_html_close('button') }} 
                    </div>
        
                </form>  
                
                

                
            </div>
        </div>

    </div> 
</div>