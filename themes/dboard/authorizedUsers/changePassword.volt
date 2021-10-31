<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-key icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Change Password
                <div class="page-title-subheading"> 
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block "> 
            </div>
        </div>    
    </div>
</div>    


<div class="row">

    <div class="col-md-6 offset-md-3">

        <div class="main-card mb-3 card">
            <div class="card-body">
                 
                {{ flash.output() }}
                <form method="post" action="{{ url("authorizedUsers/changePassword") }}">
                    
                    <div class="box-body "> 
                        <div class="container">
                        <div class="row">
        
                        <!-- text input --> 
 
                        <div class="col-md-12 col-sm-12">
                            
                            <div class="form-group row"> 
                                <label for="password" class="col-sm-4 col-form-label">Current Password:</label>
                                <div class="col-sm-8">
                                    {{ form.render('currentPassword', ['class': 'form-control', 'placeholder': 'Current Password']) }}
                                </div>
                            </div>
                            <div class="form-group row">  
                                <div class="col-sm-12">
                                    <hr>
                                </div>
                            </div>
                             
                            <div class="form-group row"> 
                                <label for="password" class="col-sm-4 col-form-label">New Password:</label>
                                <div class="col-sm-8">
                                    {{ form.render('password', ['class': 'form-control', 'placeholder': 'New Password']) }}
                                </div>
                            </div>

                            <div class="form-group row"> 
                                <label for="confirmPassword" class="col-sm-4 col-form-label">Confirm New Password:</label>
                                <div class="col-sm-8">
                                    {{ form.render('confirmPassword', ['class': 'form-control', 'placeholder': 'Confirm Password']) }}
                                </div>
                            </div>
  
                        </div> 
                          
                        </div></div>                
                        <!-- /.row-container -->
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">   
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save" aria-hidden="true"></i> Change Password</button>  
                    </div>
                </form>
 
            </div>
        </div>

    </div>

</div>


