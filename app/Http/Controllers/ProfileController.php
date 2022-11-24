<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->Authorize('admin');
        $users = User::all();
        return view('admin.profile.userlist', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile, $id)
    {
        $user = User::find($id);
        return view('admin.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile, $id)
    {
        $user = User::find($id);
        return view('admin.profile.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile, $id)
    {
        $profile = Profile::find($id);
        $imageName = time() . '.' . $request->image->extension();
        // Public Folder
        $request->image->move(public_path('profile/'), $imageName);

        $profile->picture = $imageName;

        DB::beginTransaction();
        $profile->update([
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'facebook_url'   => $request->facebook_url,
            'tweeter_url'   => $request->tweeter_url,
            'biodata'    => $request->biodata,
            'dob'     => $request->dob,
            'picture'   => $imageName,
        ]);



        $profile->user->update(
            [
                'name' => $request->name,
                'email' => $request->email
            ]
        );
        DB::commit();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile, $id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        return redirect()->route('user.index');
    }

    public function role($id)
    {
        $role = User::find($id);
        $option = Role::all();
        return view('admin.profile.role', compact('role', 'option'));
    }
    public function change(Request $request, $id)
    {
        $role = User::find($id);
        $role->role_id = $request->role;
        $role->save();

        return redirect()->route('user.index');
    }
    public function trash()
    {
        $users = User::with('profile')->onlyTrashed()->get();
        return view('admin.profile.trash', compact('users'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        return redirect()
            ->route('user.trash')
            ->withMessage('Successfully restore');
    }

    public function delete($id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->forceDelete();
        return redirect()
            ->route('user.trash')
            ->withMessage('Successfully deleted');
    }
}
