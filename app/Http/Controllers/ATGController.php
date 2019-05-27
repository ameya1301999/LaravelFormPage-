<?php

namespace App\Http\Controllers;

use App\FormData;
use App\Rules\EmailValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ATGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view form.blade.php
     */
    public function index()
    {
        //To load the form UI
        return view('form');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view form.blade.php with validated data with either success or error message
     */
    public function store(Request $request)
    {
        //Below is the validation
        $validatorData = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:form_data',new EmailValidation()],
            'pincode' => ['required', 'integer', 'digits:6'],
        ]);
        //If error in data is found user is redirected to the form page with error message
        if ($validatorData->fails()) {
            return redirect('/form')
                ->withErrors($validatorData)
                ->withInput();
        } else {
            //No errors in validation saving data in database
            $formData = new FormData();
            $formData->name = $request->input('name');
            $formData->email = $request->input('email');
            $formData->pincode = $request->input('pincode');
            $formData->save();
            //Once save is done redirecting to form page with success message
            return redirect()->route('form')->withSuccess(['Form submitted successfully!']);
        }
    }
}
