<?php
namespace Address\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\Numerciality;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Confirmation;

class SearchForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        // First Name
        $firstName = new Text('firstName', [
            'placeholder' => 'First Name',
            'class' => 'mdl-textfield__input'
        ]);

        $firstName->setLabel('First Name');

        $this->add($firstName);


        // Last Name
        $lastName = new Text('lastName', [
            'placeholder' => 'Last Name',
            'class' => 'mdl-textfield__input'
        ]);

        $lastName->setLabel('Last Name');

        $this->add($lastName);


        // Email
        $email = new Text('email', [
            'placeholder' => 'Email',
            'class' => 'mdl-textfield__input'
        ]);

        $email->setLabel('Email');

        $email->addValidators([
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
            new StringLength([
                'min' => 10,
                'max' => 10,
            ]),
            new Numericality([
                "message" => ":field is not numeric",
            ]),
        ]);

        $this->add($contactNumber);


        // Submit
        $this->add(new Submit('Search', [
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
