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

namespace Siwebapp\Providers;

use Phalcon\Escaper;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Flash\Direct as Flash;

class FlashProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'flash';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $di->set($this->providerName, function () {
            $escaper = new Escaper();
            $flash = new Flash($escaper);
            $flash->setImplicitFlush(false);
            $flash->setCssClasses([
                'error'   => 'alert alert-danger alert-dismissible fade show my-5',
                'success' => 'alert alert-success alert-dismissible fade show my-5',
                'notice'  => 'alert alert-info alert-dismissible fade show my-5',
                'warning' => 'alert alert-warning alert-dismissible fade show my-5',
            ]);

            return $flash;
        });
    }
}
