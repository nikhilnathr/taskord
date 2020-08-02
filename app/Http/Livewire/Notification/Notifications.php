<?php

namespace App\Http\Livewire\Notification;

use Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Livewire\Component;

class Notifications extends Component
{
    public $listeners = [
        'markAsRead' => 'render',
    ];
    
    public $page;
    public $perPage;

    public function mount($page, $perPage)
    {
        $this->page = $page ? $page : 1;
        $this->perPage = $perPage ? $perPage : 1;
    }

    public function paginate($items, $options = [])
    {
        $page = $this->page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $this->perPage), $items->count(), $this->perPage, $page, $options);
    }

    public function render()
    {
        return view('livewire.notification.notifications', [
            'notifications' => $this->paginate(Auth::user()->unreadNotifications),
        ]);
    }
}
