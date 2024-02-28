<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index(): View
    {
        return view('home');
    }
    public function viewRequests(): View
    {
        $donor = new Donor(session('email'));
        $requests = $donor->viewBloodRequests('Pending');
        $username = $donor->getUsername();

        return view('donor.home-donor', [
            'username' => $username,
            'allDonors' => $requests,
        ]);
    }

    public function showRegisterForm(): View
    {
        return view('donor.register-donor');
    }

    public function register(Request $request): RedirectResponse
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $blood_type = $request->input('blood_type');
        $birthdate = $request->input('birthdate');
        $password = $request->input('password');
        $confirmPassword = $request->input('password_confirmation');
        $gender = $request->input('gender');

        $hospitalOfficer = new Donor();
        $message = $hospitalOfficer->registerDonor(
            'register', 
            $name, 
            $username, 
            $email, 
            $address, 
            $phone, 
            $blood_type,
            $birthdate, 
            $password, 
            $confirmPassword, 
            $gender
        );

        // Handle redirection based on success or failure
        if ($message) {
            // Registration successful
            return redirect()->route('donor.showRequests');
        } else {
            // Registration failed
            return redirect()->route('register.donor');
        }
    }

    public function showLoginForm(): View
    {
        return view('donor.login-donor');
    }

    public function login(Request $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $donor = new Donor();
        $success = $donor->LoginDonor($email, $password);

         // Handle redirection based on success or failure
         if ($success) {
            // Login successful
            session()->flash('success', 'Welcome back.');
            return redirect()->route('donor.showRequests');
        } else {
            // Login failed
            return redirect()->route('login.donor')->with('error', 'Incorrect email or password');
        }
    }

    public function logout(): RedirectResponse
{
    $staff = new Donor();
    if ($staff->logoutDonor()) {
        return redirect()->route('login.donor')->with('success', 'You have been logged out.');
    }

    return redirect()->route('donor.showRequests');
}

public function showAboutUs():View
{
    $donor = new Donor(session('email'));
    $username = $donor->getUsername();
    return view('donor.about-us', [
        'username' => $username,
    ]);
}

public function showContactUs():View
{
    $donor = new Donor(session('email'));
    $username = $donor->getUsername();
    return view('donor.contact-us', [
        'username' => $username,
    ]);
}

public function rejectRequests(Request $request): View
{
    $request_id = $request->input('request_id');
    $requests = new Donor();
    if($requests->rejectRequest($request_id,'Pending')){
        session()->flash('success', 'Appointment Cancelled!.');
        return $this->viewRequests();
    }
    session()->flash('success', 'Appointment failed to cancel! try Again.');
    return $this->viewRequests();
}

public function approveRequests(Request $request): View
    {
        $request_id = $request->input('request_id');
        $requests = new Donor();
        if($requests->acceptRequest($request_id)){
            session()->flash('success', 'Appointment Accepted!.');
            return $this->viewRequests();
        }
        session()->flash('success', 'Failed to Accept Appointment! try Again.');
        return $this->viewRequests();
    }


public function viewAppointments(): View
{
    $donor = new Donor(session('email'));
    $requests = $donor->viewBloodRequests('Approved');
    $username = $donor->getUsername();
    return view('donor.appointments', [
        'username' => $username,
        'allDonors' => $requests,
    ]);
}

public function showProfile(): View
{
    $donor = new Donor(session('email'));
    return view('donor.profile-donor',[
        'donor' => $donor
    ]);
}


}
