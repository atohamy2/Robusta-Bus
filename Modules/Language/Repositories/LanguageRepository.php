<?php

namespace Modules\Language\Repositories;

use App\Enums\Pagination;
use Modules\Language\Models\Language;

class LanguageRepository
{
    public function allWithPaginate()
    {
        return Language::paginate(Pagination::PER_PAGE);
    }

    public function all()
    {
        return Language::all();
    }

    public function store($request)
    {
        return Language::create($request->all());
    }

    public function update($request, $id)
    {
        $language = Language::findOrFail($id);
        $language->fill($request->all());
        $language->save();
        return $language;
    }

    public function delete($id)
    {
        return Language::find($id)->delete();
    }

    public function show($id)
    {
        return Language::findOrFail($id);
    }

    public function newInstance()
    {
        return new Language;
    }

    public function search($request)
    {
        return Language::when($request->filled('language_name'), function($query) use($request){
            $query->where('language_name', 'LIKE', "%{$request->language_name}%");
        })
        ->when($request->filled('language_code'), function($query) use($request){
            $query->where('language_code', $request->language_code);
        })
        ->paginate(Pagination::PER_PAGE);
    }
}
