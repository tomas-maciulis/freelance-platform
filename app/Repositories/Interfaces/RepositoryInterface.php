<?php


namespace App\Repositories\Interfaces;


interface RepositoryInterface
{
    public function getAll();

    public function getById(int $id);

    public function create(array $attributes);

    public function update(int $id, array $attributes);

    public function delete(int $id);
}
