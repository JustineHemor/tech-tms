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
                                </div>
                                <div class="p-6 lg:p-8 flex flex-col space-y-5">
                                    <div class="my-5">
                                        <label for="body"> Add Comment</label>
                                        <textarea name="body" id="body" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                                        <x-button class="mt-3">
                                            {{ __('Post Comment') }}
                                        </x-button>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex space-x-1">
                                            <span class="text-black text-sm">John Doe</span>
                                            <span class="text-gray-500 text-xs font-mono p-0.5"> 3 minutes ago</span>
                                        </div>
                                        <p class="my-1 text-gray-800 leading-relaxed text-sm">
                                            Ipsum int rerum, fuga aliquam possimus hic sed omnis reiciendis quidem incidunt provident et?
                                        </p>
                                    </div>
                                    <div class="my-5">
                                        <div class="flex space-x-1">
                                            <span class="text-black text-sm">Juan Dela Cruz</span>
                                            <span class="text-gray-500 text-xs font-mono p-0.5"> 25 minutes ago</span>
                                        </div>
                                        <p class="my-1 text-gray-800 leading-relaxed text-sm">
                                            Lorem dolor sit amet consectetur adipisicing elit. Porro, dolor eos recusandae unde veritatis maxime.
                                        </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
