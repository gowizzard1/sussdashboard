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

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Siwebapp\Plugins\Mail\Mail;

class MailProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'mail';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $di->set($this->providerName, Mail::class);
    }
}
