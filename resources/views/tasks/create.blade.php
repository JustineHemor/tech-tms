<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                              <form action="{{ route('tasks.store') }}" method="POST">
                                {!! csrf_field() !!}
                                <!-- Title -->
                                <div class="col-span-6 sm:col-span-4">
                                  <x-label for="title" value="{{ __('Title') }}" />
                                  <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" autocomplete="title" />
                                  <x-input-error for="title" class="mt-2" />
                                </div>

                                <!-- Description -->
                                <div class="col-span-6 sm:col-span-4 mt-4">
                                  <x-label for="description" value="{{ __('Description') }}" />
                                  <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" wire:model.defer="state.description"></textarea>
                                  <x-input-error for="description" class="mt-2" />
                                </div>

                                <!-- Due Date -->
                                <div class="col-span-6 sm:col-span-4 mt-4">
                                  <x-label for="due_date" value="{{ __('Due Date') }}" />
                                  <x-input id="due_date" name="due_date" type="date" class="mt-1 block w-full" wire:model.defer="state.due_date" autocomplete="due_date" />
                                  <x-input-error for="due_date" class="mt-2" />
                                </div>

                                <!-- Assignee -->
                                <div class="col-span-6 sm:col-span-4 mt-4">
                                  <x-label for="assignee" class="mb-2" value="{{ __('Assign To') }}" />
                                  <div class="p-2 border rounded-b-lg grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-4 max-h-28 overflow-y-auto rounded-md shadow-sm border-gray-300">
                                    @foreach ( $users as $item )
                                      <label><input name="assignee[]" type="checkbox" class="border-gray-300 mr-1 rounded" class="ml-1" wire:model.defer="state.assignee" value="{{ $item->id }}" />{{ $item->name }}</label>
                                    @endforeach
                                  </div>
                                  <x-input-error for="assignee" class="mt-2" />
                                </div>

                                {{-- <!-- Assignee -->
                                <div class="col-span-6 sm:col-span-4 mt-4">
                                  <x-label for="assignee" value="{{ __('Assignees') }}" />
                                    <select name="assignees[]" id="" multiple x-data="{}" x-init="function () { choices($el) }">
                                      @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                  </select>
                                  <x-input-error for="assignee" class="mt-2" />
                                </div> --}}

                                <x-button class="mt-4">
                                  {{ __('Submit') }}
                                </x-button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
