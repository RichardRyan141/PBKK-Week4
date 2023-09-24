<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    private $formData = []; 

    public function showForm()
    {
        return view('form');
    }

    public function showResult()
    {
        $formData = session()->get('formData'); // Retrieve the form data from the session

        return view('result', ['formData' => $formData]);
    }

    
    public function submitForm(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email:rfc',
            'address' => 'required',
            'id_card_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'desired_hourly_wage' => 'required|numeric|between:2.50,99.99',
        ], [
            'full_name.required' => 'The Full Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'The Email must be a valid email address.',
            'address.required' => 'The Address field is required.',
            'id_card_photo.required' => 'The ID Card Photo field is required.',
            'id_card_photo.image' => 'The ID Card Photo must be an image.',
            'id_card_photo.mimes' => 'The ID Card Photo must be a valid image format (JPEG, PNG, JPG).',
            'id_card_photo.max' => 'The ID Card Photo must not exceed 2 MB.',
            'desired_hourly_wage.required' => 'The Desired Hourly Wage field is required.',
            'desired_hourly_wage.numeric' => 'The Desired Hourly Wage must be a number.',
            'desired_hourly_wage.between' => 'The Desired Hourly Wage must be between 2.50 and 99.99.',
        ]);
    
        $imagePath = $request->file('id_card_photo')->store('public/images');
        $filename = basename($imagePath);
    
        $this->formData['full_name'] = $request->input('full_name');
        $this->formData['email'] = $request->input('email');
        $this->formData['address'] = $request->input('address');
        $this->formData['desired_position'] = $request->input('desired_position');
        $this->formData['desired_hourly_wage'] = $request->input('desired_hourly_wage');
        $this->formData['id_card_photo'] = $filename;

        session()->flash('success', 'Form submitted successfully.');
        session()->put('formData', $this->formData);

        return redirect()->route('form.result')->with('success', 'Form submitted successfully');
    }
}
