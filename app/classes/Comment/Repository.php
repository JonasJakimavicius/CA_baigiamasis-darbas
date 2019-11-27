<?php

namespace App\Comment;

use App\Comment\Comment;


class Repository
{

    protected $model;

    public function __construct()
    {
        $this->model = new \App\Comment\Model;
    }

    public function exists(\App\Comment\Comment $comment)
    {
        if ($this->model->load($comment->getData())) {
            return true;
        }
        return false;
    }


    /**
     * Inserts comment to database if it does not exist
     * @param Comment $comment
     * @return mixed jei irase - negrazins nieko, jei neirase grazins false
     */
    public function insert(\App\Comment\Comment $comment)
    {

        return $this->model->insertIfNotExists(
            $comment->getData(), ['comment','name']);
    }

    /**
     * @param array $array
     * @return array
     */
    public function load($array = [])
    {
        $rows = $this->model->load($array);
        $comments = [];

        foreach ($rows as $row) {

            $comment = new  \App\Comment\Comment($row);
            $comment->setId($row['id']);
            $comments[] = $comment;
        }
        return $comments;
    }

    /**
     * @return array
     */
    public function loadAll()
    {
        $rows = $this->model->load();
        $comments = [];

        foreach ($rows as $row) {
            $comment = new Comment($row);
            $comment->setId($row['id']);
            $comments[] = $comment;
        }

        return $comments;
    }

    /**
     * Updates user in database based on its id
     * @param comment $comment
     * @return boolean true jei irase, false jei ne
     */
    public function update(Comment $comment)
    {
        return $this->model->update($comment->getData(), [
            'id' => $comment->getId()
        ]);
    }

    /**
     * Deletes user from database based on its email
     * @param Comment $comment
     * @return boolean true jei irase, false jei ne
     */
    public function delete(Comment $comment)
    {
        return $this->model->delete([
            'id' => $comment->getId()
        ]);
    }

    /**
     * Deletes all users from database
     */
    public function deleteAll()
    {
        return $this->model->delete();
    }


}