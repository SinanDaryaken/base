<?php

namespace App\Interfaces;

use App\Models\Admin;
use Illuminate\Contracts\Pagination\Paginator;

interface AdminInterface extends BaseInterface
{
    /**
     * @param string|null $search
     * @return Paginator
     */
    public function getByFiltered(?string $search = null): Paginator;

    /**
     * @param array $data
     * @return Admin
     */
    public function store(array $data): Admin;

    /**
     * @param Admin $admin
     * @param array $admin
     * @return Admin
     */
    public function update(Admin $admin, array $data): Admin;

    /**
     * @param Admin $admin
     * @return bool
     */
    public function destroy(Admin $admin): bool;
}
