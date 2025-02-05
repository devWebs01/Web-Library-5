<div>
    <div class="row">
        <div class="col-12 mb-3">
            <select wire:model.live="selectedStatus" class="form-select form-select-sm" name="status_id" id="status_id" required>
                <option selected disabled>Pilih satu</option>
                @foreach ($statuses as $status)
                    @if (!isset($item) || is_null($item->status_id) ||
                        ($item->status_id == 1 && in_array($status->id, [2, 8])) ||
                        ($item->status_id == 2 && in_array($status->id, [3, 4, 5, 6])))
                        <option class="text-truncate" value="{{ $status->id }}">
                            {{ $status->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-12 mb-3">
            <input type="text" class="form-control form-control-sm" placeholder="Pilih Status" name="penalty"
                wire:model.live="amount" />
        </div>
    </div>
</div>
