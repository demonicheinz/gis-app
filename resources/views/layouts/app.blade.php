<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        @include("partials.head")
        @yield("head")
    </head>

    <body>
        <script src="{{ asset("js/initTheme.js") }}"></script>
        <div id="app">
            @include("partials.sidebar")

            <div id="main" class="layout-navbar navbar-fixed">
                @include("partials.navbar")

                @yield("content")

                @include("partials.footer")
            </div>
        </div>

        @include("partials.javascript")
        @yield("javascript")

        {{-- Flash Message --}}
        @if (session("error"))
            <div class="alert alert-danger">
                {{ session("error") }}
            </div>
        @endif
    </body>
</html>
