<?php

namespace App\Repositories\Admin\ManagerUser\Interface;

use Illuminate\Database\Eloquent\Model;

interface PermissionRepositoryInterface
{
    public function __construct(Model $model);
    public function store(array $data);
    public function getList();
    public function get($id);
    public function update(array $data, $id);
    public function destroy($id);
    public function getWhere(array $where, $with, $numPorPagina);
}
