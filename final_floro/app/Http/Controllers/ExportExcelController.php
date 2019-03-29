<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use DB;
use Excel;

class ExportExcelController extends Controller
{
    public function index()
    {
        $user_data = DB::table('users')->get();

        return view('export_excel')->with('user_data', $user_data);
    }

    public function excel()
    {
        $user_data=User::join('useractivity', 'users.id', '=', 'useractivity.user_id')
                ->join('authentication_logs', 'users.id', '=', 'useractivity.user_id')
                ->get();
                $users_array[]=array(
                    'username',
                    'email',
                    'firstname',
                    'lastname',
                    'address',
                    'city',
                    'postalcode',
                    'created_at',
                    'user_id',
                    'field_name',
                    'old_value',
                    'new_value',
                    'modified_by',
                    'login_time',
                    'logout_time',
                    'browser_agent',
                    'ip_address');
        // $user_data = User::with('activities')->get()->toArray();
       

        foreach ($user_data as $user) 
        {
            $user_array[] = array(
                'username'=> $user['username'],
                'city'=> $user['city'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'telephoneno' => $user['telephoneno'],
                'address' => $user['address'],
                'created_at' => Carbon::parse($user['created_at'])->format('d/m/Y H:i:s'),
                'user_id' => $user['user_id'],
                'old_value' => $user['old_value'],
                'new_value' => $user['new_value'],
                'field_name' => $user['field_name'],
                'modified_by' => $user['modified_by'],
                'login_time' => $user['login_time'],
                'logout_time' => $user['logout_time'],
                'browser_agent'=> $user['browser_agent'],
                'ip_address'=> $user['ip_address']
            );
        }
        Excel::create('User Data', function ($excel) use ($user_array) {
            $excel->setTitle('User Data');
            $excel->sheet('User Data', function ($sheet) use ($user_array) {
                $sheet->fromArray($user_array);
            });
        })->download('xlsx');
    }
}
