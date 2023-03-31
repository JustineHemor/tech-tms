<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUserRole extends Component
{
    public $user;
    public $user_roles = [];
    public $roles;

    public function mount(User $user)
    {
        $this->roles = Role::all();
        $this->user_roles = $user->roles->pluck('id')->toArray();
    }

    public function updateRoles()
    {

    }

    public function render()
    {
        return view('livewire.edit-user-role');
    }
}
