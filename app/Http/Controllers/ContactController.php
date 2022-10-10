<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $validator = Validator::make(
            $request -> all(),
            [
                'full_name' => 'required|min:5|max:255',
                'email' => 'required|email',
                'message' => 'required|min:5|max:255'
            ],
            [
                'full_name.required' => 'Le champ nom complète est obligatoire.',
                'full_name.min' => 'Le champ nom complète doit etre contien au moins 5 caractères.',
                'full_name.max' => 'Le champ nom complète ne doit pas contien plus de 255 caractères.',
                'message.required' => 'Le champ message est obligatoire.',
                'message.min' => 'Le champ message doit etre contien au moins 5 caractères.',
                'message.max' => 'Le champ message ne doit pas contien plus de 255 caractères.',
                'email.required' => 'Le champ email est obligatoire.',
                'email.email' => 'Il faut entrer un email valide.'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ], 400);
        }
        try {
            $contact = Contact::create([
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'message' => $request->input('message'),
            ]);
            return response()->json(["success" => true]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
            ], 500);
        }
    }
}
