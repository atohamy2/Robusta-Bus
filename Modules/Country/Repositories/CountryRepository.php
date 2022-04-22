<?php

namespace Modules\Country\Repositories;

use App\Enums\Pagination;
use Modules\Country\Models\Country;
use Modules\Language\Models\Language;

class countryRepository
{
    public function allWithPaginate()
    {
        return Country::with('langauge')->paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Country::all();
    }

    public function store($request)
    {

        return Country::create($request->all());
    }

    public function update($request, $id)
    {
        $country = Country::findOrFail($id);
        $country->fill($request->all());
        $country->save();
        return $country;
    }

    public function delete($id)
    {
        return Country::find($id)->delete();
    }
   

    public function show($id)
    {
        
        return Country::findOrFail($id)->load('cities');
    }

    public function newInstance()
    {
        return new country;
    }

    public function search($request)
    {
        return Country::when($request->filled('country_name'), function ($query) use ($request) {
            $query->where('country_name', 'LIKE', "%{$request->country_name}%");
        })
            ->when($request->filled('country_code'), function ($query) use ($request) {
                $query->where('country_code', $request->country_code);
            })
            ->paginate(Pagination::PER_PAGE);
    }
}
