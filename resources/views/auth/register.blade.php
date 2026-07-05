<x-layout>
    <form action="/register" method="POST">
        @csrf
  <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
  <legend class="fieldset-legend">Register</legend>
  <label class="label">Name</label>
  <input type="name" name="name" class="input" placeholder="Name" />
  <x-form.error name="name" />

  <label class="label">Email</label>
  <input type="email" name="email" class="input" placeholder="Email" />
  <x-form.error name="email" />


  <label class="label">Password</label>
  <input type="password" name="password" class="input" placeholder="Password" />
  <x-form.error name="password" />

  <label class="label">Confirm Password</label>
  <input type="password" name="password_confirmation" class="input" placeholder="Confirm Password" />
  <x-form.error name="password" />


  <button class="btn btn-primary mt-4">Register</button>
</fieldset>
</form>
</x-layout>
