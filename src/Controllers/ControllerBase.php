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

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Siwebapp\Plugins\Acl\Acl;
use Siwebapp\Plugins\Auth\Auth;

/**
 * ControllerBase
 * This is the base controller for all controllers in the application
 *
 * @property Auth auth
 * @property Acl  acl
 */
class ControllerBase extends Controller
{
    /**
     * Execute before the router so we can determine if this is a private
     * controller, and must be authenticated, or a public controller that is
     * open to all.
     *
     * @param Dispatcher $dispatcher
     *
     * @return boolean
     */
    public function beforeExecuteRoute(Dispatcher $dispatcher): bool
    {
        $controllerName = $dispatcher->getControllerName();
        $actionName     = $dispatcher->getActionName();

        $identity_role = $this->session->get('auth-identity'); 
        $this->view->setVar('userRole', $identity_role['profileId']); 

        // Only check permissions on private controllers
        if ($this->acl->isPrivate($controllerName)) {
            // Get the current identity
            $identity = $this->auth->getIdentity();

                                         
            // If there is no identity available the user is redirected to index/index
            if (!is_array($identity)) {
                $this->flash->notice('You don\'t have access to the controlled module: private');

                $dispatcher->forward([
                    'controller' => 'index',
                    'action'     => 'index',
                ]);
                return false;
            }

            // Check if the user have permission to the current option
            if (!$this->acl->isAllowed($identity['profile'], $controllerName, $actionName)) {
                $this->flash->notice('You don\'t have access to the module: ' . $controllerName . ':' . $actionName);

                if ($this->acl->isAllowed($identity['profile'], $controllerName, 'index')) {
                    $dispatcher->forward([
                        'controller' => $controllerName,
                        'action'     => 'index',
                    ]);
                } else {
                    $dispatcher->forward([
                        //'controller' => 'user_control',
                        //'action'     => 'index', 
                        'controller' => 'session', 
                        'action'     => 'login', 
                    ]);
                }

                return false;
            }
        }

        return true;
    }
}
 