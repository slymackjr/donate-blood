<?php 
namespace App\Models;
use App\Models\BloodRequest;
class donationRequestHandler
{
    protected $requestID;
    protected $donor;
    protected $time;
    protected $location;
    protected $status;


    public function __construct(){
        
    }

    public function getRequestID()
    {
        return $this->requestID;
    }

    public function getDonor()
    {
        return $this->donor;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function updateStatus($newStatus)
    {
        $this->status = $newStatus;

        // Assuming $this->requestID is the primary key of your model
        $bloodRequest = BloodRequest::find($this->requestID);
        
        if ($bloodRequest) {
            $bloodRequest->request_status = $newStatus;
            $bloodRequest->save();
        }
    }

    public function saveToDatabase()
    {
        // Assuming you have a BloodRequest instance (replace it with the correct logic)
        $bloodRequest = new BloodRequest();

        $bloodRequest->request_id = $this->requestID;
        $bloodRequest->donor_id = $this->donor->getDonorID();
        $bloodRequest->time = $this->time;
        $bloodRequest->location = $this->location;
        $bloodRequest->status = $this->status;

        $bloodRequest->save();
    }

    }



?>