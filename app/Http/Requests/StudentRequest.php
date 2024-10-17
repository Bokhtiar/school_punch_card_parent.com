<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
        $studentId = $this->route('student');
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'class'      => 'required|string|max:255',
            'section'    => 'nullable|string|max:255',
            'roll_no'    => 'required|string|max:255',
            'phone'      => 'nullable|string|max:15',
            'address'    => 'required|string',
            'dob'        => 'required|date',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'email'       => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($studentId), // Ignore current student's email when updating
            ],
        ];
    }
}
