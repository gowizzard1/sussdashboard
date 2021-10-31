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

use Phalcon\Logger;
use function Siwebapp\root_path;
 
return [
    'database'          => [
        'adapter'  => getenv('DB_ADAPTER'),
        'host'     => getenv('DB_HOST'),
        'port'     => getenv('DB_PORT'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'dbname'   => getenv('DB_NAME'),
    ],
    'application'       => [
        'baseUri'         => getenv('APP_BASE_URI'),
        'publicUrl'       => getenv('APP_PUBLIC_URL'),
        'cryptSalt'       => getenv('APP_CRYPT_SALT'),
        'viewsDir'        => root_path('themes/dboard/'),
        'cacheDir'        => root_path('var/cache/'),
        'sessionSavePath' => root_path('var/cache/session/'),
    ],
    'mail'              => [
        'fromName'  => getenv('MAIL_FROM_NAME'),
        'fromEmail' => getenv('MAIL_FROM_EMAIL'),
        'replyToEmail' => getenv('MAIL_REPLYTO_EMAIL'),
        'smtp'      => [
            'server'   => getenv('MAIL_SMTP_SERVER'),
            'port'     => getenv('MAIL_SMTP_PORT'),
            'security' => getenv('MAIL_SMTP_SECURITY'),
            'username' => getenv('MAIL_SMTP_USERNAME'),
            'password' => getenv('MAIL_SMTP_PASSWORD'),
        ],
    ], 
    'logger'            => [
        'path'     => root_path('var/logs/'),
        'format'   => '%date% [%type%] %message%',
        'date'     => 'D j H:i:s',
        'logLevel' => Logger::ERROR,
        'filename' => 'application.log',
    ], 
    'useMail'                   => true, // Set to false to disable sending emails (for use in test environment)
    'apiKey'                    => getenv('API_KEY'), //this will be removed
    'appTimeout'                => getenv('APP_TIMEOUT'),
    'apiBase'                   => getenv('API_BASE'),
    'backDate'                  => getenv('BACKDATE'),
    'clicksMultiplier'          => 4.042, //getenv('CLICKS_MULTIPLIER'),
    'ctrMultiplier'             => 4, //getenv('CTR_MULTIPLIER'),
    'spendsMultiplier'          => 2.007, //getenv('SPENDS_MULTIPLIER'),
    'campaignStatus'            => array( 1 => 'Draft', 'Moderation pending', 'Rejected', 'Ready', 'Test run', 'Working', 'Paused', 'Stopped', 'Completed' ),
    'campaignDirectionId'       => array( 1 => 'Onclick ad format', 1 => 'Interstitial ad format', 61 => 'Push notification ad format', 68 => 'Native banner ad format' ),
    'campaignIsArchived'        => array( 'Not archived', 'Archived' ),
    'userStatus'                => array( 1 => 'Active', 'Disabled' ),
    'policyStatus'              => array( 1 => 'Active', 'Disabled' ),
	'eskimiApiBase' 			=> 'https://dsp-api.eskimi.com',
	'eskimiGrantType' 			=> 'eskimi_dsp',
	'eskimiUsername' 			=> 'SUSS_KE',
	'eskimiPassword' 			=> 'h6/Z*pTWyWu}=-.',
	'eskimiClientId' 			=> '205',
	'eskimiClientSecret' 		=> 'qj4SKEFtOpU4D0rKn8NNjoqWakJPUVHQTh0mL6S5'
];
  