<?php

namespace App\Http\Controllers;

use App\Models\Pending_Appointment;
use App\Models\User_master;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Function to approve update
    public function approve_appointment($id)
    {
        $pending = Pending_Appointment::find($id);
        $pending->update([
            'status' => 'Approved'
        ]);
        return redirect()->route('appointment_master');
    }

    public function appointment_master()
    {
        $appointments = Pending_Appointment::join('user_masters', 'pending__appointments.user_id', '=', 'user_masters.id')->join('patients', 'pending__appointments.user_id', '=', 'patients.user_id')->select('pending__appointments.*', 'patients.name')->get();
        $data = compact('appointments');
        return view('admin.all_appointments')->with($data);
    }

    public function reject_appointment($id)
    {   
        $pending = Pending_Appointment::find($id);
        $pending->delete();
        return redirect()->route('appointment_master');
    }

    public function update_admin()
    {
        $user_id = session()->get('user');
        return view('admin.update_user')->with(['user1' => User_master::find($user_id)]);
    }

    public function save_admin_update(Request $request)
    {
        $user = User_master::find(session()->get('user'));
        if($user)
        {
            if($request->password != "")
            {
                $user->update([
                    'username' => $request->username,
                    'password' => md5($request->password)
                ]);
            }
            else
            {
                $user->update([
                    'username' => $request->username
                ]);
            }

            return redirect()->route('admin-login');
        }
    }
}
