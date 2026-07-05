<x-layout title="Yeni Fikir">
    <form method="POST" action="/ideas">
        @csrf
        <textarea name="idea"></textarea>
        <button type="submit">Kaydet</button>
    </form>
</x-layout>
