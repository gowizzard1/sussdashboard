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

namespace Siwebapp\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\PresenceOf;
use Siwebapp\Models\Businesses;

class BusinessForm extends Form
{
    /**
     * @param null $entity
     * @param array $options
     */
    public function initialize($entity = null, array $options = [])
    {

        // In edition the id is hidden
        if (!empty($options['edit'])) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        $this->add($id);

        $api_id = new Text('api_id', [
            'placeholder' => 'Business API Token',
            'id' => 'api_id',
            'class' => 'form-control',
            'required' => ''
        ]);

        $api_id->addValidators([
            new PresenceOf([
                'message' => 'The Business API Token is required',
            ]),
        ]);

        $this->add($api_id);

        $company = new Text('company', [
            'placeholder' => 'Company Name',
            'id' => 'company',
            'class' => 'form-control',
            'required' => ''
        ]);
                    
        $company->addValidators([
            new PresenceOf([
                'message' => 'The company name is required',
            ]),
        ]);

        $this->add($company);

        $address = new Text('address', [
            'placeholder' => 'Company Address',
            'id' => 'address',
            'class' => 'form-control', 
        ]);
              

        $this->add($address);


        $city = new Text('city', [
            'placeholder' => 'City Name',
            'id' => 'city',
            'class' => 'form-control', 
        ]);
            

        $this->add($city);
          

        $this->add(new Select('active', [
            'Y' => 'Yes',
            'N' => 'No',
        ]));

        $this->add(new Select('is_deleted', [
            'N' => 'No',
            'Y' => 'Yes',
        ]));

        $this->add(new Select('is_customer', [
            '@' => 'Is Business is Customer?',     
            'Y' => 'Yes',
            'N' => 'No',                               
        ],            
        [
            'id'  => 'is_customer',
            'class'  => 'form-control',
        ]));
       
    }
}
                      