<x-layout>
    <form action="/login" method="POST">
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Login</legend>

            <label class="label">Email</label>
            <input type="email" name="email" class="input" placeholder="Email" />
            <x-form.error name="email" />


            <label class="label">Password</label>
            <input type="password" name="password" class="input" placeholder="Password" />
            <x-form.error name="password" />


            <button class="btn btn-primary mt-4">Login</button>
        </fieldset>
    </form>
</x-layout>
