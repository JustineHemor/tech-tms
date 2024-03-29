<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-ui.alerts />
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <div class="p-6 lg:p-8 border-b border-gray-200">
                                    <div class="flex">
                                        @if (empty($task->completed_at))
                                            <div class="h-2 w-2 rounded-full mt-3 mr-1 bg-orange-500"></div>
                                        @else
                                            <div class="h-2 w-2 rounded-full mt-3 mr-1 bg-green-500"></div>
                                        @endif
                                        <h1 class="text-2xl font-medium text-gray-900">
                                        {{$task->title}}
                                        </h1>
                                    </div>
                                    <div class="flex space-x-1">
                                        <span class="text-gray-400 text-xs">Created by: {{$task->createdBy->name}}</span>
                                        <span class="text-gray-400 text-xs"> at: {{$date}}</span>
                                    </div>
                                
                                    <p class="my-6 text-gray-700 leading-relaxed">
                                        {{$task->description}}
                                    </p>

                                    <div class="flex flex-col">
                                        <span class="text-gray-900 text-xs font-bold">Assigned To:</span>
                                        @foreach ( $users as $item )
                                            @if (in_array($item->id, $assignees))
                                                <span class="text-gray-900 text-xs">{{ $item->name }}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                    @if (empty($task->completed_at))
                                        <div class="flex mt-4">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="post">
                                                {!! csrf_field() !!}
                                                <x-button class="bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900">
                                                    {{ __('Mark as done') }}
                                                </x-button>
                                            </form>
                                        </div>
                                    @else
                                    <div class="flex mt-4">
                                        <form action="{{ route('tasks.reopen', $task->id) }}" method="post">
                                            {!! csrf_field() !!}
                                            <x-button class="bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900">
                                                {{ __('Reopen Task') }}
                                            </x-button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                                <livewire:task-comment-section :task_id="$task->id"/>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
