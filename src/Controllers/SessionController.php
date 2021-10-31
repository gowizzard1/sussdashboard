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

use Siwebapp\Forms\ForgotPasswordForm;
use Siwebapp\Forms\LoginForm; 
use Siwebapp\Forms\UsersForm;
use Siwebapp\Models\ResetPasswords;
use Siwebapp\Models\Users;
use Siwebapp\Plugins\Auth\Exception as AuthException;

/**
 * Controller used handle non-authenticated session actions like login/logout,
 * user signup, and forgotten passwords
 */
class SessionController extends ControllerBase
{
     
    public function initialize(): void
    {
        $this->view->setTemplateBefore('public');
    }

    public function indexAction(): void
    {
    }

    /**
     * Allow a user to signup to the system
     */
    public function signupAction()
    {
         
    }

     
    public function loginAction()
    {
        $form = new LoginForm();

        try {
            if (!$this->request->isPost()) {
                if ($this->auth->hasRememberMe()) {
                    return $this->auth->loginWithRememberMe();
                }
            } else {
                if ($form->isValid($this->request->getPost()) == false) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                } else {
                    $this->auth->check([
                        'email'    => $this->request->getPost('email'),
                        'password' => $this->request->getPost('password'),
                        'remember' => $this->request->getPost('remember'),
                    ]);

                    return $this->response->redirect('dashboard');
                }
            }
        } catch (AuthException $e) {
            $this->flash->error($e->getMessage());
        }

        $this->view->setVar('form', $form);
    }

     
    public function forgotPasswordAction(): void
    {
        $form = new ForgotPasswordForm();

        if ($this->request->isPost()) {
            // Send emails only is config value is set to true
            if ($this->getDI()->get('config')->useMail) {
                if ($form->isValid($this->request->getPost()) == false) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $user = Users::findFirstByEmail($this->request->getPost('email'));
                    if (!$user) {
                        $this->flash->success('There is no account associated to this email');
                    } else {
                        $resetPassword          = new ResetPasswords();
                        $resetPassword->usersId = $user->id;
                        if ($resetPassword->save()) {
                            $this->flash->success('Success! Please check your messages for an email reset password');
                        } else {
                            foreach ($resetPassword->getMessages() as $message) {
                                $this->flash->error((string) $message);
                            }
                        }
                    }
                }
            } else {
                $this->flash->warning(
                    'Emails are currently disabled. Change config key "useMail" to true to enable emails.'
                );
            }
        }

        $this->view->setVar('form', $form);
    }

     
    public function logoutAction()
    {
        $this->auth->remove();

        return $this->response->redirect('session/login');
    }
}
