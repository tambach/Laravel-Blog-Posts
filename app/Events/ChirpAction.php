<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChirpAction implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chirpId;
    public $action;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($chirpId, $action)
    {
        $this->chirpId = $chirpId;
        $this->action = $action;
    }


    public function actOnChirp(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Chirp::where('id', $id)->increment('likes_count');
                break;
            case 'Unlike':
                Chirp::where('id', $id)->decrement('likes_count');
                break;
        }
        event(new ChirpAction($id, $action)); // fire the event
        return '';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chirp-events');
    }
}
