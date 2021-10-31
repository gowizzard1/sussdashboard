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
 
namespace Siwebapp\Forms;

use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class ResetPasswordForm extends Form
{
    public function initialize()
    {
        // Password
        $password = new Password('password');
        $password->addValidators([
            new PresenceOf([
                'message' => 'The new password is required',
            ]),
            new StringLength([
                'min'            => 8,
                'messageMinimum' => 'The new password is too short. Minimum 8 characters',
            ]), 
        ]);

        $this->add($password);

        // Confirm Password
        $confirmPassword = new Password('confirmPassword');
        $confirmPassword->addValidators([
            new PresenceOf([
                'message' => 'The confirmation password is required',
            ]),
            new Confirmation([
                'message' => 'The confirmation password does not match the new password',
                'with'    => 'password',
            ]),
        ]);

        $this->add($confirmPassword);
    }
}
