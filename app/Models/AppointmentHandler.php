<?php
namespace App\Models;
class AppointmentHandler
{
    private $appointments = [];

    public function addAppointments($time, $location)
    {
        $appointments = [
            'time' => $time,
            'location' => $location,
        ];

        $this->appointments[] = $appointments;
    }

    public function getAppointments(){
        return $this->appointments;
    }

    public function showAppointments(){
            if(empty($this->appointments)){
                echo "No appointments scheduled";
            } else {
                echo "Upcoming Blood Donation Appointments:\n";
                foreach ($this->appointments as $appointments) {
                    echo "Time: {$appointments['time']}\nLocation: {$appointments['location']} \n\n";
                }
            }
            
    }

}





?>