<?php
declare(strict_types=1);

/**
 * This file is part of Siwebapp.
 *
 * (c) Sobbayi Interactive Team <developers@sobbayi.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */
          
return [
    'private' => [
        'dashboard' => [
            'index', 
            'details', 
            'targeting',            
        ],
        'createCampaign' => [
            'index', 
            'create',             
        ],
        'authorizedUsers' => [
            'index', 
            'edit',
            'create',
            'delete',
            'changePassword',  
            'resetPassword',  
        ],   
        'permissions' => [
            'index',
        ],
        'businesses' => [
            'index',  
            'create',
            'edit',
            'delete',
        ], 
    ],
];
              