

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fas fa-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Authorized Users
                <div class="page-title-subheading"> 
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block ">
                {{ link_to("authorizedUsers/create", 'class': 'btn-shadow btn btn-primary', '<span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-plus-square fa-w-20"></i></span> Add New User') }}
            </div>
        </div>    
    </div>
</div>      



<div class="row"> 
    <div class="col-md-12">
 
         <div class="main-card mb-3 card fill-vspace">
            <div class="card-body fill-vspace-body"><h5 class="card-title">Authorized Users List</h5>
                <table class="display mb-0 table" id="tblTeam_id" style="width:100%;"> 
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Role</th>
                        <th>Verified?</th>
                        <th>Suspended?</th>
                        <th>Banned?</th> 
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        {% for authUser in authorizedUsers %} 
                            <tr>
                                <th scope="row">{{ authUser.id }}</th>
                                <td>{{ authUser.fullname }}</td>
                                <td>{{ authUser.email }}</td>
                                <td>{{ authUser.company }}</td>
                                <td>{{ authUser.role_name }}</td>
                                <td>{{ authUser.active == 'Y' ? 'Yes' : 'No' }}</td>
                                <td>{{ authUser.suspended == 'Y' ? 'Yes' : 'No' }}</td>
                                <td>{{ authUser.banned == 'Y' ? 'Yes' : 'No' }}</td>
                                <td>                
                                    <div role="group" class="btn-group-sm nav btn-group"> 
                                        {{ link_to( 
                                            "authorizedUsers/edit/" ~ authUser.id,  
                                            '<i class="metismenu-icon fas fa-edit"></i>',
                                            "class" : "btn-shadow btn text-alternate",
                                            "title" : "Edit",
                                            "data-toggle" : "tooltip",
                                            "data-original-title" : "Edit",
                                            "data-placement" : "bottom" 
                                        ) }}                 
                                        {{ link_to(
                                            "authorizedUsers/delete/" ~ authUser.id,
                                            '<i class="metismenu-icon fas fa-trash-alt"></i>',
                                            "class" : "btn-shadow btn text-danger",
                                            "title" : "Delete",
                                            "data-toggle" : "tooltip",
                                            "data-original-title" : "Delete",
                                            "data-placement" : "bottom" 
                                        ) }}
                                    </div> 
                                </td> 
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan="7" class="text-center">
                                    No authorized users on record   
                                </td>
                            </tr>
                        {% endfor %}  
                    </tbody>
                </table>
            </div>
        </div>

    </div> 
</div>
