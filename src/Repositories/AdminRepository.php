<?php

namespace Nonoco\Base\Repositories;

use Nonoco\Base\Interfaces\AdminInterface;
use Nonoco\Base\Models\Admin;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection as DatabaseCollection;

class AdminRepository implements AdminInterface
{
    /**
     * @param Admin $admin
     */
    public function __construct(protected Admin $admin)
    {
    }

    /**
     * @param string $id
     * @return Admin
     */
    public function getById(string $id): Admin
    {
        return $this->admin->findOrFail($id);
    }

    /**
     * @return DatabaseCollection
     */
    public function getAll(): DatabaseCollection
    {
        return $this->admin->all();
    }

    /**
     * @param string|null $search
     * @param int $perPage
     * @return Paginator
     */
    public function getByFiltered(?string $search = null, int $perPage = 10): Paginator
    {
        return $this->admin
            ->when($search, function ($query, $search) {
                $query->orWhere('first_name', 'like', "%{$search}%");
                $query->orWhere('last_name', 'like', "%{$search}%");
                $query->orWhereRaw("concat(first_name, ' ', last_name) like '%" . $search . "%' ");
                $query->orWhere('email', 'like', "%{$search}%");
            })
            ->where('super', false)
            ->paginate($perPage);
    }

    /**
     * @param array $data
     * @return Admin
     */
    public function store(array $data): Admin
    {
        $data['password'] = bcrypt($data['password']);
        return $this->admin->create($data);
    }

    /**
     * @param Admin $admin
     * @param array $data
     * @return Admin
     */
    public function update(Admin $admin, array $data): Admin
    {
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $admin->update($data);
        return $admin;
    }

    /**
     * @param Admin $admin
     * @return bool
     */
    public function destroy(Admin $admin): bool
    {
        return $admin->delete();
    }
}
