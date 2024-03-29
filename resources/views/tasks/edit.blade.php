<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
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
                              <form action="{{ route('tasks.update', $task->id) }}" method="post">
                                {!! csrf_field() !!}
                                @method("PATCH")
                                <input type="hidden" name="id" id="id" value="{{$task->id}}">
                                <!-- Title -->
                                <div class="col-span-6 sm:col-span-4">
                                  <x-label for="title" value="{{ __('Title') }}" />
                                  <x-input id="title" name="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" autocomplete="title" value="{{$task->title}}"/>
                                  <x-input-error for="title" class="mt-2" />
                                </div>

                                <!-- Description -->
                                <div class="col-span-6 sm:col-span-4 mt-4">
                                  <x-label for="description" value="{{ __('Description') }}" />
                                  <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" wire:model.defer="state.description">{{$task->description}}</textarea>
                                  <x-input-error for="description" class="mt-2" />
                                </div>

                                <!-- Due Date -->
                                <div class="col-span-6 sm:col-span-4 mt-4">
                                  <x-label for="due_date" value="{{ __('Due Date') }}" />
                                  <x-input id="due_date" name="due_date" type="date" class="mt-1 block w-full" wire:model.defer="state.due_date" autocomplete="due_date" value="{{$task->due_date}}"/>
                                  <x-input-error for="due_date" class="mt-2" />
                                </div>

                                <!-- Assignee -->
                                <livewire:edit-task-assignees :task="$task" :task_id="$task->id"/>
                                {{-- @livewire('edit-task-assignees') --}}
                                
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
