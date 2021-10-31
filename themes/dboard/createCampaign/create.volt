

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-building icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Create Campaign
                <div class="page-title-subheading"> 
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block ">  
                {{ link_to("/createCampaign", 'class': 'btn-shadow btn btn-alternate', '<span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-arrow-left fa-w-20"></i></span> Go Back') }}
            </div>
        </div>    
    </div>
</div>    
 

 


<div class="row"> 
    <div class="col-lg-12">

        <div class="main-card mb-3 card">

            <div class="card-body"> 
  
                {{ results }}
                 
            </div>
        </div>

    </div> 
</div>