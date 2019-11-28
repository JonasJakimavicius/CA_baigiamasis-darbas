<?php

namespace Core\User;

class Model extends \Core\Database\Model
{

    public function __construct()
    {

        parent::__construct('users_table', [
            [
                'name' => 'name',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
            [
                'name' => 'surname',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
            [
                'name' => 'email',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL, self::FLAG_PRIMARY]
            ],
            [
                'name' => 'password',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
            [
                'name' => 'phone_number',
                'type' => self::TEXT_SHORT,
                'flags' => [self::FLAG_NOT_NULL]
            ],
        ]);
    }

}
