<?php
namespace Address\Forms;
use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
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

        // In edition the id is hidden
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        // First Name
        $this->add($id);

        $name = new Text('firstname', [
            'placeholder' => 'First Name'
        ]);

        $name->addValidators([
            new PresenceOf([
                'message' => 'The name is required'
            ])
        ]);

        $this->add($name);


        // Last Name
        $name = new Text('lastname', [
            'placeholder' => 'Last Name'
        ]);

        $name->addValidators([
            new PresenceOf([
                'message' => 'The name is required'
            ])
        ]);

        $this->add($name);

        // Email
        $email = new Text('email', [
            'placeholder' => 'Email'
        ]);

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
        $contactNumber = new Text('contactnumber', [
            'placeholder' => 'Contact Number'
        ]);

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
        $password = new Password('password');

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
        $confirmPassword = new Password('confirmPassword');

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
}
