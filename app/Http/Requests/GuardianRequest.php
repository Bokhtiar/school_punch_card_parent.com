<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    // In your GuardianRequest.php

    public function rules()
    {
        $guardianId = $this->route('guardian'); // Assuming your route has a parameter named 'guardian'

        return [
            'student_id' => 'required|exists:students,student_id',
            'name' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'unique:guardians,phone,' . ($guardianId ? $guardianId->guardian_id : 'NULL'), // Change this line
            ],
            'email' => [
                'required',
                'email',
                'unique:guardians,email,' . ($guardianId ? $guardianId->guardian_id : 'NULL'), // Change this line
            ],
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

}
