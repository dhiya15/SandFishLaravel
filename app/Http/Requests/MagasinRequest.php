<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MagasinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => 'nullable|image',
            'name' => 'nullable',
            'title' => 'nullable',
            'description' => 'nullable',
            'footer_short_des' => 'nullable',
            'address' => 'nullable',
            'phone' => 'nullable',
            'fax' => 'nullable',
            'email' => 'nullable|email',
            'country' => 'nullable',
            'post_code' => 'nullable',
            'website' => 'nullable',
            'twitter' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'google_plus' => 'nullable',
            'working_days' => 'nullable',
            'working_hours' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'website_under_maintenance' => 'boolean',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
