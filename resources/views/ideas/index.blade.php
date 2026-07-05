<x-layout title="Home">
    <div class="max-w-2xl mx-auto p-6">
        <form action="/ideas" method="POST" class="space-y-4">
            @csrf
            <fieldset class="fieldset">
                    <legend class="fieldset-legend text-lg font-semibold mb-2 ms-2">Your idea</legend>
                <textarea name="description" class="textarea textarea-accent w-full h-24" placeholder="What's on your mind?"></textarea>
            </fieldset>
            <x-Form.error class="btn btn-error" name="description" />
            <button type="submit" class="btn btn-success w-full">Save</button>
        </form>

        <h1 class="text-2xl font-bold text-center mt-12 mb-6">
             Your Ideas
        </h1>

        <div class="space-y-4">
            @forelse ($ideas as $idea)
                <div class="card bg-neutral text-neutral-content shadow-md">
                    <div class="card-body items-center text-center">
                        <a href="/ideas/{{ $idea->id }}" class="card-title hover:underline">
                            {{ $idea->description }}
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 mt-10">
                    <p class="text-lg"> No ideas yet.</p>
                    <p class="text-sm">Start by writing your first idea above!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
