 
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner"> 
                <?php $dashboardClass = ''; ?>  
                <?php $createCampaignClass = ''; ?> 
                <?php $authorizedUsersClass = ''; ?> 
                <?php $adminBusinessesClass = ''; ?> 
                

                <ul class="vertical-nav-menu">
                    <li>&nbsp;</li>
                    <li class="app-sidebar__heading">Campaigns</li>
                    <li>
                        <?php if ($this->dispatcher->getControllerName() === 'dashboard') { ?>
                            <?php $dashboardClass = 'mm-active'; ?>     
                        <?php } ?>
                        <?= $this->tag->linkTo(['dashboard', 'class' => $dashboardClass, '<i class="metismenu-icon fas fa-chart-line"></i> View Campaigns']) ?> 
                    </li>
                    <li>
                        <?php if ($this->dispatcher->getControllerName() === 'createCampaign') { ?>
                            <?php $createCampaignClass = 'mm-active'; ?>     
                        <?php } ?>
                        <?= $this->tag->linkTo(['createCampaign', 'class' => $createCampaignClass, '<i class="metismenu-icon fas fa-chart-line"></i> Create Campaign']) ?> 
                    </li> 
 
                    <?php if ($userRole === '1') { ?>                                           
                    <li class="app-sidebar__heading">Settings</li>
                    <li> 
                        <?php if ($this->dispatcher->getControllerName() === 'authorizedUsers') { ?>
                            <?php $authorizedUsersClass = 'mm-active'; ?>     
                        <?php } ?>   
                        <?= $this->tag->linkTo(['authorizedUsers', 'class' => $authorizedUsersClass, '<i class="metismenu-icon fas fa-users"></i> Authorized Users']) ?>
                    </li>   
                    <li> 
                        <?php if ($this->dispatcher->getControllerName() === 'businesses') { ?>
                            <?php $adminBusinessesClass = 'mm-active'; ?>     
                        <?php } ?>
                        <?= $this->tag->linkTo(['businesses', 'class' => $adminBusinessesClass, '<i class="metismenu-icon fas fa-building"></i> Businesses']) ?>
                    </li>
                    <?php } ?>

                    <li>&nbsp;</li>
                </ul>
            </div>
        </div>
    </div>                                              
