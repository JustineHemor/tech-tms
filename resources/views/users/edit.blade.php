<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
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
                              <form action="{{ route('users.update', $user->id) }}" method="post">
                                {!! csrf_field() !!}
                                @method("PATCH")
                                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                <h1>Edit Roles of {{ $user->name }}.</h1>
                                <!-- Assignee -->
                                <livewire:edit-user-role :user="$user" :user_roles="$user->roles"/>
                                
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
