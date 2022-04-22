<?php

namespace Modules\Roles\Repositories;

use App\Enums\Pagination;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function allWithPaginate()
    {
        return Role::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Role::all();
    }

    public function store($request)
    {
        return Role::create($request->all());
    }

    public function update($request, $id)
    {
        $role = Role::findOrFail($id);
        $role->fill($request->all());
        $role->save();
        return $role;
    }

    public function delete($id)
    {
        return Role::find($id)->delete();
    }

    public function show($id)
    {
        return Role::findOrFail($id);
    }

    public function newInstance()
    {
        return new Role;
    }

    public function search($request)
    {
        return Role::when($request->filled('role_name'), function($query) use($request){
            $query->where('name', 'LIKE', "%{$request->role_name}%");
        })
        ->paginate(Pagination::PER_PAGE);
    }
}
