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

namespace Siwebapp\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Relation;

/**
 * Siwebapp\Models\Businesses
 * get the available Businesses
 */
class Businesses extends Model
{
    
    public $id;
    public $api_id;
    public $company;
    public $address;
    public $city;
	public $active;  
	public $is_deleted; 
	public $is_customer; 
	public $created; 
	public $last_modified; 
	public $created_by; 
	public $last_modified_by;

	 
                                    

    /**
     * Assign the table
     */
    public function initialize()
    {
        $this->setSource('organizations');
        
        $this->hasMany('id', Users::class, 'org_id', [
            'alias'      => 'businesses',
        //    'foreignKey' => [ 
        //        'message' => 'Profile cannot be deleted because it\'s used on Users',
        //    ],
        ]);
   
    }
}
