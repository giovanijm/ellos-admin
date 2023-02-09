<?php

namespace App\Repositories\Admin\ManagerUser;

use App\Models\Permission;
use App\Repositories\AbstractRepository;
use App\Repositories\Admin\ManagerUser\Interface\PermissionRepositoryInterface;

class PermissionRepository extends AbstractRepository implements PermissionRepositoryInterface
{
    protected $model = Permission::class;
}
