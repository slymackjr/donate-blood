<?php

namespace App\Models;
use App\Models\Hospital;
use App\Models\BloodDonor;
use App\Models\StaffMember;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HospitalOfficer
{
   
    protected string $staff_id;
    protected string $username;
    protected string $full_name;
    protected string $gender;
    protected string $job_title;
    protected string $address;
    protected string $phone_number;
    protected string $department;
    protected string $email;
    protected string $password;
    protected string $register_date;
    protected string $status;
    protected string $hospital_id;
  

    // constructor for the class which is inherited by other classes,
    public function __construct()
    {
        
    }

    // Getter and Setter for staff_id
    public function getStaffId(): string
    {
        return $this->staff_id;
    }

    public function setStaffId(string $staffId): void
    {
        $this->staff_id = $staffId;
    }

    // Getter and Setter for username
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    // Getter and Setter for full_name
    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function setFullName(string $fullName): void
    {
        $this->full_name = $fullName;
    }

    // Getter and Setter for gender
    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    // Getter and Setter for job_title
    public function getJobTitle(): string
    {
        return $this->job_title;
    }

    public function setJobTitle(string $jobTitle): void
    {
        $this->job_title = $jobTitle;
    }

    // Getter and Setter for address
    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    // Getter and Setter for phone_number
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phone_number = $phoneNumber;
    }

    // Getter and Setter for department
    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    // Getter and Setter for email
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // Getter and Setter for password
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    // Getter and Setter for register_date
    public function getRegisterDate(): string
    {
        return $this->register_date;
    }

    public function setRegisterDate(string $registerDate): void
    {
        $this->register_date = $registerDate;
    }

    // Getter and Setter for status
    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    // Getter and Setter for hospital_id
    public function getHospitalId(): string
    {
        return $this->hospital_id;
    }

    public function setHospitalId(string $hospitalId): void
    {
        $this->hospital_id = $hospitalId;
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
    public function getOfficerDetails($email = null): bool
    {
        $success = false;
        $user = null;
       
            if ($email != null){
                try{
                    // Use Eloquent model to retrieve the officer based on the email
                $user = StaffMember::where('email', $email)->first();
                
                if ($user != null){
                // Assign values to class properties
                $this->staff_id = $user->staff_id;
                $this->username = $user->username;
                $this->full_name = $user->full_name;
                $this->email = $user->email;
                $this->gender = $user->gender;
                //$this->department = $user->department;
                $this->address = $user->address;
                $this->phone_number = $user->phone_number;
                $this->email = $user->email;
                $this->status = $user->status;
                $this->register_date = $user->register_date;
                //$this->hospital_id = $user->hospital_id;
                $this->job_title = $user->job_title;

                $success = true;
                }
                }
                catch(ModelNotFoundException $e){
                    "There is some problem in connection: " . $e->getMessage();
                }
            }
        
        return $success;
    }

    public function LoginStaff($email, $password): bool
    {
        
        // Sanitize to avoid malicious script processing in the database.
        $email = $this->sanitizeString($email);

        // Use Eloquent model to retrieve the officer based on the email
        $user = StaffMember::where('email', $email)->first();

        if ($user !== null) {
            if ($user->status) {
                 // Attempt to authenticate using the 'staff' guard
                if (Auth::guard('staff')->attempt(['email' => $email, 'password' => $password])) {
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

    public function logoutStaff(): bool
{
    // Logout the user from the 'staff' guard
    if(Auth::guard('staff')->logout()){
        
        return true;
    }
    return false;
}

    // Business logic to register staff using Eloquent
    public function registerStaff($register, $name, $username, $email, $address, $phone, $job_title,$department, $hospital, $password, $confirmPassword, $gender): bool
    {

        if (isset($register)) {
            if ($password != $confirmPassword) {
                session()->flash('error', 'Passwords did not match');
                return false;
            } else {
                // Use Eloquent model to check if the email is already taken
                $existingUser = StaffMember::where('email', $email)->count();

                if ($existingUser > 0) {
                    session()->flash('error', 'Email already taken');
                    return false;
                } else {
                     // Check if the hospital exists
                $hospitalExists = Hospital::where('hospital_id', $hospital)->exists();

                if (!$hospitalExists) {
                    session()->flash('error', 'Hospital ID does not exist');
                    return false;
                }

                  // Check if the username is already taken
            $usernameExists = StaffMember::where('username', $username)->exists();

            if ($usernameExists) {
                session()->flash('error', 'Username already taken');
                return false;
            }
                    $now = now();
                    $code = 'active';

                    // Use Eloquent model to insert new staff member
                    $newStaffMember = new StaffMember();
                    $newStaffMember->setAttribute('email', $email);
                    $newStaffMember->setAttribute('password', Hash::make($password));
                    $newStaffMember->setAttribute('full_name',$name);
                    $newStaffMember->setAttribute('username',$username);
                    $newStaffMember->setAttribute('status',$code);
                    $newStaffMember->setAttribute('register_date',$now);
                    $newStaffMember->setAttribute('gender',$gender);
                    $newStaffMember->setAttribute('address',$address);
                    $newStaffMember->setAttribute('job_title',$job_title);
                    $newStaffMember->setAttribute('department',$department);
                    $newStaffMember->setAttribute('hospital_id',$hospital);
                    $newStaffMember->setAttribute('phone_number',$phone);

                    if ($newStaffMember->save()) {
                         // Log in the user after successful registration
                         Auth::guard('staff')->login($newStaffMember);
                        session([
                            'success' => 'Registered Successfully!',
                            'user' => $newStaffMember->staff_id,
                            'username' => $newStaffMember->username,
                            'userEmail' => $newStaffMember->email,
                        ]);
                        
                        return true;
                        
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


    public function viewDonors(): array
    {
        $resultArray = array();

        try {
            // Use Eloquent model to retrieve all donors
            $donors = BloodDonor::orderBy('full_name')->get();

            // Convert the Eloquent collection to an array
            $resultArray = $donors->toArray();
        } catch (ModelNotFoundException $e) {
            "There is some problem in connection: " . $e->getMessage();
        }

        return $resultArray;
    }

    public function viewFewDonors(): array
    {
        $resultArray = array();

        try {
            // Use Eloquent model to retrieve a limited number of donors
            $donors = BloodDonor::orderBy('full_name')->limit(10)->get();

            // Convert the Eloquent collection to an array
            $resultArray = $donors->toArray();
        } catch (ModelNotFoundException $e) {
            "There is some problem in connection: " . $e->getMessage();
        }

        return $resultArray;
    }

    public function createRequest($donorEmail): array
{

    $resultArray = array();
    
    // Retrieve donor details based on donor email
    $donorDetails = BloodDonor::where('email', $donorEmail)->first();

        // Add donor details to the result array
        $resultArray = $donorDetails->toArray();
   

    return $resultArray;
}

    public function submitRequest($requester_name,$requester_contact,$blood_type,$appointment_date,$staff_email,$donor_email): bool
    {
        $request_date = now();
        $request_status = "pending";
        $bloodRequest = new BloodRequest();
        $bloodRequest->setAttribute('requester_name',$requester_name);
        $bloodRequest->setAttribute('requester_contact',$requester_contact);
        $bloodRequest->setAttribute('blood_type',$blood_type);
        $bloodRequest->setAttribute('request_status',$request_status);
        $bloodRequest->setAttribute('request_date',$request_date);
        $bloodRequest->setAttribute('appointment_date',$appointment_date);
        $bloodRequest->setAttribute('staff_email',$staff_email);
        $bloodRequest->setAttribute('donor_email',$donor_email);

        $success = $bloodRequest->save();

        if($success){
            return true;
        }
        return false;
    }


}

