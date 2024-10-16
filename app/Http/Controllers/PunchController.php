<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Events\CardPunched;
use App\Models\Punch;
use App\Models\Student;
use App\Models\User;
use Error;
use Exception;
use Illuminate\Support\Facades\Log;

class PunchController extends Controller
{
    // Simulate punch card using Postman
    public function simulatePunch(Request $request)
    {
       
        // $request->validate([
        //     'guardian_id' => 'required|string',
        //     'punch_type' => 'required|in:in,out',
        // ]);
        // dd('test');
       
        // Simulating the guardian and student based on RFID card id
        $guardian = Guardian::where('guardian_id', $request->guardian_id)->first();


        if (!$guardian) {
            return response()->json(['error' => 'Guardian not found'], 404);
        }
        
      
        $student = Student::find($guardian->student_id);
       

        // Simulate punch log creation
        $punch = Punch::create([
            'guardian_id' => $guardian->guardian_id,
            'punch_type' => $request->punch_type,
            'punch_time' => now(),  // Adding current punch time
        ]);
        

        // Broadcasting the punch event to the monitor
        // broadcast(new CardPunched($guardian, $student, $punch));
        try {
            event(new CardPunched($guardian, $student, $punch));
        } catch (\Exception $exception) {
            Log::error('Broadcasting error: ' . $exception->getMessage());
            throw new Exception('Error occurred while broadcasting: ' . $exception->getMessage());
        } catch (\Error $error) {
            Log::error('Broadcasting error: ' . $error->getMessage());
            throw new Exception('Error occurred while broadcasting: ' . $error->getMessage());
        }

        return response()->json(['success' => 'Punch event broadcasted successfully', 'guardian' => $guardian->name, 'student' => $student->name]);
    }
}
