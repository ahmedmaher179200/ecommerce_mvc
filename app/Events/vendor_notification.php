<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class vendor_notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $vendor_id;
    public $count;
    public $notification_html;

    public function __construct($data)
    {
        $this->vendor_id            = $data['vendor_id'];
        $this->count                = $data['count'];
        $this->notification_html    = $data['notification_html'];
    }

    public function broadcastOn()
    {
        return ['preder-notification-' . $this->vendor_id];
    }

    public function broadcastAs()
    {
        return 'preder-notification';
    }
}
