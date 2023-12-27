<?php

namespace App\Models;
use App\Models\BloodDonor;
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
    public function __construct()
    {
       
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

    public function verifyDonor($email, $password): bool
    {
        $success = false;

        // Sanitize to avoid malicious script processing in the database.
        $email = $this->sanitizeString($email);

        if ($email != null) {
            try {
                // Use Eloquent model to retrieve the donor based on the email
                $user = BloodDonor::where('email', $email)->first();

                if ($user != null) {
                    if ($user->status) {
                        // Verify the password using password_verify
                        if (password_verify($password, $user->password)) {
                            $_SESSION['user'] = $user->donor_id;
                            $_SESSION['username'] = $user->username;
                            $_SESSION['userEmail'] = $user->email;
                            $_SESSION['log'] = $user->email;
                            $success = true;
                        } else {
                            $_SESSION['error'] = 'Incorrect Password';
                        }
                    } else {
                        $_SESSION['error'] = 'Account not active.';
                    }
                } else {
                    $_SESSION['error'] = 'Email not found';
                }
            } catch (ModelNotFoundException $e) {
                "There is some problem in connection: " . $e->getMessage();
            }
        } else {
            $_SESSION['error'] = 'Input login credentials first';
        }

        return $success;
    }

    public function registerDonor($register, $name, $username,$gender, $email, $password, $confirmPassword, $address, $blood_type, $birthdate, $phone_number): bool
    {
        $message = false;

        if (isset($register)) {
            if ($password != $confirmPassword) {
                $_SESSION['error'] = 'Passwords did not match';
                header('location: ../register.php');
            } else {
                // Use Eloquent model to check if the email already exists
                $existingUser = BloodDonor::where('email', $email)->first();

                if ($existingUser) {
                    $_SESSION['error'] = 'Email already taken';
                    header('location: ../register.php');
                } else {
                    $now = date('Y-m-d');
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $code = 'active';

                    // Use Eloquent model to insert the new donor
                    $newDonor = new BloodDonor();
                    $newDonor->email = $email;
                    $newDonor->password = $password;
                    $newDonor->full_name = $name;
                    $newDonor->username = $username;
                    $newDonor->status = $code;
                    $newDonor->register_date = $now;
                    $newDonor->birthdate = $birthdate;
                    $newDonor->phone_number = $phone_number;
                    $newDonor->address = $address;
                    $newDonor->blood_type = $blood_type;
                    $newDonor->gender = $gender; // Make sure to define $gender variable

                    if ($newDonor->save()) {
                        $message = true;
                        $_SESSION['error'] = 'Registered Successfully!';
                        header('location: ../register.php');
                    } else {
                        $_SESSION['error'] = 'Failed to Register! Please try again.';
                        header('location: ../register.php');
                    }
                }
            }
        } else {
            $_SESSION['error'] = 'Fill up signup form first';
            header('location: ../register.php');
        }

        return $message;
    }

}