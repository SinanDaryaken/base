<?php

namespace App\Http\Controllers\Admin\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\StoreRequest;
use App\Http\Requests\Admin\Admin\UpdateRequest;
use App\Models\Admin;
use App\Repositories\AdminRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * AdminController constructor
     *
     * @param AdminRepository $adminRepository
     */
    public function __construct(
        private AdminRepository $adminRepository,
        private RoleRepository  $roleRepository
    )
    {
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        canUser('admins.index');
        $admins = $this->adminRepository->getByFiltered();
        return view('admin.pages.panel.admin.index', compact('admins'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = $this->roleRepository->getAll();
        return view('admin.pages.panel.admin.create', compact('roles'));
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $roles = $request->get('roles');
        $admin = $this->adminRepository->store($data);
        $this->roleRepository->syncAdmin($admin, $roles);
        return redirect()->route('admin.admins.index');
    }

    /**
     * @param $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $admin = $this->adminRepository->getById($id);
        $roles = $this->roleRepository->getAll();
        $selectedRoles = $admin->roles->pluck('id')->toArray();

        return view('admin.pages.panel.admin.edit', compact('admin', 'roles', 'selectedRoles'));
    }

    /**
     * @param UpdateRequest $request
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Admin $admin)
    {
        $data = $request->except('_token');
        $roles = $request->get('roles');
        $this->adminRepository->update($admin, $data);
        $this->roleRepository->syncAdmin($admin, $roles);
        return redirect()->route('admin.admins.index');
    }

    /**
     * @param Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Admin $admin)
    {
        $this->roleRepository->detach($admin);
        $this->adminRepository->destroy($admin);
        return redirect()->route('admin.admins.index');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function filtered(Request $request)
    {
        $search = $request->get('search');
        $admins = $this->adminRepository->getByFiltered($search);
        return view('admin.pages.panel.admin.modules.table', compact('admins'))->render();
    }
}
