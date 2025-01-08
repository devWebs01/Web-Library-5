<div>
    <div class="col">
        <select wire:model.live="selectedStatus" class="form-select form-select-sm" name="status_id" id="status_id" required>
            <option selected disabled>Select one</option>
            @foreach ($statuses as $status)
                <option class="text-truncate" value="{{ $status->id }}">
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <input type="text" class="form-control form-control-sm" placeholder="Pilih Status" name="penalty"
            wire:model.live="amount" />
    </div>
</div>
