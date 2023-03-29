<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
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
                              <table class="w-full text-center text-sm font-light">
                                <thead
                                  class="border-b bg-neutral-50 font-medium dark:border-neutral-200 dark:text-neutral-800">
                                  <tr>
                                    <th scope="col" class=" px-6 py-4">Employee Number</th>
                                    <th scope="col" class=" px-6 py-4">Name</th>
                                    <th scope="col" class=" px-6 py-4">Email</th>
                                    <th scope="col" class=" px-6 py-4">Role</th>
                                    <th scope="col" class=" px-6 py-4">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($users as $item)
                                  <tr class="border-b dark:border-neutral-200">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $item->employee_code }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $item->name }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $item->email }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $item->role }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                      <a href="{{ route('users.show', $item->id) }}" class="text-cyan-700 pr-2">View</a>
                                      <a href="{{ route('users.edit', $item->id) }}" class="text-blue-500">Edit</a>
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
