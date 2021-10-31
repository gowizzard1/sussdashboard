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

use Phalcon\Mvc\Router;

/**
 * @var $router Router
 */

$router->add('/confirm/{code}/{email}', [
    'controller' => 'UserControl',
    'action'     => 'confirmEmail',
]);

$router->add('/reset-password/{code}/{email}', [
    'controller' => 'UserControl',
    'action'     => 'resetPassword',
]);
 