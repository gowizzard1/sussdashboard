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
use Phalcon\Validation\Validator\Email;
use Phalcon\Forms\Element\Password; 
use Phalcon\Validation\Validator\StringLength; 
use Phalcon\Validation\Validator\PresenceOf;
use Siwebapp\Models\Businesses;
use Siwebapp\Models\Profiles;

 


class UsersForm extends Form
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

        $first_name = new Text('firstname', [
            'placeholder' => 'First Name',
            'id' => 'firstname',
            'class' => 'form-control',
            'required' => ''
        ]);

        $first_name->addValidators([
            new PresenceOf([
                'message' => 'The first name is required',
            ]),
        ]);

        $this->add($first_name);

        $last_name = new Text('lastname', [
            'placeholder' => 'Last Name',
            'id' => 'lastname',
            'class' => 'form-control',
            'required' => ''
        ]);
                    
        $last_name->addValidators([
            new PresenceOf([
                'message' => 'The last name is required',
            ]),
        ]);

        $this->add($last_name);

        $email = new Text('email', [
            'placeholder' => 'Email',
            'id' => 'email',
            'class' => 'form-control',
            'required' => ''
        ]);

        $email->addValidators([
            new PresenceOf([
                'message' => 'The e-mail is required',
            ]),
            new Email([
                'message' => 'The e-mail is not valid',
            ]),
        ]);
        $email->setFilters(
            'email'
        ); 
        $this->add($email);

        $password = new Password('password', [
            'placeholder' => 'Password',
            'id' => 'password',
            'class' => 'form-control',
            'required' => ''
        ]);
        $password->addValidators([
            new PresenceOf([
            'message' => 'The password is required',
            ]),
            new StringLength(
            [
                'min'            => 8,
                'messageMinimum' => 'The password should be at least 12 characters',
            ]),
        ]);  
        $password->clear();
        $this->add($password);


        $businesses = Businesses::find([
            'columns' => 'id, company',
            'conditions'  => 'id > :the_id: AND active = :active: ',
            'bind'  => [ 
                'the_id' => 1,
                'active' => 'Y', 
            ], 
        ]);

        $profiles = Profiles::find([
            'active = :active:',
            'bind' => [
                'active' => 'Y',
            ],
        ]);
                                                 
        $this->add(new Select('orgid', $businesses, [ 
            'using'      => [
                'id',
                'company',                   
            ],
            'id'  => 'orgid',
            'class'  => 'form-control',
            'useEmpty'   => true,
            'emptyText'  => 'Select the Company',
            'emptyValue' => '0'
        ]));

        $this->add(new Select('profilesId', $profiles, [
            'using'      => [
                'id',
                'role_name',
            ],
            'id'  => 'profilesId',
            'class'  => 'form-control',
            'useEmpty'   => false,
            'emptyText'  => 'Select User Role',
            'emptyValue' => '0',
            "value" => 4
        ]));

         
             
            $this->add(new Select('banned', [
                '@' => 'Ban user?',
                'N' => 'No',
                'Y' => 'Yes',
            ],            
            [
                'id'  => 'banned',
                'class'  => 'form-control',
            ]));
    
            $this->add(new Select('suspended', [
                '@' => 'Suspend user?',
                'N' => 'No',
                'Y' => 'Yes',
            ],            
            [
                'id'  => 'suspended',
                'class'  => 'form-control',
            ]));
    
            $this->add(new Select('active', [ 
                'Y' => 'Yes',
                'N' => 'No',
            ],            
            [
                'id'  => 'active',
                'class'  => 'form-control',
            ]));
 
          

        
    }
}


