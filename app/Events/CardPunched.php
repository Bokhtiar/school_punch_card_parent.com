<?php

namespace App\Events;

use App\Models\Guardian;
use App\Models\Punch;
use App\Models\Student;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CardPunched implements ShouldBroadcast
{
    
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $guardian;
    public $student;
    public $punch;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Guardian $guardian, Student $student, Punch $punch)
    {
        $this->guardian = $guardian;
        $this->student = $student;
        $this->punch = $punch;
    }

    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\PrivateChannel
     */
    public function broadcastOn()
    {
        return new Channel('card-punches');
    }

    public function broadcastAs()
    {
        return 'card.punched'; // This should match
    }
    
    /**
     * Optionally define the data to broadcast.
     */
    public function broadcastWith()
    {
        return [
            'guardian' => [
                'id' => $this->guardian->guardian_id,
                'name' => $this->guardian->name,
                'email' => $this->guardian->email,
                'phone' => $this->guardian->phone,
                'profile_pic' => $this->guardian->profile_pic,
            ],
            'student' => [
                'id' => $this->student->id,
                'name' => $this->student->first_name,
                'profile_pic' => $this->student->profile_pic,
                'class' => $this->student->class,
                'roll_no' => $this->student->roll_no,
            ],
            'punch' => [
                'id' => $this->punch->punch_id,
                'punch_time' => $this->punch->punch_time,
                'punch_type' => $this->punch->punch_type,
            ],
        ];

    }
}
