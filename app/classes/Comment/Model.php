<?php

    namespace App\Comment;

    class Model extends \Core\Database\Model{

        public function __construct()
        {
            parent::__construct('comments_table', [
                [
                    'name' => 'id',
                    'type' => self::NUMBER_SHORT,
                    'flags' => [self::FLAG_NOT_NULL, self::FLAG_PRIMARY, self::FLAG_AUTO_INCREMENT]
                ],
                [
                    'name' => 'name',
                    'type' => self::TEXT_SHORT,
                    'flags' => [self::FLAG_NOT_NULL]
                ],
                [
                    'name' => 'comment',
                    'type' => self::TEXT_LONG,
                    'flags' => [self::FLAG_NOT_NULL]
                ],
                [
                    'name' => 'date',
                    'type' => self::DATETIME_AUTO_ON_CREATE,
                    'flags' => [self::FLAG_NOT_NULL]
                ],


            ]);
        }
    }