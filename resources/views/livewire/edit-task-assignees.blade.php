<div class="col-span-6 sm:col-span-4 mt-4">
    <x-label for="assignee" class="mb-2" value="{{ __('Assign To') }}" />
    <div class="p-2 border rounded-b-lg grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 max-h-28 overflow-y-auto rounded-md shadow-sm border-gray-300">
      @foreach ( $users as $item )
        <label><input wire:model="assignees" wire:change="updateAssignees()" name="assignee[]" type="checkbox" class="border-gray-300 mr-1 rounded" class="ml-1" value="{{ $item->id }}" 
        />{{ $item->name }}</label>
      @endforeach
    </div>
    <x-input-error for="assignee" class="mt-2" />
  </div>