<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Users\Http\Requests\UserRequest;
use Modules\Users\Repositories\UserRepository;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['result'] = $this->userRepository->allWithPaginate();
        return view('users::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['model'] = $this->userRepository->newInstance();
        return view('users::create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UserRequest $request)
    {
        $user = $this->userRepository->store($request);
        $this->userRepository->assignRole($user, $request->role_id);
        return redirect()->route('users.index')->with(['status' => 'success', 'message' => __('Created Successfully')]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data['model'] = $this->userRepository->show($id);
        return view('users::show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['model'] = $this->userRepository->show($id);
        return view('users::edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->userRepository->update($request, $id);
        $this->userRepository->assignRole($user, $request->role_id);
        return redirect()->route('users.index')->with(['status' => 'success', 'message' => __('Updated Successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return redirect()->route('users.index')->with(['status' => 'success', 'message' => __('Deleted Successfully')]);
    }
}
