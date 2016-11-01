<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\CreateNewUserRequest;
use App\Http\Requests\UpdateNewUserRequest;

class UserController extends Controller
{

    protected $user;

    protected $role;

    /**
     * Inject all models
     *
     * @param User $user
     */
    public function __construct(
        User $user,
        Role $role
    )
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewUserRequest $request)
    {
        $user = $this->user->create( array_except($request->all(), ['roles']) );

        $user->roles()->attach([ $request->get('roles') ]);

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->find($id);

        $roles = $this->role->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewUserRequest $request, $id)
    {
        $user = $this->user->find($id);

        $old_password = $request->get('old_password');
        $password = $request->get('password');

        if(! $old_password && $password )
            return back()
                ->withErrors([ 'old_password' => 'The old password field is required.' ]);

        if(! \Hash::check($old_password, $user->password) && $old_password )
            return back()
                ->withErrors([ 'old_password' => 'Password yang anda masukkan salah!' ]);

        $user->update( array_except($request->all(), ['roles']) );

        $user->roles()->sync([ $request->get('roles') ]);

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->destroy($id);

        return redirect('admin/users');
    }
}
