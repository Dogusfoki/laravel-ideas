<x-layout title="Idea Detail">
    <div class="card bg-neutral text-neutral-content w-96">
      <div class="card-body items-center text-center">
        <h2 class="card-title">{{ $idea->description }}</h2>
        <p class="py-5">Edit Your Idea</p>
        <div class="py-2 card-actions justify-end">
            <a class="btn btn-success" href="/ideas/{{ $idea->id }}/edit">Edit</a>
            <form action="/ideas/{{ $idea->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-error" type="submit">remove</button>
        </form>
            <a href="/" class="btn btn-ghost">Go Back</a>
        </div>
      </div>
    </div>
</x-layout>
