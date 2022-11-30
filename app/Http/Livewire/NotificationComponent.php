<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $notifications, $count;

    public function mount(){
        $this->notifications = auth()->user()->notifications->take(5);
        $this->count = auth()->user()->unreadNotifications->count();
    }

    public function resetNotificationCount(){
        auth()->user()->notification = 0;
        auth()->user()->save();
    }

    public function read($notification_id){
        
        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->markAsRead();
    }

    public function render()
    {
        return view('livewire.notification-component');
    }
}
