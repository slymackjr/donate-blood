<?php

namespace App\Models;
use App\Models\BloodDonor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Donor 
{
    protected int $donor_id;
    protected string $username;
    protected string $full_name;
    protected string $gender;
    protected string $blood_type;
    protected string $address;
    protected string $phone_number;
    protected string $birthdate;
    protected string $email;
    protected string $password;
    protected string $register_date;
    protected string $status;

    // constructor for the class which is inherited by other classes,
    public function __construct($email = null)
    {
        if ($email !== null) {
            $this->getDonorDetails($email);
        }
    }

  
        // Getter and Setter for donor_id
        public function getDonorId(): int {
            return $this->donor_id;
        }
    
        public function setDonorId(int $donorId): void {
            $this->donor_id = $donorId;
        }
    
        // Getter and Setter for username
        public function getUsername(): string {
            return $this->username;
        }
    
        public function setUsername(string $username): void {
            $this->username = $username;
        }
    
        // Getter and Setter for full_name
        public function getFullName(): string {
            return $this->full_name;
        }
    
        public function setFullName(string $fullName): void {
            $this->full_name = $fullName;
        }
    
        // Getter and Setter for gender
        public function getGender(): string {
            return $this->gender;
        }
    
        public function setGender(string $gender): void {
            $this->gender = $gender;
        }
    
        // Getter and Setter for blood_type
        public function getBloodType(): string {
            return $this->blood_type;
        }
    
        public function setBloodType(string $bloodType): void {
            $this->blood_type = $bloodType;
        }
    
        // Getter and Setter for address
        public function getAddress(): string {
            return $this->address;
        }
    
        public function setAddress(string $address): void {
            $this->address = $address;
        }
    
        // Getter and Setter for phone_number
        public function getPhoneNumber(): string {
            return $this->phone_number;
        }
    
        public function setPhoneNumber(string $phoneNumber): void {
            $this->phone_number = $phoneNumber;
        }
    
        // Getter and Setter for birthdate
        public function getBirthdate(): string {
            return $this->birthdate;
        }
    
        public function setBirthdate(string $birthdate): void {
            $this->birthdate = $birthdate;
        }
    
        // Getter and Setter for email
        public function getEmail(): string {
            return $this->email;
        }
    
        public function setEmail(string $email): void {
            $this->email = $email;
        }
    
        // Getter and Setter for password
        public function getPassword(): string {
            return $this->password;
        }
    
        public function setPassword(string $password): void {
            $this->password = $password;
        }
    
        // Getter and Setter for register_date
        public function getRegisterDate(): string {
            return $this->register_date;
        }
    
        public function setRegisterDate(string $registerDate): void {
            $this->register_date = $registerDate;
        }
    
        // Getter and Setter for status
        public function getStatus(): string {
            return $this->status;
        }
    
        public function setStatus(string $status): void {
            $this->status = $status;
        }

    
     // method to clean any harmful entry such harmful code etc.
     public function sanitizeString($variable): array|bool|string
     {
         $variable = strip_tags($variable);
         $variable = htmlentities($variable);
         $variable = stripslashes($variable);
         $result = "'".$variable."'"; // This adds single quotes
         return str_replace("'", "", $result); // So now remove them
     }
 
    //insert into product reviews table
    public function getDonorDetails($email = null): bool
    {
        $success = false;
        $user = null;

        if ($email != null) {
            try {
                // Use Eloquent model to retrieve the donor based on the email
                $user = BloodDonor::where('email', $email)->first();

                if ($user != null) {
                    // Assign values to class properties
                    $this->donor_id = $user->donor_id;
                    $this->username = $user->username;
                    $this->full_name = $user->full_name;
                    $this->email = $user->email;
                    $this->gender = $user->gender;
                    $this->blood_type = $user->blood_type;
                    $this->address = $user->address;
                    $this->phone_number = $user->phone_number;
                    $this->status = $user->status;
                    $this->register_date = $user->register_date;

                    $success = true;
                }
            } catch (ModelNotFoundException $e) {
                "There is some problem in connection: " . $e->getMessage();
            }
        }
        return $success;

    }

    public function LoginDonor($email, $password): bool
    {
        
        // Sanitize to avoid malicious script processing in the database.
        $email = $this->sanitizeString($email);

        // Use Eloquent model to retrieve the officer based on the email
        $user = BloodDonor::where('email', $email)->first();

        if ($user !== null) {
            if ($user->status) {
                 // Attempt to authenticate using the 'staff' guard
                if (Auth::guard('donors')->attempt(['email' => $email, 'password' => $password])) {
                     // Authentication successful, store email in session
                     Session::put('email', $email);
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function logoutDonor(): bool
{
    // Logout the user from the 'staff' guard
    if(Auth::guard('donors')->logout()){
        
        return true;
    }
    return false;
}

    // Business logic to register staff using Eloquent
    public function registerDonor($register, $name, $username, $email, $address, $phone, $blood_type,$birthdate, $password, $confirmPassword, $gender): bool
    {

        if (isset($register)) {
            if ($password != $confirmPassword) {
                session()->flash('error', 'Passwords did not match');
                return false;
            } else {
                // Use Eloquent model to check if the email is already taken
                $existingUser = BloodDonor::where('email', $email)->count();

                if ($existingUser > 0) {
                    session()->flash('error', 'Email already taken');
                    return false;
                } else {

                  // Check if the username is already taken
            $usernameExists = BloodDonor::where('username', $username)->exists();

            if ($usernameExists) {
                session()->flash('error', 'Username already taken');
                return false;
            }
                    $now = now();
                    $code = 'Active';

                    // Use Eloquent model to insert new staff member
                    $newBloodDonor = new BloodDonor();
                    $newBloodDonor->setAttribute('email', $email);
                    $newBloodDonor->setAttribute('password', Hash::make($password));
                    $newBloodDonor->setAttribute('full_name',$name);
                    $newBloodDonor->setAttribute('username',$username);
                    $newBloodDonor->setAttribute('status',$code);
                    $newBloodDonor->setAttribute('register_date',$now);
                    $newBloodDonor->setAttribute('gender',$gender);
                    $newBloodDonor->setAttribute('address',$address);
                    $newBloodDonor->setAttribute('blood_type',$blood_type);
                    $newBloodDonor->setAttribute('birthdate',$birthdate);
                    $newBloodDonor->setAttribute('phone_number',$phone);

                    if ($newBloodDonor->save()) {
                         // Log in the user after successful registration
                          // Use Eloquent model to retrieve the officer based on the email
                        $user = BloodDonor::where('email', $email)->first();

                        if ($user !== null) {
                            if ($user->status) {
                                // Attempt to authenticate using the 'staff' guard
                                if (Auth::guard('donors')->attempt(['email' => $email, 'password' => $password])) {
                                    // Authentication successful, store email in session
                                    Session::put('email', $email);
                                    session()->flash('success', 'Registered successfully.');
                                    return true;
                                } else {
                                    return false;
                                }
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                        
                    } else {
                        session()->flash('error', 'Failed to Register! Please try again.');
                        return false;
                    }
                }
            }
        } else {
            session()->flash('error', 'Fill up signup form first');
            return false;
        }
    }


    public function viewBloodRequests($status): array
    {
        $resultArray = array();

        try {
            $requests = BloodRequest::join('staff_members', 'blood_requests.staff_email', '=', 'staff_members.email')
            ->join('hospitals', 'staff_members.hospital_id', '=', 'hospitals.hospital_id')
            ->where('blood_requests.donor_email', session('email'))
            ->where('blood_requests.request_status', $status)
            ->get(['blood_requests.*', 'staff_members.*', 'hospitals.*']);
        
            // Convert the Eloquent collection to an array
            $resultArray = $requests->toArray();
        } catch (ModelNotFoundException $e) {
            "There is some problem in connection: " . $e->getMessage();
        }

        return $resultArray;
    }


    public function rejectRequest($request_id,$status): bool
    {
        $request = BloodRequest::where('request_id', $request_id)
                                ->where('request_status', $status)
                                ->first();
         if ($request) {
            return $request->delete();
        }
                            
        return false;
}

public function acceptRequest($request_id): bool
{
    $request = BloodRequest::where('request_id', $request_id)
        ->where('request_status', 'Pending')
        ->first();

    if ($request) {
        // Update the status to 'Approved'
        $request->update(['request_status' => 'Approved']);

        return true;
    }

    return false;
}


}