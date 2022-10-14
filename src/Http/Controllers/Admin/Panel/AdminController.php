<?php

namespace Nonoco\Base\Http\Controllers\Admin\Panel;

use Illuminate\Http\Request;
use Nonoco\Base\Http\Controllers\Controller;
use Nonoco\Base\Http\Requests\Admin\Admin\StoreRequest;
use Nonoco\Base\Http\Requests\Admin\Admin\UpdateRequest;
use Nonoco\Base\Models\Admin;
use Nonoco\Base\Repositories\AdminRepository;
use Nonoco\Base\Repositories\RoleRepository;

class AdminController extends Controller
{
    /**
     * @param AdminRepository $adminRepository
     */
    public function __construct(
        private AdminRepository $adminRepository,
    )
    {
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        $admins = $this->adminRepository->getByFiltered();
        return view('admin.pages.panel.admin.index', compact('admins'));
    }

    /**
     * @return mixed
     */
    public function create(): mixed
    {
        $roles = $this->roleRepository->getAll();
        return view('admin.pages.panel.admin.create', compact('roles'));
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request): mixed
    {
        $data = $request->except('_token');
        $roles = $request->get('roles');
        $admin = $this->adminRepository->store($data);
        $this->roleRepository->syncAdmin($admin, $roles);
        return redirect()->route('admin.admins.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id): mixed
    {
        $admin = $this->adminRepository->getById($id);
        $roles = $this->roleRepository->getAll();
        $selectedRoles = $admin->roles->pluck('id')->toArray();

        return view('admin.pages.panel.admin.edit', compact('admin', 'roles', 'selectedRoles'));
    }

    /**
     * @param UpdateRequest $request
     * @param Admin $admin
     * @return mixed
     */
    public function update(UpdateRequest $request, Admin $admin): mixed
    {
        $data = $request->except('_token');
        $roles = $request->get('roles');
        $this->adminRepository->update($admin, $data);
        $this->roleRepository->syncAdmin($admin, $roles);
        return redirect()->route('admin.admins.index');
    }

    /**
     * @param Admin $admin
     * @return mixed
     */
    public function destroy(Admin $admin): mixed
    {
        $this->roleRepository->detach($admin);
        $this->adminRepository->destroy($admin);
        return redirect()->route('admin.admins.index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function filtered(Request $request): mixed
    {
        $search = $request->get('search');
        $admins = $this->adminRepository->getByFiltered($search);
        return view('admin.pages.panel.admin.modules.table', compact('admins'))->render();
    }
}
