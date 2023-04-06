<div class="p-6 lg:p-8 flex flex-col space-y-5">
    {{-- {{ route('comment.store', $task) }} --}}
    <form wire:submit.prevent="addComment">
        <div class="mb-5">
            <label for="comment"> Add Comment</label>
            <textarea wire:model="comment" name="comment" id="comment" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
            @error('comment') <x-input-error for="comment" class="mt-2" /> @enderror
            <x-button class="mt-3">
                {{ __('Post Comment') }}
            </x-button>
        </div>
    </form>
    @foreach ($comments as $comment)
        <div class="my-5">
            <div class="flex space-x-1">
                <span class="text-black text-sm">{{ $comment->user->name }}</span>
                <span class="text-gray-500 text-xs font-mono p-0.5">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="my-1 text-gray-800 leading-relaxed text-sm">
                {{ $comment->body }}
            </p>
        </div>
    @endforeach
</div>
