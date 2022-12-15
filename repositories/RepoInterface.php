<?php

namespace starter\repositories;

interface RepoInterface
{
    public function findAll();
    public function findByID($id);
    public function deleteByID($id);
    public function save($entity);
}
