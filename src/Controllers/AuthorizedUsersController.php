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

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\QueryBuilder as Paginator;
use Siwebapp\Forms\ChangePasswordForm;
use Siwebapp\Forms\ResetPasswordForm;
use Siwebapp\Forms\UsersForm;
use Siwebapp\Models\PasswordChanges;
use Siwebapp\Models\Users;

 
class AuthorizedUsersController extends ControllerBase
{
    public function initialize(): void
    {
      
        $this->view->setTemplateBefore('private');
    }

   
    public function indexAction(): void
    {
      
        $identity = $this->session->get('auth-identity');

        // $this->view->setVar('page', $paginator->paginate());
        
        $phql = 'SELECT a.id, CONCAT_WS(" ", a.last_name, a.first_name) AS fullname,
            a.email, a.banned, a.suspended, a.active, b.role_name, c.company  
            FROM Siwebapp\Models\Users a
            LEFT JOIN Siwebapp\Models\Profiles b ON ( b.id = a.profilesID ) 
            LEFT JOIN Siwebapp\Models\Businesses c ON ( c.id = a.org_id ) 
            WHERE a.deleted = :isDeleted: and a.id > :Id:
            LIMIT 0, 100';
        $records  = $this->modelsManager->executeQuery( $phql, [ 
            'Id' => 2,
            'isDeleted' => 'N',
        ]); 


          
	
        $this->view->setVar('orgId', $records);                                                  
        $this->view->setVar('authorizedUsers', $records);
        

    }


    public function createAction(): void
    {
        $form = new UsersForm();

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $user = new Users([
                    'first_name'       => $this->request->getPost('firstname', 'striptags'),
                    'last_name'       => $this->request->getPost('lastname', 'striptags'),
                    'org_id'       => $this->request->getPost('orgid', 'int'),
                    'password'   => $this->security->hash($this->request->getPost('password')),
                    'name'       => $this->request->getPost('name', 'striptags'),
                    'profilesId' => $this->request->getPost('profilesId', 'int'),
                    'email'      => $this->request->getPost('email', 'email'),
                ]);

                 

                if (!$user->save()) {
                    foreach ($user->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
                    $this->flash->success("User was created successfully");
                }
            }
        }

        $this->view->setVar('form', $form);
    }


    public function editAction($id)
    {
        $user = Users::findFirstById($id);
        if (!$user) {
            $this->flash->error('The Authorized User was not found.');

            return $this->dispatcher->forward([
                'action' => 'index',
            ]);
        }

        $form = new UsersForm($user, [
            'edit' => true,
        ]);

        if ($this->request->isPost()) {
            $user->assign([
                'first_name'       => $this->request->getPost('firstname', 'striptags'),
                'last_name'       => $this->request->getPost('lastname', 'striptags'),
                'org_id'       => $this->request->getPost('orgid', 'int'), 
                'name'       => $this->request->getPost('name', 'striptags'),
                'profilesId' => $this->request->getPost('profilesId', 'int'),
                'email'      => $this->request->getPost('email', 'email'),

                'banned'     => $this->request->getPost('banned'),
                'suspended'  => $this->request->getPost('suspended'),
                'active'     => $this->request->getPost('active'),
            ]);

            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                if (!$user->save()) {
                    foreach ($user->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
                    $this->flash->success('User was updated successfully.');
                }
            }
        }

        $this->view->setVars([
            'user' => $user,
            'form' => $form,
        ]);
    }


    public function deleteAction($id)
    {
        $user = Users::findFirstById($id);
        if (!$user) {
            $this->flash->error('The authorized user was not found.');

            return $this->dispatcher->forward([
                'action' => 'index',
            ]);
        }

        if (!$user->delete()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error((string) $message);
            }
        } else {
            $this->flash->success('authorized user was deleted successfully.');
        }

        return $this->dispatcher->forward([
            'action' => 'index',
        ]);
    }


    public function changePasswordAction(): void
    {
        $form = new ChangePasswordForm();

        if ($this->request->isPost()) {

            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {

                $user = $this->auth->getUser();
                
                // Check the password
                if (!$this->security->checkHash($this->request->getPost('currentPassword'), $user->password)) {
                    
                    throw new Exception('The current password seems to be wrong. Please check and try again');
                }

                //proceed
                $user->password            = $this->security->hash($this->request->getPost('password'));
                $user->mustChangePassword  = 'N'; 
                $passwordChange            = new PasswordChanges();
                $passwordChange->usersId   = $user->id;
                $passwordChange->ipAddress = $this->request->getClientAddress();
                $passwordChange->userAgent = $this->request->getUserAgent();

                if (!$passwordChange->save()) {
                    foreach ($passwordChange->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
 
                    $currUser = Users::findFirstById($user->id);
                    if (!$currUser) {
                        $this->flash->error('The authorized user was not found. This could be because of an internal fault, please try again later');
                    } else { 
                        $currUser->assign([ 
                            'password'     => $user->password,
                        ]); 

                        if (!$currUser->save()) {
                            foreach ($currUser->getMessages() as $message) {
                                $this->flash->error((string) $message);
                            }
                        } else {
                             
                            $this->flash->success('Congratulations! Your password was successfully changed');  
                        }
                    } 
                    
                }

            }
        }

        $this->view->setVar('form', $form);
    }


    public function resetPasswordAction(): void
    {
        $form = new ResetPasswordForm();

        if ($this->request->isPost()) {
            if (!$form->isValid($this->request->getPost())) {

                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }

            } else {
                $user = $this->auth->getUser();
                $new_password = $this->security->hash($this->request->getPost('password'));

                file_put_contents("thedata.txt", $new_password . ' '. $this->request->getPost('password') );

                $user->password            = $new_password; 
                $user->mustChangePassword  = 'N';
                $passwordChange            = new PasswordChanges();
                $passwordChange->usersId   = $user->id;
                $passwordChange->ipAddress = $this->request->getClientAddress();
                $passwordChange->userAgent = $this->request->getUserAgent();

                if (!$passwordChange->save()) {
                    foreach ($passwordChange->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
 
                    $currUser = Users::findFirstById($user->id);
                    if (!$currUser) {
                        $this->flash->error('The authorized user was not found. This could be because of an internal fault, please try again later');
                    } else { 
                        $currUser->assign([ 
                            'password'     => $new_password,
                        ]); 

                        if (!$currUser->save()) {
                            foreach ($currUser->getMessages() as $message) {
                                $this->flash->error((string) $message);
                            }
                        } else {
                             
                            $this->flash->success('Congratulations! Your password was successfully reset');  
                        }

                    } 
 
                                          
                }
            }
        }

        $this->view->setVar('form', $form);
    }
    
}                                    
