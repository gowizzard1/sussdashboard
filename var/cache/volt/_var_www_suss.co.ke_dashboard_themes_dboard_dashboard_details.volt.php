 
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-chart-line icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Campaign
                <div class="page-title-subheading"></div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block "> </div>
        </div>    
    </div>
</div> 


<div class="row">

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item"> 
            <?= $this->tag->linkTo(['dashboard/details/' . $id, 'class' => 'nav-link active show', 'role' => 'tab', 'id' => 'tab-0', 'tab' => 'tab-1', 'aria-selected' => 'true', '<span>Campaign Details</span>']) ?>
        </li>
        <li class="nav-item"> 
            <?= $this->tag->linkTo(['dashboard/targeting/' . $id, 'class' => 'nav-link show', 'role' => 'tab', 'id' => 'tab-1', 'tab' => 'tab-2', 'aria-selected' => 'false', '<span>Targeting (Beta)</span>']) ?>
        </li>
    </ul>

</div>


<div class="tab-content"> 
    <div class="tab-pane tabs-animation fade  show active" id="campaign-details" role="tabpanel"> 
        <div class="row"> 
            <div class="col-12 "> 
                <div class="main-card mb-3 card">

                <?php if (isset($campaigns)) { ?> 
                              
                    <div class="card-header">
                        <?= $campaigns->name ?>
                    </div>
                        <div class="card card-body">
                            <div class="mb-5">
                                <a href="<?= $campaigns->target_url ?>" class="fw-bold text-decoration-none text-uppercase" target="_blank" style="font-weight:700;">View Landing Page <i class="fas fa-external-link-alt"></i></a>
                            </div>  
                            <div class="row"> 
                                <div class="col-md-4">
                                    <p><strong>STARTING AT:</strong> <?= $campaigns->started_at ?></p>
                                    <p><strong>CAMPAIGN TYPE:</strong> <?= $campaignDirectionId[$campaigns->direction_id] ?></p>
                                    <p><strong>BUY TYPE:</strong> <?= $campaigns->rate_model ?></p> 

                                </div>
                                <div class="col-md-4">
                                    <?php $capping = ''; ?>
                                    <?php $frequency = ''; ?> 

                                    <?php if (0 === $campaigns->capping || empty($campaigns->capping)) { ?>
                                        <?php $capping = 'Unlimited'; ?>
                                    <?php } else { ?>
                                        <?php $capping = '0'; ?>
                                    <?php } ?>

                                    <p><strong>CAPPING:</strong> <?= $capping ?></p>
                                    <p><strong>TOTAL LIMIT:</strong> <?= $NumTag->numberformat($campaigns->limit_total_amount, 0) ?></p>
                                    <p><strong>DAILY LIMIT:</strong> <?= $NumTag->numberformat($campaigns->limit_daily_amount, 0) ?></p>

                                </div>
                                <div class="col-md-4">
                                            
                                        
                                        <?php if (0 === $campaigns->frequency || empty($campaigns->frequency)) { ?>
                                            <?php $frequency = 'Unlimited'; ?>
                                        <?php } else { ?>
                                            <?php $frequency = '0'; ?>
                                        <?php } ?>
                                                    
                                    <p><strong>FREQUENCY:</strong> <?= $frequency ?></p>
                                    <p><strong>CAMPAIGN STATUS:</strong> <?= $campaignStatus[$campaigns->status] ?></p>
                                    <p><strong>CAMPAIGN ARCHIVE:</strong> <?= $campaignIsArchived[$campaigns->is_archived] ?></p> 

                                </div>

                                <div class="col-12  mt-5 mb-5">
                                    <h5 class="card-title">Creatives</h5>
                                    <hr>
                                </div>

                                <?php if (isset($campaigns->creatives)) { ?>                                 

                                    <?php foreach ($campaigns->creatives as $part) { ?>
                                    
                                        <div class="col-12 shadow-sm border-top border-bottom pt-3 mb-5">
                                            <h5 class="card-title">#<?= $part->id ?></h5> 
                                            <h5 class="card-title" rel="<?= $part->id ?>"><?= $part->title ?></h5> 
                                                <?= $part->description ?>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4"> 

                                                    <p><strong>USER STATUS:</strong> <?= $userStatus[$part->user_status] ?></p>
                                                    <p><strong>POLICY STATUS:</strong> <?= $policyStatus[$part->policy_status] ?></p>

                                                </div>
                                                <div class="col-md-4">
                                                        
                                                    <?php if (0 === $part->capping || empty($part->capping)) { ?>
                                                        <?php $capping = 'Unlimited'; ?> 
                                                    <?php } else { ?>
                                                        <?php $capping = '0'; ?> 
                                                    <?php } ?>

                                                    <?php if (0 === $part->frequency || empty($part->frequency)) { ?>
                                                        <?php $frequency = 'Unlimited'; ?> 
                                                    <?php } else { ?>
                                                        <?php $frequency = '0'; ?> 
                                                    <?php } ?>

                                                    <p><strong>CAPPING:</strong> <?= $capping ?></p>
                                                    <p><strong>CLICK CAPPING:</strong> <?= $NumTag->numberformat($part->click_capping, 0) ?></p>

                                                </div>
                                                <div class="col-md-4">';

                                                    <p><strong>FREQUENCY:</strong> <?= $frequency ?></p>
                                                    <p><strong>CLICK FREQUENCY:</strong> <?= $NumTag->numberformat($part->frequency, 0) ?></p>

                                                </div>
                                                <div class="col-12 mb-5">
                                                    <h5 class="card-title">ICON:</h5>  

                                                    <?php if (empty($part->icon)) { ?> 
                                                        <p>No icon for this creative</p> 
                                                    <?php } else { ?>
                                                        <?= $this->tag->image([$part->icon, 'class' => 'img-fluid']) ?>
                                                    <?php } ?>

                                                </div>
                                                <div class="col-12 mb-5">
                                                    <h5 class="card-title">IMAGE:</h5>  

                                                    <?php if (empty($part->image)) { ?> 
                                                        <p>No image for this creative</p> 
                                                    <?php } else { ?>
                                                        <?= $this->tag->image([$part->image, 'class' => 'img-fluid']) ?>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div> 
                                    
                                    <?php } ?>

                                <?php } ?>
                                        
                                </div> 
                            </div>  <!-- row -->
                        </div> <!-- card body -->
                          
                <?php } else { ?>
                         
                    <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                        <p>No details for that campaign on record </p>    
                    </div> 
                            
                <?php } ?>               
                        
                </div> 
            </div> 
        </div>  
    </div>

    <div class="tab-pane tabs-animation fade" id="campaign-targeting" role="tabpanel"> </div>

    
<div class="divider mt-3" ></div>
   














