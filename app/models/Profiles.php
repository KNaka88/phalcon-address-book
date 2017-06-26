<?php
namespace Address\Models;

use Phalcon\Mvc\Model;

/**
* Address\Models\Profiles
*
*/
class Profiles extends Model
{
    /**
    * ID
    * @var integer
    */
    public $id;

    /**
    * Name
    * @var string
    */
    public $name;

    /**
    * Define relationships to Users and Permissions
    */
    public function initialize()
    {
        $this->hasMany(
            'id',
            __NAMESPACE__ . '\Users',
            'profilesId',
            [
                'alias' => 'users',
                'foreignKey' =>
                    ['message' => 'Profile cannot be deleted because it\'s used on Users']
            ]
        );

        $this->hasMany(
            'id',
            __NAMESPACE__ . '\Permissions',
            '$profilesId',
            [
                'alias' => 'permissions'
            ]
        );
    }

}
