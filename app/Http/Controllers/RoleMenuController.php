<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Menu;
use App\Models\RoleMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleMenuController extends Controller
{
    public function index(Request $request)
    {
        $role_id = $request->input('role_id');

        $roles = Role::all();
        $menus = Menu::all();
        $aksesMenu = [];

        if ($role_id) {
            $aksesMenu = RoleMenu::where('role_id', $role_id)->pluck('menu_id')->toArray();
        }

        return view('role_menu.index', compact('roles', 'menus', 'role_id', 'aksesMenu'));
    }

    public function store(Request $request)
    {
        $role_id = $request->input('role_id');
        $menu_ids = $request->input('menu_id', []);

        // Hapus dulu semua akses untuk role tersebut
        RoleMenu::where('role_id', $role_id)->delete();

        // Simpan ulang akses berdasarkan checkbox
        foreach ($menu_ids as $menu_id) {
            RoleMenu::create([
                'role_id' => $role_id,
                'menu_id' => $menu_id,
            ]);
        }

        return redirect()->back()->with('success', 'Akses menu berhasil disimpan.');
    }
}

