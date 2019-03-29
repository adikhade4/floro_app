<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\UserActivity;
use App\Http\Controllers\DB;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Kyslik\ColumnSortable\Sortable;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'username' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'houseno' => ['required', 'integer'],
            'postalcode' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'address' => $request['address'],
            'houseno' => $request['houseno'],
            'city' => $request['city'],
            'postalcode' => $request['postalcode'],
            'telephoneno' => $request['telephoneno'],
            'password' => $request['password'],
        ]);

        return redirect('/home');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        $user->username = request('username');
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->address = request('address');
        $user->city = request('city');
        $user->houseno = request('houseno');
        $user->postalcode = request('postalcode');
        $user->telephoneno = request('telephoneno');
        $user->email = request('email');
        $record1 = $user->getOriginal();
        $record = $user->getDirty();
        $user->save();
        $user->getDirty();
        if ($user->exists && count($record) > 0) 
        {
            $primarykey = isset($user->primarykey) ? $user->primarykey : 'id';
            
            foreach ($record as $key => $value) 
            {
                $change = new UserActivity();
                $change->user_id = $user->id;
                $change->modified_by = $user->username;
                $change->field_name = $key;
                $change->old_value = $record1[$key];
                $change->new_value = $value;
                $change->save();
            }
        }
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('/home');
    }

    public function search(Request $request)
    {
        $serach = $request->get('search');
        $user = \DB::table('users')->where('username', 'like', '%' . $serach . '%')
            ->orWhere('firstname', 'like', '%' . $serach . '%')
            ->orWhere('lastname', 'like', '%' . $serach . '%')
            ->orWhere('email', 'like', '%' . $serach . '%')->paginate(10);

        return view('/home', ['user' => $user]);
    }


    public function export()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }
    public function collection()
    {
        return User::all();
    }

    /**
     * @return array
     */
    public function headings() : array
    {
        return [
            '#',
            'id',
            'Username',
            'email',
            'fristname',
            'lastname',
            'address',
            'houseno'
        ];
    }

    public function map()
    {
        return view('/mapped');
    }
}
