
        <div class="app-header header-shadow">
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
            </div>    <div class="app-header__content">
                <div class="app-header-left"> 
                           
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            {{ link_to('authorizedUsers/changePassword', 'class': 'btn dropdown-item','tabindex': '0', 
                                            '<i class="text-black-50 fas fa-key fa-lg mr-2"></i> Password') }}
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            {{ link_to('session/logout', 'class': 'btn dropdown-item','tabindex': '0', 
                                            '<i class="text-black-50 fas fa-sign-out-alt fa-lg mr-2"></i> Sign Out') }}
                                        </div>  
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ auth.getName() }}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ auth.getProfile() }}
                                    </div> 
                                </div>
                                <div class="widget-content-right header-user-info ml-3"> 
                                </div> 
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>


        <div class="ui-theme-settings"> 
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Help Options</h3>
                        
                        
                       
                        
                    </div>
                </div>
            </div>
        </div>
