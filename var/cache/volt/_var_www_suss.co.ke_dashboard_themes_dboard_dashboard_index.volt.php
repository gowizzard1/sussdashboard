 
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-chart-line icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Campaigns Dashboard
                <div class="page-title-subheading"></div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block "> </div>
        </div>    
    </div>
</div>    
<div class="row">
    <div class="col-md-12 ">  
        <div class="mb-3 card card-body">
            <h5 class="card-title">Filter Results:</h5> 
            <form method="POST" action="/dashboard" class="form-inline">
                <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group"><label for="dashdatefilter" class="mr-sm-2">Date Range:</label><input name="dashdatefilter" id="dashdatefilter" type="text" class="form-control" value="<?= $fullDate ?>" style="width:230px"></div>
                <button class="btn btn-primary">Filter</button>
            </form>             
            <script type="text/javascript">
                $(function() { 
                    $('input[name="dashdatefilter"]').data('daterangepicker').setStartDate('<?= $splitDate0 ?>');
                    $('input[name="dashdatefilter"]').data('daterangepicker').setEndDate('<?= $splitDate1 ?>');
                });
            </script> 
        </div>
    </div> 
           
</div>  
<div class="row">
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Impressions</div> 
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary" id="aggrimpressions"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Clicks</div> 
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary" id="aggrclicks"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Spends</div> 
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary" id="aggrspends"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">CPM</div> 
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary" id="aggrcpm"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">CPC</div> 
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary" id="aggrcpc"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <div class="col-lg-6 col-xl-4">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">CTR</div> 
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-primary" id="aggrctr"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
</div>
 
<div class="row"> 
    <div class="col-md-12">
 
         <div class="main-card mb-3 card fill-vspace">
            <div class="card-body fill-vspace-body"><h5 class="card-title">List of Campaigns</h5>
                <table class="display mb-0 table" id="campaign" style="width:100%;"> 
                    <thead>
                    <tr> 
                        <th class="text-center">ID</th>
                        <th>Campaign Name</th> 
                        <th class="text-right">Impressions</th>
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
                        <?php $v40262222761iterated = false; ?><?php foreach ($campaigns as $campaign) { ?><?php $v40262222761iterated = true; ?> 
							<?php $cpm = $campaign->cpm; ?>
							<?php $ctr = $campaign->ctr; ?>
							<?php if (($campaign->clicks * 4 > $campaign->impressions)) { ?>
							<?php $cpm = 0; ?>
							<?php $ctr = 0; ?>
							<?php } ?>
                            <tr>
                                <th scope="row"><?= $campaign->campaign_id ?></th>
                                <td><?= $this->tag->linkTo(['dashboard/details/' . $campaign->campaign_id, $campaign->campaign_name]) ?></td>
                                <td><?= $NumTag->numberformat($campaign->impressions, 0) ?></td>
                                <td><?= $NumTag->numberformat($campaign->clicks * 4, 0) ?></td>
                                <td><?= $NumTag->numberformat($campaign->conversions) ?> </td>
                                <td><?= $NumTag->numberformat($campaign->money * 2.007) ?></td> 
                                <td><?= $cpm ?></td>
                                <td><?= $campaign->cpc ?></td>
                                <td><?= $NumTag->numberformat($ctr, 3) ?></td>
                                <td><?= $campaign->cr ?></td> 
                            </tr>
                        <?php } if (!$v40262222761iterated) { ?>
                            <tr>
                                <td colspan="10" class="text-center">
                                    No campaigns data on record   
                                </td>
                            </tr>
                        <?php } ?>  
 
                    </tbody>
                </table>
            </div>
        </div>

    </div> 
</div>



