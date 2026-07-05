<x-layout>
    <form method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('PATCH')
        <fieldset class="fieldset my-4">
            <div class="card bg-neutral text-neutral-content shadow-md">
                                <div class="card-body items-center text-center">
                                    <legend class="card-title hover:underline"  name="description">{{ old('idea', $idea->description) }}</legend>
                                </div>
                            </div>
            <textarea name="description" class="textarea textarea-accent h-24 my-4" id="idea" placeholder="Update Your idea !"></textarea>
        </fieldset>
        <x-Form.error name="description" />
        <button class="btn btn-success" type="submit">Update</button>
    </form>
</x-layout>


