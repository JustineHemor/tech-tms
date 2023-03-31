<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks List') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
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
                              @hasanyrole('manage|creator')
                                <a href="{{ route('tasks.create') }}">
                                  <x-button class="mb-4">
                                    {{ __('Create Task') }}
                                  </x-button>
                                </a>
                              @endrole
                              <table class="w-full text-center text-sm font-light">
                                <thead
                                  class="border-b bg-neutral-50 font-medium dark:border-neutral-200 dark:text-neutral-800">
                                  <tr>
                                    <th scope="col" class=" px-6 py-4">ID</th>
                                    <th scope="col" class=" px-6 py-4">Title</th>
                                    <th scope="col" class=" px-6 py-4">Description</th>
                                    <th scope="col" class=" px-6 py-4">Status</th>
                                    <th scope="col" class=" px-6 py-4">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($tasks as $item)
                                  <tr class="border-b dark:border-neutral-200">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $item->id }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $item->title }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $item->description }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                      @if (empty($item->completed_at))
                                      <span class="bg-orange-500 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Ongoing</span>
                                      @else
                                        <span class="bg-green-500 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Completed</span>
                                      @endif
                                    </td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                      <a href="{{ route('tasks.show', $item->id) }}" class="text-cyan-700 pr-2">View</a>
                                      <a href="{{ route('tasks.edit', $item->id) }}" class="text-blue-500">Edit</a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
