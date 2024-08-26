<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class NuevoUsuario extends Component
{
    public $roles, $role_id, $name, $email, $cedula;

    public function mount()
    {
        $this->roles = Role::where('id', '!=', 1)->get();
    }

    public function render()
    {
        return view('livewire.nuevo-usuario')->extends('adminlte::page');
    }

    protected $listeners = ['registrar'];
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'cedula' => 'required|min:4',
        'role_id' => 'required',
    ];

    public function registrar()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $role = Role::find($this->role_id);
            $user = User::create([
                "name" => $this->name,
                "email" => $this->email,
                "cedula" => $this->cedula,
                "password" => bcrypt($this->cedula),
            ])->assignRole($role->name);
            DB::commit();
            return redirect()->route('nuevousuario')->with('success', 'Usuario creado correctamente');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->emit('error', 'Ha ocurrido un error.');
        }
    }
}
