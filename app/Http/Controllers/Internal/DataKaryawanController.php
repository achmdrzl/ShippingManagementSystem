<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = User::all();
        $role = Role::all();
        return view(
            'backend.dataKaryawan.index',
            [
                'name' => 'Data Karyawan | Page',
                'employee' => $employee,
                'role' => $role
            ]
        );
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password|min:8',
            'city' => 'required',
            'role' => 'required',
            'g-recaptcha-response' => 'recaptcha'
        ]
    );

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('role'));

        Toastr::success('Karyawan Berhasil di Tambahkan!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('employee.index')->with([
            'message' => 'User Created Successfully',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Karyawan',
            'data'    => $user,
            'roles' => $roles,
            'userRoles' => $userRole
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->employee_id,
            'password' => 'same:confirm-password',
            'city' => 'required',
            'role' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($request->employee_id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $request->employee_id)->delete();

        $user->assignRole($request->input('role'));

        Toastr::success('Karyawan Berhasil di Perbaharui!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('employee.index')->with([
            'message' => 'User Updated Successfully',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        User::find($request->employee_id)->delete();

        Toastr::error('Karyawan Berhasil di Hapus!', 'Success', ["progressBar" => true, "positionClass" => "toast-top-right",]);

        return redirect()->route('employee.index')->with([
            'message' => 'User Created Successfully',
            'type' => 'success',
        ]);
    }
}
