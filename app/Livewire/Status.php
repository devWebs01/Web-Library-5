<?php

namespace App\Livewire;

use App\Models\Status as ModelsStatus;
use Livewire\Component;

class Status extends Component
{
    public $statusId;

    public $status;

    public $selectedStatus;

    public $amount;

    public function mount($statusId = null)
    {
        $this->statusId = $statusId;
        $this->status = ModelsStatus::find($statusId);

        // Set other properties as needed
    }

    public function render()
    {
        $statuses = ModelsStatus::where('id', '!=', 1)->get();

        return view('livewire.status', compact('statuses'));
    }

    public function updatedSelectedStatus($id)
    {
        $status = ModelsStatus::find($id);

        if ($status) {
            $this->amount = $status->amount;
        } else {
            $this->amount = null;
        }
    }
}
