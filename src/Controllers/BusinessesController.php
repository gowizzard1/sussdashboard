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

namespace Siwebapp\Controllers;


use Siwebapp\Forms\BusinessForm; 
use Siwebapp\Models\Businesses;

/**
 * Display the "Businesses" page.
 */
class BusinessesController extends ControllerBase
{
    public function initialize(): void
    {
 
        $this->view->setTemplateBefore('private');
    }

     
    public function indexAction(): void
    {

        $identity = $this->session->get('auth-identity');

        // $this->view->setVar('page', $paginator->paginate());
        
        $phql = "SELECT a.id, a.api_id, a.company, a.address, a.city,  a.active, a.is_customer    
        FROM Siwebapp\Models\Businesses a  
        WHERE a.is_deleted = :isDeleted: LIMIT 0, 100";
 
        $records  = $this->modelsManager->executeQuery( $phql, [ 
            'isDeleted' => 'N', 
            ] );
                                                          
        $this->view->setVar('businesses', $records);
 
    }


     
    public function createAction(): void
    { 
        $form = new BusinessForm();

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $user = new Businesses([
                    'company'       => $this->request->getPost('company', 'striptags'),
                    'api_id'       => $this->request->getPost('api_id', 'striptags'),
                    'address'       => $this->request->getPost('address', 'striptags'),
                    'city'       => $this->request->getPost('city', 'striptags'),
                    'is_customer' => $this->request->getPost('is_customer', 'striptags'), 
                    'created_by' => 1, 
                    'last_modified_by' => 1, 
                ]);
      

                if (!$user->save()) {
                    foreach ($user->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
                    $this->flash->success("The business was created successfully");
                }
            }
        }

        $this->view->setVar('form', $form);
         
    }


      
    public function editAction() 
    {
         

        $business = Businesses::findFirstById($id);
        if (!$business) {
            $this->flash->error('The Authorized User was not found.');

            return $this->dispatcher->forward([
                'action' => 'index',
            ]);
        }

        $form = new BusinessForm($business, [
            'edit' => true,
        ]);

        if ($this->request->isPost()) {
            $business->assign([
                'company'       => $this->request->getPost('company', 'striptags'),
                'api_id'       => $this->request->getPost('api_id', 'striptags'),
                'address'       => $this->request->getPost('address', 'striptags'), 
                'city'       => $this->request->getPost('city', 'striptags'),
                'is_customer' => $this->request->getPost('is_customer', 'striptags'), 
 
            ]);

            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                if (!$business->save()) {
                    foreach ($user->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
                    $this->flash->success('The business was updated successfully.');
                }
            }
        }

        $this->view->setVars([
            'business' => $business,
            'form' => $form,
        ]);

         
    }


    public function deleteAction($id)
    {
        $business = Businesses::findFirstById($id);
        if (!$business) {
            $this->flash->error('The business was not found.');

            return $this->dispatcher->forward([
                'action' => 'index',
            ]);
        }

        if (!$business->delete()) {
            foreach ($business->getMessages() as $message) {
                $this->flash->error((string) $message);
            }
        } else {
            $this->flash->success('The business was deleted successfully.');
        }

        return $this->dispatcher->forward([
            'action' => 'index',
        ]);
    }



}
