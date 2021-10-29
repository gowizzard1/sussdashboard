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

use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Form;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class ForgotPasswordForm extends Form
{
    public function initialize()
    {
        $email = new Text('email', [
            'placeholder' => 'Email',
        ]);

        $email->addValidators([
            new PresenceOf([
                'message' => 'The email address is required',
            ]),
            new Email([
                'message' => 'The email you entered is not valid',
            ]),
        ]);

        $this->add($email);

        $this->add(new Submit('Send', [
            'class' => 'mb-2 mr-2 btn btn-primary btn-block',
        ]));
    }
}
