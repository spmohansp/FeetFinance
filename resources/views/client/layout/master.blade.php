@include('master.header')
@yield('style')
<div class="o-page">
    @include('client.layout.navigation')
    <main class="o-page__content">
        @include('client.layout.header')
        <div class="container">

           @include('master.errors')

            @yield('content')


        </div>
    </main>
</div>
@include('master.footer')