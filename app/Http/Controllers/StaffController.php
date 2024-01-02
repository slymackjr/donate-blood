<?php

namespace App\Http\Controllers;

use Log;
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
            return redirect()->route('staff.requestDonor');
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
            session()->flash('success', 'Welcome back.');
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

   
    public function showCreateRequest(Request $request): View
    {
          // Access the session data
          $donorEmail =  $request->input('donor_email');
          $username =  Session::get('email');

          $hospitalOfficer = new HospitalOfficer();

          $hospitalOfficer->getOfficerDetails($username); 

        return view('request-donor-create', [
            'username' => $username,
            'staffname' => $hospitalOfficer->getFullName(),
            'staffphone' => $hospitalOfficer->getPhoneNumber(),
            'staffemail' => $hospitalOfficer->getEmail(),
            'donorDetails' => $hospitalOfficer->createRequest($donorEmail),
        ]);

}

public function submitRequest(Request $request): View
{
    $requesterName = $request->input('requester_name');
    $requesterContact = $request->input('requester_contact');
    $bloodType = $request->input('blood_type');
    $appointmentDate = $request->input('appointment_date');
    $staffEmail = $request->input('staff_email');
    $donorEmail = $request->input('donor_email');

    $staffRequest = new HospitalOfficer();
    $sucess = $staffRequest->submitRequest($requesterName,$requesterContact,$bloodType,$appointmentDate,$staffEmail,$donorEmail);

    if($sucess){
        session()->flash('success_message', 'Your request has been sent.');
        return view('request-donor-create', [
            'username' => $staffEmail,
            'staffname' => $requesterName,
            'staffphone' => $requesterContact,
            'staffemail' => $staffEmail,
            'donorDetails' => $staffRequest->createRequest($donorEmail),
        ]);
    }
    session()->flash('success_message', 'Your request has been sent.');
    return view('request-donor-create', [
        'username' => $staffEmail,
        'staffname' => $requesterName,
        'staffphone' => $requesterContact,
        'staffemail' => $staffEmail,
        'donorDetails' => $staffRequest->createRequest($donorEmail),

    ]);
}



}