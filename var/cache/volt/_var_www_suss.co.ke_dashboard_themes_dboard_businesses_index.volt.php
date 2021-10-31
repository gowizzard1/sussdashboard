

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-building icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Businesses
                <div class="page-title-subheading"> 
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block ">
                <?= $this->tag->linkTo(['businesses/create', 'class' => 'btn-shadow btn btn-primary', '<span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-plus-square fa-w-20"></i></span> Add New Business']) ?>
            </div>
        </div>    
    </div>
</div>    



<div class="row"> 
    <div class="col-md-12">

         <div class="main-card mb-3 card fill-vspace">
            <div class="card-body fill-vspace-body"><h5 class="card-title">Business Customer List</h5>
                <table class="display mb-0 table" id="tblBusinessess_id" style="width:100%;">  
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Business Name</th>
                            <th>Business API Token</th>
                            <th>Address</th> 
                            <th>City</th>
                            <th>Is Customer</th>  
                            <th>Is Active</th> 
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $v37233118081iterated = false; ?><?php foreach ($businesses as $business) { ?><?php $v37233118081iterated = true; ?> 
                        <tr> 
                            <th scope="row"><?= $business->id ?></th>
                            <td><?= $business->company ?></td>
                            <td><?= $business->api_id ?></td>
                            <td><?= $business->address ?></td> 
                            <td><?= $business->city ?></td>  
                            <td><?= ($business->is_customer == 'Y' ? 'Yes' : 'No') ?> </td>
                            <td><?= ($business->active == 'Y' ? 'Yes' : 'No') ?> </td>
 
 
                            <td>                
                                <div role="group" class="btn-group-sm nav btn-group"> 
                                    <?= $this->tag->linkTo(['businesses/edit/' . $business->id, '<i class="metismenu-icon fas fa-edit"></i>', 'class' => 'btn-shadow btn text-alternate', 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-original-title' => 'Edit', 'data-placement' => 'bottom']) ?>                 
                                    <?= $this->tag->linkTo(['businesses/delete/' . $business->id, '<i class="metismenu-icon fas fa-trash-alt"></i>', 'class' => 'btn-shadow btn text-danger', 'title' => 'Delete', 'data-toggle' => 'tooltip', 'data-original-title' => 'Delete', 'data-placement' => 'bottom']) ?>
                                </div> 
                            </td>
                        </tr>
                    <?php } if (!$v37233118081iterated) { ?>
                        <tr>
                            <td colspan="10" class="text-center">
                                No business customers on record
                            </td>
                        </tr>
                    <?php } ?>  
                    </tbody>
                </table>
            </div>
        </div>

    </div> 
</div>
