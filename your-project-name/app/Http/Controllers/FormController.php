<?php

namespace App\Http\Controllers;

use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function view(){
        return view('welcome');
    }
    public function submitForm(Request $request)
    {
        try {
            $validated_data = validator($request->all(), [

                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'placement' => 'required|string',
                'typename' => 'required|string',
                'details' => 'required|string',
                'image' => 'nullable|file|mimes:jpeg,jpg,png,gif,pdf,ai,eps,tiff|max:2000',
            ])->validate();



            $imagePath = null;
            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('uploads', 'public');
            }


            $submission = FormSubmission::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'placement' => $validatedData['placement'],
                'typename' => $validatedData['typename'],
                'details' => $validatedData['details'],
                'image_path' => $imagePath, // Store the image path
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Form submitted successfully!',
                'data' => $submission
            ]);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to save user details',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
