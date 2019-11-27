<?php

namespace App\Comment;


class Comment
{
    private $data;


    public function __construct($data = null)
    {
        if ($data === null) {
            $this->data = [
                'name' => null,
                'comment' => null,
                'date' => null,
            ];

        } else {
            $this->setData($data);

        }
    }

    public function setName($name)
    {

        $this->data['name'] = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getComment()
    {
        return $this->data['comment'];
    }

    /**
     * @param string $model
     */
    public function setComment(string $comment)
    {
        $this->data['comment'] = $comment;
    }


    public function getDate()
    {
        return $this->data['date'];
    }

    public function setDate($date)
    {
        $this->data['date'] = $date;
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function setId($id)
    {
        $this->data['id'] = $id;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->setName($data['name']);
        $this->setComment($data['comment']);

    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}