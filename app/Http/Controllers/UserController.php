<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Patient;
use App\Models\Pending_Appointment;
use App\Models\User_master;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add_appointment()
    {
        // Rendering the view to add appointment along with list of all the available doctors
        return view('users.new_appointment')->with(['doctors' => Doctors::select('name')->get()]);
    }

    // Function to register new patient
    public function save_new_user(Request $request)
    {
        $new_patient = new Patient(); // Creating the object of patient
        $new_user = new User_master();

        $new_user->username = $request->username;
        $new_user->password = md5($request->password);
        if ($new_user->save()) {
            $latest_user = User_master::latest('id')->first(); // Retrieving the latest entry from the table

            if (!is_null($latest_user)) {
                $new_patient->name = $request->name;
                $new_patient->contact = $request->contact;
                $new_patient->dob = $request->dob;
                $new_patient->gender = $request->gender;
                $new_patient->user_id = $latest_user->id;
                $new_patient->role = 'Patient';
                if ($new_patient->save()) {
                    return redirect()->route('user-login');
                }
            }
        }
    }

    // Function to book appointment
    public function new_appointment(Request $request)
    {
        $appointment = new Pending_Appointment(); // Creating the object of the new appointment table
        $current_user = session()->get('user'); // Get Id of the current user from the session
        $appointment->user_id = $current_user;
        $appointment->symptoms = $request->symptoms;
        $appointment->date = $request->appointment_date;
        $appointment->doctor = $request->doctor;
        $appointment->status = 'Pending';

        if ($appointment->save()) {
            return redirect()->route('all_appointments');
        }
    }

    public function all_appointment()
    {
        $current_user = session()->get('user');
        // Function to render view all appointments with list of all the appointments
        $appointments = Pending_Appointment::join('user_masters', 'pending__appointments.user_id', '=', 'user_masters.id')->where('pending__appointments.user_id', '=', $current_user)->select('pending__appointments.*')->get();

        $data = compact('appointments');
        return view('users.all_appointments')->with($data);
    }

    public function new_patient()
    {
        return view('users.register_patient');
    }

    public function update_patient()
    {
        $user_id1 = session()->get('user');
        $users = Patient::join('user_masters', 'patients.user_id', '=', 'user_masters.id')->where('patients.user_id', '=', $user_id1)->select('patients.id as patient_id', 'patients.name', 'patients.contact', 'patients.dob', 'patients.gender', 'user_masters.username')->first();
        $data = compact('users');
        return view('users.update_profile')->with($data);
    }

    public function save_patient_update(Request $request,$id)
    {
        $patient = Patient::find($id);
        $user = User_master::where('id','=',$id)->first();
        if($request->password)
        {
            $user->update([
                'username'=> $request->username,
                'password' => $request->password
            ]);
        }
        else
        {
            $user->update([
                'username' => $request->username
            ]);
        }

        $patient->update([
            'name' => $request->name,
            'contact' =>$request->contact,
            'dob' => $request->dob,
            'gender' => $request->gender,
        ]);

        return redirect()->route('user-login');
    }
}
