<?php

namespace App\Events;

use App\Models\Guardian;
use App\Models\Punch;
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
    public function __construct(Guardian $guardian, User $student, Punch $punch)
    {
        //  dd($punch);
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
        // dd('test ch');
        return new Channel('card-punches');
    }

    public function broadcastAs()
    {
        // dd('test as');
        return 'card.punched'; // This should match
    }
    
    /**
     * Optionally define the data to broadcast.
     */
    public function broadcastWith()
    {
        // dd('test with');
        // return [
        //     'guardian' => $this->guardian,
        //     'student' => $this->student,
        //     'punch' => $this->punch,
        // ];
        return [
            'guardian' => [
                'id' => $this->guardian->guardian_id,
                'name' => $this->guardian->name,
            ],
            'student' => [
                'id' => $this->student->id,
                'name' => $this->student->name,
            ],
            'punch' => [
                'id' => $this->punch->punch_id,
                'punch_time' => $this->punch->punch_time,
            ],
        ];

    }
}
