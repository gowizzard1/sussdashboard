 
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
            {{ link_to('dashboard/details/' ~ id , 'class': 'nav-link show', 'role': 'tab', 'id': 'tab-0', 'tab': 'tab-1', 'aria-selected': 'false', 
                        '<span>Campaign Details</span>') }}
        </li>
        <li class="nav-item"> 
            {{ link_to('dashboard/targeting/' ~ id , 'class': 'nav-link active show', 'role': 'tab', 'id': 'tab-1', 'tab': 'tab-2', 'aria-selected': 'true', 
                        '<span>Targeting (Beta)</span>') }}
        </li>
    </ul>
</div>

{% if caughtError is defined %} 

<div class="row">
    <div class="col-12 ">
        <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
            <p>{{ caughtError }}</p>    
        </div>
    </div>
</div>
 
{% endif %}
 

<div class="tab-content">
        <div class="tab-pane tabs-animation fade show " id="campaign-details" role="tabpanel"> </div>
        <div class="tab-pane tabs-animation fade active show" id="campaign-targeting" role="tabpanel">
            <div class="row">
                <div class="col-12 ">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="mb-3 text-center">
                                <div role="group" class="btn-group-sm nav btn-group">
                                    <a data-toggle="tab" href="#tab-countrycode" class="btn-shadow btn btn-light active">Country Code</a>
                                    <a data-toggle="tab" href="#tab-platform" class="btn-shadow btn btn-light">Platform</a>
                                    <a data-toggle="tab" href="#tab-os-version" class="btn-shadow btn btn-light">OS Version</a>
                                    <a data-toggle="tab" href="#tab-os" class="btn-shadow btn btn-light">OS</a>
                                    <a data-toggle="tab" href="#tab-device" class="btn-shadow btn btn-light">Device</a>
                                    <a data-toggle="tab" href="#tab-browser" class="btn-shadow btn btn-light">Browser</a>
                                    <a data-toggle="tab" href="#tab-language" class="btn-shadow btn btn-light">Language</a>
                                    <a data-toggle="tab" href="#tab-connection" class="btn-shadow btn btn-light">Connection</a>
                                    <a data-toggle="tab" href="#tab-mobile-isp" class="btn-shadow btn btn-light">Mobile ISP</a>
                                </div>
                            </div>
                            <div class="tab-content" style=" width: 100% !important; max-width: 100% !important;overflow-x: scroll;">   
                                <div class="tab-pane active" id="tab-countrycode" role="tabpanel">

                                    <h5 class="card-title">Country Code</h5> 
                                
                                    <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                        <thead>
                                            <tr>
                                                <th>Country</th> 
                                                <th class="text-right">Impressions.</th>
                                                <th class="text-right">Clicks</th>
                                                <th class="text-right">Conversions</th>
                                                <th class="text-right">Spends ($)</th>
                                                <th class="text-right">CPM ($)</th>
                                                <th class="text-right">CPC ($)</th>
                                                <th class="text-right">CTR (%)</th>
                                                <th class="text-right">CR</th>
                                            </tr>
                                        </thead>
                                        <tbody>           

                                            {% if campaigns.country is defined %} 

                                                {% for part in campaigns.country %}

                                                    <tr> 
                                                        <td>{{ part }}</a></td>
                                                        <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                    </tr>
                                                        
                                                {% endfor %}

                                            {% else %}

                                                <tr>
                                                    <th colspan="9" class="text-center" scope="row">
                                                    
                                                        <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                            <p>There is currently no data for the specified target</p>    
                                                        </div>

                                                    </th> 
                                                </tr>

                                            {% endif %}
                                                
                                        </tbody>
                                    </table>
                                
                                </div>


                                <div class="tab-pane" id="tab-platform" role="tabpanel">

                                    <h5 class="card-title">Platform</h5> 
                                
                                    <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                        <thead>
                                            <tr>
                                                <th>Platform</th> 
                                                <th class="text-right">Impressions.</th>
                                                <th class="text-right">Clicks</th>
                                                <th class="text-right">Conversions</th>
                                                <th class="text-right">Spends ($)</th>
                                                <th class="text-right">CPM ($)</th>
                                                <th class="text-right">CPC ($)</th>
                                                <th class="text-right">CTR (%)</th>
                                                <th class="text-right">CR</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            {% if campaigns.os_type is defined %} 

                                                {% for part in campaigns.os_type %}

                                                    <tr> 
                                                        <td>{{ part }}</a></td>
                                                        <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                    </tr>
                                                        
                                                {% endfor %}

                                            {% else %}

                                                <tr>
                                                    <th colspan="9" class="text-center" scope="row">
                                                    
                                                        <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                            <p>There is currently no data for the specified target</p>    
                                                        </div>

                                                    </th> 
                                                </tr>

                                            {% endif %}

                                        </tbody>
                                    </table>
                                    
                                </div>


                                <div class="tab-pane" id="tab-os-version" role="tabpanel">

                                    <h5 class="card-title">OS Version</h5> 
                                
                                    <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                        <thead>
                                            <tr>
                                                <th>Operating System Version</th> 
                                                <th class="text-right">Impressions.</th>
                                                <th class="text-right">Clicks</th>
                                                <th class="text-right">Conversions</th>
                                                <th class="text-right">Spends ($)</th>
                                                <th class="text-right">CPM ($)</th>
                                                <th class="text-right">CPC ($)</th>
                                                <th class="text-right">CTR (%)</th>
                                                <th class="text-right">CR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {% if campaigns.os_version is defined %} 

                                                {% for part in campaigns.os_version %}

                                                    <tr> 
                                                        <td>{{ part }}</a></td>
                                                        <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                        <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                    </tr>
                                                        
                                                {% endfor %}

                                            {% else %}

                                                <tr>
                                                    <th colspan="9" class="text-center" scope="row">
                                                    
                                                        <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                            <p>There is currently no data for the specified target</p>    
                                                        </div>

                                                    </th> 
                                                </tr>

                                            {% endif %}
                                        </tbody>
                                    </table> 
                                </div>


                                        <div class="tab-pane" id="tab-os" role="tabpanel">

                                            <h5 class="card-title">OS</h5> 
                                        
                                            <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                                <thead>
                                                    <tr>
                                                        <th>Operating System</th> 
                                                        <th class="text-right">Impressions.</th>
                                                        <th class="text-right">Clicks</th>
                                                        <th class="text-right">Conversions</th>
                                                        <th class="text-right">Spends ($)</th>
                                                        <th class="text-right">CPM ($)</th>
                                                        <th class="text-right">CPC ($)</th>
                                                        <th class="text-right">CTR (%)</th>
                                                        <th class="text-right">>CR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {% if campaigns.os is defined %} 

                                                        {% for part in campaigns.os %}

                                                            <tr> 
                                                                <td>{{ part }}</a></td>
                                                                <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                            </tr>
                                                                
                                                        {% endfor %}

                                                    {% else %}

                                                        <tr>
                                                            <th colspan="9" class="text-center" scope="row">
                                                            
                                                                <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                                    <p>There is currently no data for the specified target</p>    
                                                                </div>

                                                            </th> 
                                                        </tr>

                                                    {% endif %}

                                                </tbody>
                                            </table>
                                        
                                        </div>


                                        <div class="tab-pane" id="tab-device" role="tabpanel">

                                            <h5 class="card-title">Device</h5> 
                                        
                                            <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                                <thead>
                                                    <tr>
                                                        <th>Device</th> 
                                                        <th class="text-right">Impressions.</th>
                                                        <th class="text-right">Clicks</th>
                                                        <th class="text-right">Conversions</th>
                                                        <th class="text-right">Spends ($)</th>
                                                        <th class="text-right">CPM ($)</th>
                                                        <th class="text-right">CPC ($)</th>
                                                        <th class="text-right">CTR (%)</th>
                                                        <th class="text-right">CR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {% if campaigns.device is defined %} 

                                                        {% for part in campaigns.device %}

                                                            <tr> 
                                                                <td>{{ part }}</a></td>
                                                                <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                            </tr>
                                                                
                                                        {% endfor %}

                                                    {% else %}

                                                        <tr>
                                                            <th colspan="9" class="text-center" scope="row">
                                                            
                                                                <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                                    <p>There is currently no data for the specified target</p>    
                                                                </div>

                                                            </th> 
                                                        </tr>

                                                    {% endif %}

                                                </tbody>
                                            </table> 
                                        </div>


                                        <div class="tab-pane" id="tab-browser" role="tabpanel">

                                            <h5 class="card-title">Browser</h5> 
                                        
                                            <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                                <thead>
                                                    <tr>
                                                        <th>Browser</th> 
                                                        <th class="text-right">Impressions.</th>
                                                        <th class="text-right">Clicks</th>
                                                        <th class="text-right">Conversions</th>
                                                        <th class="text-right">Spends ($)</th>
                                                        <th class="text-right">CPM ($)</th>
                                                        <th class="text-right">CPC ($)</th>
                                                        <th class="text-right">CTR (%)</th>
                                                        <th class="text-right">CR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    {% if campaigns.browser is defined %} 

                                                        {% for part in campaigns.browser %}

                                                            <tr> 
                                                                <td>{{ part }}</a></td>
                                                                <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                            </tr>
                                                                
                                                        {% endfor %}

                                                    {% else %}

                                                        <tr>
                                                            <th colspan="9" class="text-center" scope="row">
                                                            
                                                                <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                                    <p>There is currently no data for the specified target</p>    
                                                                </div>

                                                            </th> 
                                                        </tr>

                                                    {% endif %}

                                                </tbody>
                                            </table> 
                                        </div>

                                            
                                        <div class="tab-pane" id="tab-language" role="tabpanel">

                                            <h5 class="card-title">Language</h5> 
                                        
                                            <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                                <thead>
                                                    <tr>
                                                        <th>Language</th> 
                                                        <th class="text-right">Impressions.</th>
                                                        <th class="text-right">Clicks</th>
                                                        <th class="text-right">Conversions</th>
                                                        <th class="text-right">Spends ($)</th>
                                                        <th class="text-right">CPM ($)</th>
                                                        <th class="text-right">CPC ($)</th>
                                                        <th class="text-right">CTR (%)</th>
                                                        <th class="text-right">CR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
 
                                                    {% if campaigns.language is defined %} 

                                                        {% for part in campaigns.language %}

                                                            <tr> 
                                                                <td>{{ part }}</a></td>
                                                                <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                            </tr>
                                                                
                                                        {% endfor %}

                                                    {% else %}

                                                        <tr>
                                                            <th colspan="9" class="text-center" scope="row">
                                                            
                                                                <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                                    <p>There is currently no data for the specified target</p>    
                                                                </div>

                                                            </th> 
                                                        </tr>

                                                    {% endif %}

                                                </tbody>
                                            </table> 
                                        </div>


                                        <div class="tab-pane" id="tab-connection" role="tabpanel">

                                            <h5 class="card-title">Connection</h5> 
                                        
                                            <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                                <thead>
                                                    <tr>
                                                        <th>Internet Connection</th> 
                                                        <th class="text-right">Impressions.</th>
                                                        <th class="text-right">Clicks</th>
                                                        <th class="text-right">Conversions</th>
                                                        <th class="text-right">Spends ($)</th>
                                                        <th class="text-right">CPM ($)</th>
                                                        <th class="text-right">CPC ($)</th>
                                                        <th class="text-right">CTR (%)</th>
                                                        <th class="text-right">CR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    {% if campaigns.connection is defined %} 

                                                        {% for part in campaigns.connection %}

                                                            <tr> 
                                                                <td>{{ part }}</a></td>
                                                                <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                            </tr>
                                                                
                                                        {% endfor %}

                                                    {% else %}

                                                        <tr>
                                                            <th colspan="9" class="text-center" scope="row">
                                                            
                                                                <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                                    <p>There is currently no data for the specified target</p>    
                                                                </div>

                                                            </th> 
                                                        </tr>

                                                    {% endif %}

                                                </tbody>
                                            </table> 
                                        </div>


                                        <div class="tab-pane" id="tab-mobile-isp" role="tabpanel">

                                            <h5 class="card-title">Mobile ISP</h5> 
                                        
                                            <table class="mb-0 table table-hover table-striped" id="campaign" style="font-size: .73rem;">
                                                <thead>
                                                    <tr>
                                                        <th>Mobile ISP</th> 
                                                        <th class="text-right">Impressions.</th>
                                                        <th class="text-right">Clicks</th>
                                                        <th class="text-right">Conversions</th>
                                                        <th class="text-right">Spends ($)</th>
                                                        <th class="text-right">CPM ($)</th>
                                                        <th class="text-right">CPC ($)</th>
                                                        <th class="text-right">CTR (%)</th>
                                                        <th class="text-right">CR</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
 
                                                    {% if campaigns.mobile_isp is defined %} 

                                                        {% for part in campaigns.mobile_isp %}

                                                            <tr> 
                                                                <td>{{ part }}</a></td>
                                                                <td class="text-right">{{ campaigns.impressions  is defined ? NumTag.numberformat(campaigns.impressions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.clicks  is defined ? NumTag.numberformat(campaigns.clicks) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.conversions  is defined ? NumTag.numberformat(campaigns.conversions) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.money  is defined ? NumTag.numberformat(campaigns.money) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpm  is defined ? campaigns.cpm : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cpc  is defined ? campaigns.cpc : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.ctr  is defined ? NumTag.numberformat(campaigns.ctr, 3) : 'N/A' }}</td>
                                                                <td class="text-right">{{ campaigns.cr  is defined ? campaigns.cr : 'N/A' }}</td>
                                                            </tr>
                                                                
                                                        {% endfor %}

                                                    {% else %}

                                                        <tr>
                                                            <th colspan="9" class="text-center" scope="row">
                                                            
                                                                <div class="alert alert-info alert-dismissible fade show my-5" role="alert">
                                                                    <p>There is currently no data for the specified target</p>    
                                                                </div>

                                                            </th> 
                                                        </tr>

                                                    {% endif %}
  
                                                </tbody>
                                            </table> 
                                        </div>
  
                            </div>
                        </div>
                    </div>
 
                </div>
            
            </div>

        </div>
    
    </div>
     

    <div class="divider mt-3" ></div>
    
 
