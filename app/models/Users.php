<?php
namespace Address\Models;
use Phalcon\Validation;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;

class Users extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=false)
     */
    public $firstName;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=false)
     */
    public $lastName;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=false)
     */
    public $email;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    public $contactNumber;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    public $password;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    // public function validation()
    // {
    //     $validator = new Validation();
    //
    //     $validator->add(
    //         'email',
    //         new EmailValidator(
    //             [
    //                 'model'   => $this,
    //                 'message' => 'Please enter a correct email address',
    //             ]
    //         )
    //     );
    //
    //     return $this->validate($validator);
    // }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function initialize()
    {
        $this->belongsTo(
            'profilesId',
            __NAMESPACE__ . '\Profiles',
            'id',
            [
                'alias' => 'profile',
                'reusable' => true
            ]
        );

        $this->hasMany(
            'id',
            __NAMESPACE__ . '\SuccessLogins',
            'usersId',
            [
                'alias' => 'successLogins',
                'foreignKey' => [
                    'message' => 'User cannot be deleted because he/she has activity in the system'
                ]
            ]
        );

        $this->hasMany(
            'id',
            __NAMESPACE__ . '\PasswordChanges',
            'usersId',
            [
                'alias' => 'passwordChanges',
                'foreignKey' => [
                    'message' => 'User cannot be deleted because he/she has activity in the system'
                ]
            ]
        );
    }

}
