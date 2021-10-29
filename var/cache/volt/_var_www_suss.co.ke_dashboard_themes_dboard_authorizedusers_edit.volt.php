

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-shipping-fast icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Add Authorized User
                <div class="page-title-subheading"> 
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block ">  
                <?= $this->tag->linkTo(['authorizedUsers', 'class' => 'btn-shadow btn btn-alternate', '<span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-arrow-left fa-w-20"></i></span> Go Back']) ?>
            </div>
        </div>    
    </div>
</div>    
 




<div class="row"> 
    <div class="col-lg-12">

        <div class="main-card mb-3 card">

            <div class="card-body"><h5 class="card-title mb-5">Authorized User's Details Below</h5>
  
                <?= $this->flash->output() ?>
                
                <form role="form" method="post" action="<?= $this->url->get('authorizedUsers/create') ?>">
                    <!-- input type="hidden" name="orgid" value="3" -->
                    <div class="box-body "> 
                        <div class="container">
                        <div class="row">      
        
                        <!-- text input --> 

                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="firstname" class="sr-only">First Name</label> 
                                 <?= $form->render('firstname') ?>
                            </div> 
                        </div> 
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="lastname" class="sr-only">Last Name</label> 
                                 <?= $form->render('lastname') ?>
                            </div> 
                        </div> 
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="email" class="sr-only">Email Address</label> 
                                 <?= $form->render('email') ?>
                            </div> 
                        </div>   
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="orgid" class="sr-only">Businesses</label> 
                                 <?= $form->render('orgid') ?> 
                            </div> 
                        </div>
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="profilesId" >Role</label>
                                 <?= $form->render('profilesId') ?> 
                            </div> 
                        </div> 

                        
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="profilesId" >Ban User?</label>
                                 <?= $form->render('banned') ?> 
                            </div> 
                        </div> 
                        
                        <div class="col-md-6 col-sm-12"> 
                            <div class="form-group">
                                <label for="profilesId" >Suspend User?</label>
                                 <?= $form->render('suspended') ?> 
                            </div> 
                        </div> 
                        
                         
                         
                        </div></div>                
                        <!-- /.row-container -->
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">    
                        <?= $this->tag->tagHtml('button', ['id' => 'saveNewUser', 'type' => 'submit', 'class' => 'btn-shadow btn btn-primary btn-lg ml-3'], false, true, true) ?>
                            <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-save fa-w-20"></i></span>  Update User
                        <?= $this->tag->tagHtmlClose('button') ?> 
                    </div>
        
                </form>  
                
                

                
            </div>
        </div>

    </div> 
</div>