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

/**
 * Display the default index page.
 */
class IndexController extends ControllerBase
{
    /**
     * Default action. Set the public layout (layouts/public.volt)
     */
    public function indexAction(): void
    {
        
        $this->view->setVar('logged_in', is_array($this->auth->getIdentity()));
       // we can bring this back when we decide what to have on the home page
        $this->view->setTemplateBefore('public');
       //   $this->response->redirect('session/login');               
                          
    }

    

}





