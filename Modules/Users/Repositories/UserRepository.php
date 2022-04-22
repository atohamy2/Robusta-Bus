<?php

namespace Modules\Users\Repositories;

use App\Enums\Pagination;
use Modules\Users\Models\User;

class UserRepository
{
    public function allWithPaginate()
    {
        return User::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return User::all();
    }

    public function store($request)
    {
        return User::create($request->all());
    }

    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        return $user;
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function newInstance()
    {
        return new User;
    }

    public function search($request)
    {
        return User::when($request->filled('name'), function($query) use($request){
            $query->where('name', 'LIKE', "%{$request->name}%");
        })
        ->when($request->filled('email'), function($query) use($request){
            $query->where('email', $request->email);
        })
        ->paginate(Pagination::PER_PAGE);
    }

    public function assignRole($user, $role)
    {
        return $user->assignRole($role);
    }
}
