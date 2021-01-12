<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dictonary</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        
        {{-- Scripts  --}}
        <script>
        
            (function () {
                window.Laravel = {
                    csrfToken: '{{csrf_token() }}'
                };
            })();
            
            
        </script>
        
    </head>
    <body>
        <div id="app">
        @if(Auth::check())
            @if(Auth::user()->role_id == 1)
                <mainapp :user="{{Auth::user()}}"></mainapp>
            @else

            @endif
        @else
                <login_register></login_register>    
        @endif
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        
    </body>
</html>
