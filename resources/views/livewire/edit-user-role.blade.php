<div class="col-span-6 sm:col-span-4 mt-4">
    <x-label for="role" class="mb-2" value="{{ __('Roles') }}" />
    <div class="p-2 border rounded-b-lg grid grid-cols-1 rounded-md shadow-sm border-gray-300">
      @foreach ( $roles as $item )
        <label><input wire:model="roles" wire:change="updateRoles()" name="role[]" type="checkbox" class="border-gray-300 mr-1 rounded" class="ml-1" value="{{ $item->id }}" 
        />{{ $item->name }}</label>
      @endforeach
    </div>
    <x-input-error for="role" class="mt-2" />
  </div>
