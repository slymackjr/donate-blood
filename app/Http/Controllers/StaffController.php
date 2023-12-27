<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\StaffMember;
use Illuminate\Http\Request;
use App\Models\HospitalOfficer;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    public function index(){
        return view('home');
    }
    public function RequestDonor(): View
    {
        $staff = new HospitalOfficer();
        $staffMember = $this->getCurrentStaffMember(); // Implement a method to get the current staff member
        $username = $staffMember->getAttribute('email');

        return view('request-donor', [
            'username' => $username,
            'fewDonors' => $staff->viewFewDonors(),
            'allDonors' => $staff->viewDonors(),
        ]);
    }

    private function getCurrentStaffMember(): StaffMember
    {
        // Implement logic to get the current staff member using the session or other means
        // Example assumes you have an 'email' key in the session
        $email = Session::get('email');
        
        // Replace the line below with your actual logic to retrieve a staff member by email
        return StaffMember::where('email', $email)->firstOrFail();
    }

    public function showRegisterForm()
    {
        return view('register-staff');
    }

    public function register(Request $request)
    {
     
        $formFields = $request->validate(StaffMember::$rules);
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $jobTitle = $request->input('jobTitle');
        $department = $request->input('department');
        $password = $request->input('password');
        $confirmPassword = $request->input('password_confirmation');
        $gender = $request->input('gender');
        $hospital = $request->input('hospital');

        $hospitalOfficer = new HospitalOfficer();
        $message = $hospitalOfficer->registerStaff(
            'register', 
            $name, 
            $username, 
            $email, 
            $address, 
            $phone, 
            $jobTitle,
            $department, 
            $hospital,
            $password, 
            $confirmPassword, 
            $gender
        );

        // Handle redirection based on success or failure
        if ($message) {
            // Registration successful
            return redirect()->route('login.staff');
        } else {
            // Registration failed
            return redirect()->route('register.staff');
        }
    }

    public function showLoginForm()
    {
        return view('login-staff');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $hospitalOfficer = new HospitalOfficer();
        $success = $hospitalOfficer->LoginStaff($email, $password);

         // Handle redirection based on success or failure
         if ($success) {
            // Login successful
            return redirect()->route('staff.requestDonor');
        } else {
            // Login failed
            return redirect()->route('login.staff')->with('error', 'Incorrect email or password');
        }
    }

    public function logout()
{
    $staff = new HospitalOfficer();
    if ($staff->logoutStaff()) {
        return redirect()->route('login.staff')->with('success', 'You have been logged out.');
    }

    return redirect()->route('staff.requestDonor');
}

}
