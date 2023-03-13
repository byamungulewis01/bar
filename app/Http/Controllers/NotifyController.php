<?php

namespace App\Http\Controllers;

use App\Mail\NewEmail;
use App\Mail\NewAccount;
use App\Mail\NotifyUser;
use App\Mail\ChangedEmail;
use App\Mail\MeetingNotify;
use App\Mail\ProboniNotify;
use App\Mail\Quicky_notify;
use App\Mail\resetPassword;
use App\Mail\TrainingNotify;
use Illuminate\Http\Request;
use App\Mail\NewOrganization;
use Illuminate\Support\Facades\Mail;

class NotifyController extends Controller
{
    public $message;
    public $phone;
    public $subject;
    public $user;
    public $key;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function newAccount($email,$password){
        Mail::to($email)->send(new NewAccount($email,$password,));
    }

    public function newOrganization($email,$password){
        Mail::to($email)->send(new NewOrganization($email,$password,));
    }

    // public function newEmail(){
    //     Mail::to($email)->send(new NewEmail($email));
    // }

    // public function changedEmail(){
    //     Mail::to($email)->send(new ChangedEmail());
    // }

    public function reset($key,$email){
        Mail::to($email)->send(new resetPassword($key,$email));
    }
    public function notify_meeting($email,$subject,$message,$attachments){
        Mail::to($email)->send(new MeetingNotify($email,$subject,$message,$attachments));
    }

    public function notify_training($email,$subject,$message){
        Mail::to($email)->send(new TrainingNotify($email,$subject,$message));
    }
    
    public function notify($email,$subject,$message){
        Mail::to($email)->send(new NotifyUser($email,$subject,$message));
    }
    public function quicky_notify($email,$name){
        Mail::to($email)->send(new Quicky_notify($email,$name));
    }
    public function notify_discipline($email,$message,$subject,$attachments){
        Mail::to($email)->send(new ProboniNotify($email,$message,$subject,$attachments));
    }
    public function notify_probono($email,$subject,$message,$attachments){
        Mail::to($email)->send(new ProboniNotify($email,$subject,$message,$attachments));
    }
    public function notify_sms($message,$phone){
 
    //    $curl = curl_init();

    //    curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://api.mista.io/sms',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'POST',
    //     CURLOPT_POSTFIELDS => array('to' => '25'.$phone[0]['phone'],'from' => 'RWANDA BAR','unicode' => '0','sms' => $message,'action' => 'send-sms'),
    //     CURLOPT_HTTPHEADER => array(
    //       'x-api-key: 65|yI4G8Qv23bpd3QRSou2tsr4PXVr4t4BvRYv7nryz'
    //     ),
    //    ));
       
    //    $response = curl_exec($curl);
    //    curl_close($curl);

    
// Set the request URL
$url = 'https://api.sms.rw/';

// Set the message data in JSON format
$message_data = array(
    'ohereza' => 'RWANDABAR',
    'ubutumwa' => $message,
    'msgid' => 'KA123455',
    'kuri' => '25'.$phone[0]['phone'],
    'client' => 'rbas',
    'password' => '6p2h9u9u8u2s',
    'receivedlr' => '1',
    'callurl' => 'https://api.sms.rw/',
    'messagetype' => 'flash',
    'retype' => 'xml'
);

// Convert the message data to JSON format
$json_data = json_encode($message_data);

// Set up the cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
));

// Send the request and get the response
$response = curl_exec($ch);

// Check for any errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Print the response
    echo $response;
}

// Close the cURL session
curl_close($ch);

    }
    public function sms($message,$phone){
 
    //    $curl = curl_init();

    //    curl_setopt_array($curl, array(
    //     CURLOPT_URL => 'https://api.mista.io/sms',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => '',
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => 'POST',
    //     CURLOPT_POSTFIELDS => array('to' => '25'.$phone,'from' => 'RWANDA BAR','unicode' => '0','sms' => $message,'action' => 'send-sms'),
    //     CURLOPT_HTTPHEADER => array(
    //       'x-api-key: 65|yI4G8Qv23bpd3QRSou2tsr4PXVr4t4BvRYv7nryz'
    //     ),
    //    ));
       
    //    $response = curl_exec($curl);
    //    curl_close($curl);

    // Set the request URL
$url = 'https://api.sms.rw/';

// Set the message data in JSON format
$message_data = array(
    'ohereza' => 'RWANDABAR',
    'ubutumwa' => $message,
    'msgid' => 'KA123455',
    'kuri' => '25'.$phone,
    'client' => 'rbas',
    'password' => '6p2h9u9u8u2s',
    'receivedlr' => '1',
    'callurl' => 'https://api.sms.rw/',
    'messagetype' => 'flash',
    'retype' => 'xml'
);

// Convert the message data to JSON format
$json_data = json_encode($message_data);

// Set up the cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
));

// Send the request and get the response
$response = curl_exec($ch);

// Check for any errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // Print the response
    echo $response;
}

// Close the cURL session
curl_close($ch);
    }


    
}
