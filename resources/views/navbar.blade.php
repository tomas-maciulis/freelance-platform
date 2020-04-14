<div class="m-0 w-full shadow-md h-12 flex">
    @auth
        @include('asset.button.important', ['link' => route('ad.create'), 'title' => 'Create an ad'])
    @endauth
    @include('asset.button.regular', ['link' => route('home'), 'title' => 'Home'])
    @auth
        @include('asset.button.regular', ['link' => route('profile.index'), 'title' => 'Profile'])
        <form method="post" action="{{ route('logout') }}">
            @csrf
            @include('asset.form.button.regular', ['type' => 'submit', 'title' => 'Logout', 'parameters' => 'absolute right-0'])
        </form>
    @else
        <div class="absolute right-0 mt-3">
            @include('asset.button.regular', ['link' => route('register'), 'title' => 'Register'])
            @include('asset.button.important', ['link' => route('login'), 'title' => 'Login'])
        </div>
    @endauth
</div>
