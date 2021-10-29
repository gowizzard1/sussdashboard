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

use Siwebapp\Providers\AclProvider;
use Siwebapp\Providers\AuthProvider;
use Siwebapp\Providers\ConfigProvider;
use Siwebapp\Providers\CryptProvider;
use Siwebapp\Providers\DbProvider;
use Siwebapp\Providers\DispatcherProvider;
use Siwebapp\Providers\FlashProvider;
use Siwebapp\Providers\LoggerProvider;
use Siwebapp\Providers\MailProvider;
use Siwebapp\Providers\ModelsMetadataProvider;
use Siwebapp\Providers\RouterProvider;
use Siwebapp\Providers\SecurityProvider;
use Siwebapp\Providers\SessionBagProvider;
use Siwebapp\Providers\SessionProvider;
use Siwebapp\Providers\UrlProvider;
use Siwebapp\Providers\ViewProvider;
use Siwebapp\Providers\NumTagProvider;

return [
    AclProvider::class,
    AuthProvider::class,
    ConfigProvider::class,
    CryptProvider::class,
    DbProvider::class,
    DispatcherProvider::class,
    FlashProvider::class,
    LoggerProvider::class,
    MailProvider::class,
    ModelsMetadataProvider::class,
    RouterProvider::class,
    SessionBagProvider::class,
    SessionProvider::class,
    SecurityProvider::class,
    UrlProvider::class,
    ViewProvider::class,
    NumTagProvider::class,
];
