<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::latest()->paginate(10);
        return view('admin.role.index', compact('role'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        // dd( $category);
        // dd($category->products);
        return view('admin.role.show', compact('role'));
    }
    public function store(Request $request)
    {
        $requestData = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        Role::create($requestData);

        return redirect()
            ->route('role.index')
            ->withMessage('Successfully Created');
    }


    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);


        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();



        return redirect()
            ->route('role.index')
            ->withMessage('Successfully update');
    }

    public function destory($id)
    {
        $Role = Role::find($id);
        $Role->delete();
        return redirect()
            ->route('role.index')
            ->withMessage('Successfully deleted');
    }


    public function trash()
    {
        $role = Role::onlyTrashed()->get();
        return view('admin.role.trash', compact('role'));
    }

    public function restore($id)
    {
        $Role = Role::onlyTrashed()->find($id);
        $Role->restore();
        return redirect()
            ->route('role.trash')
            ->withMessage('Successfully restore');
    }

    public function delete($id)
    {
        $Role = Role::onlyTrashed()->find($id);
        $Role->forceDelete();
        return redirect()
            ->route('role.trash')
            ->withMessage('Successfully deleted');
    }
}
