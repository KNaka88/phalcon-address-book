<?php
namespace Address\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Identical;

class UsersForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        // First Name
        $firstName = new Text('firstName', [
            'placeholder' => 'First Name',
            'class' => 'mdl-textfield__input'
        ]);

        $firstName->setLabel('First Name');

        $firstName->addValidators([
            new PresenceOf([
                'message' => 'The First Name is required'
            ])
        ]);

        $this->add($firstName);


        // Last Name
        $lastName = new Text('lastName', [
            'placeholder' => 'Last Name',
            'class' => 'mdl-textfield__input'
        ]);

        $lastName->setLabel('Last Name');

        $lastName->addValidators([
            new PresenceOf([
                'message' => 'The Last Name is required'
            ])
        ]);

        $this->add($lastName);

        // Email
        $email = new Text('email', [
            'placeholder' => 'Email',
            'class' => 'mdl-textfield__input'
        ]);

        $email->setLabel('Email');

        $email->addValidators([
            new PresenceOf([
                'message' => 'The e-mail is required'
            ]),
            new Email([
                'message' => 'The e-mail is not valid'
            ])
        ]);

        $this->add($email);



        // Contact Number
        $contactNumber = new Text('contactNumber', [
            'placeholder' => 'Contact Number',
            'class' => 'mdl-textfield__input'
        ]);

        $contactNumber->setLabel('Contact Number');


        $contactNumber->addValidators([
            new PresenceOf([
                'message' => 'Contact Number is required'
            ]),
            new StringLength([
                'min' => 11,
                'max' => 11,
            ]),
            new Numericality([
                "message" => ":field is not numeric",
            ]),
        ]);

        $this->add($contactNumber);


        // Password
        $password = new Password('password', [
          'class' => 'mdl-textfield__input'
        ]);

        $password->setLabel('Password');

        $password->addValidators([
            new PresenceOf([
                'message' => 'The password is required'
            ]),
            new StringLength([
                'min' => 8,
                'messageMinimum' => 'Mininum 8 characters'
            ]),
            new Confirmation([
                'message' => 'Password doesn\'t match',
                'with' => 'confirmPassword'
            ])
        ]);

        $this->add($password);


        // Confirm Password
        $confirmPassword = new Password('confirmPassword', [
          'class' => 'mdl-textfield__input'
        ]);

        $confirmPassword->setLabel('Confirm Password');

        $confirmPassword->addValidators([
            new PresenceOf([
                'message' => 'The confirmation password is required'
            ])
        ]);

        $this->add($confirmPassword);

        // csrf
        $csrf = new Hidden('csrf');

        $csrf->addValidator(new Identical([
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        ]));

        $csrf->clear();

        $this->add($csrf);


        // Submit
        $this->add(new Submit('Sign Up', [
            'class' => 'mdl-button'
        ]));

    }


    /**
     * Prints messages for a specific element
     */
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}
