<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GuardianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $guardianId = $this->route('guardian'); // Ensure this retrieves the correct guardian ID for update
        return [
            'student_id' => 'required|exists:students,student_id',
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'max:255',
                'regex:/^01[3-9]\d{8}$/', // Use regex for Bangladeshi phone validation
                Rule::unique('guardians', 'phone')->ignore($guardianId), // Ignore current guardian's phone when updating
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('guardians', 'email')->ignore($guardianId), // Ignore current guardian's email when updating
            ],
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
