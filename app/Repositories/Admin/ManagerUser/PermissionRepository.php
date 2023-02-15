<?php

namespace App\Repositories\Admin\ManagerUser;

use App\Models\Admin\ManagerUser\Permission;
use App\Repositories\AbstractRepository;
use App\Repositories\Admin\ManagerUser\Interface\PermissionRepositoryInterface;

class PermissionRepository extends AbstractRepository implements PermissionRepositoryInterface
{
    protected $model = Permission::class;

    public function getWhere(array $where = null, $with, $numPorPagina)
    {
        $result = $this->model::sortable();

        if(!$where)
            $result->where($where[0], $where[1], $where[2]);

        $result->with($with)->paginate($numPorPagina);
        return $result;
    }
}
