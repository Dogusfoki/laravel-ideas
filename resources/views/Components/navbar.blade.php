<div class="navbar bg-base-100 shadow-sm">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
      </div>
      <ul
        tabindex="-1"
        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
        <li>
          <a>Directions</a>
          <ul class="p-2">
            <li><a href="/contact">Contact Us</a></li>
            <li><a href="/about">About Us</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <a href="/" class="btn btn-ghost text-xl">Idea</a>
  </div>

  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="/">Home</a></li>
      <li><a href="/about">About Us</a></li>
      <li><a href="/contact">Contact</a></li>
    </ul>
  </div>

  <div class="navbar-end gap-2">
    @auth
      <span>hello {{ auth()->user()->name }}</span>
      <form method="POST" action="/logout">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-ghost">Logout</button>
      </form>
    @else
      <a href="/login" class="btn btn-primary">Login</a>
      <a href="/register" class="btn btn-outline btn-primary">Register</a>
    @endauth
  </div>
</div>
