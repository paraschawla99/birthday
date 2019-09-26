<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Exception;
use Mail;
use DateTime;
use App\BirthdaysAndAnniversery;

class SmartDataController extends Controller
{

    /**
     *Function of add smartData employee details
     *@param Request $request
     *Written by Harish Rawat
    **/
    public function addEmployeeDetails(Request $request) {
		$tomorrow = new DateTime('tomorrow');
        $to = $tomorrow->format('Y-m-d');
    	$validation = Validator::make($request->all(), [
           	"fname" => "bail|required|alpha",
			"lname" => "bail|required|alpha",
			"phone" => "bail|required|unique:birthdays_and_anniverseries,phone|numeric|digits:10",
			"dob" => "bail|required|date|before:2011-01-01|after:1950-01-01",
			"doj" => "bail|required|date|before:$to|after:1996-01-01"
        ], [
            'fname.required' => "First name is required",
            'fname.alpha' => "First name can contains only alphabets",
            'lname.required' => "Last name is required",
            'lname.alpha' => "Last name can contains only alphabets",
            'phone.required' => "Phone number is required",
            'phone.unique' => "Phone number already exist",
            'phone.numeric' => "Phone number should be numeric",
            'phone.digits' => "Phone number length should be 10.",
            'dob.required' => "Date of birth is required",
            'dob.date' => "Invalid date of birth",
            'dob.before' => "Date of birth cannot be greater than 1st January 2011",
            'doj.required' => "Date of joining is required",
            'doj.date' => "Invalid date of joining",
            'doj.before' => "Date of joining cannot be greater than today's date"
        ]);
        if ($validation->fails())
        {
            throw new ValidationException($validation);
        }
        else {
        	$response = DB::table('birthdays_and_anniverseries')
        	->insert([
        			"fname" => $request->fname,
        			"lname" => $request->lname,
        			"phone" => $request->phone,
        			"dob" => $request->dob,
        			"doj" => $request->doj
        		]);
        	if ($response) {
        		return back()->with('success','Details saved successfully.');
        	} else {
        		return back()->with('error','Something went wrong, please try again.');
        	}
        }
    }


    /**
     *Function of send Birthday/Anniversery notification email via cron.
     *@param
     *Written by Harish Rawat
    **/
    public function sendNotification() {
        date_default_timezone_set("Asia/Kolkata");
        $tomorrow = new DateTime('tomorrow');
        $date = explode('-', $tomorrow->format('Y-m-d'));

        $birthdays = DB::table('birthdays_and_anniverseries')
                    ->whereMonth('dob', $date[1])
                    ->whereDay('dob', $date[2])
                    ->get();

        $anniverseries = DB::table('birthdays_and_anniverseries')
                    ->whereMonth('doj', $date[1])
                    ->whereDay('doj', $date[2])
                    ->get();

        if (count($birthdays) != 0 || count($anniverseries) != 0) {
            if(count($birthdays) == 0) $birthdays = "no_bday_data";
            if(count($anniverseries) == 0) $anniverseries = "no_anni_data";
            $data = array("birthdays" => $birthdays, "anniverseries" => $anniverseries);
            $check = Mail::send("mail", $data, function($message) {
                $message->to(['smartdata1@yopmail.com', 'smartdata2@yopmail.com'])
                ->subject('Birthday and Anniversary Notification');
                $message->from('abc1@example.com','SmartData Enterprises');
            });
        }       
    }

    /******/

    public function allEmployee()
     {
        $filterUser= BirthdaysAndAnniversery::whereMonth('dob','01')->get();


        $employees = BirthdaysAndAnniversery::all();
        return view('users',compact('employees','filterUser'));
        
    }
    

}
