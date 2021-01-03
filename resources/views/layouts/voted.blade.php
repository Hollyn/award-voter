<html>
    <head>
        <link rel="stylesheet" href="{{asset('assets/css/Features-Clean.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        @stack('style')
    </head>
    <body >
        <div class="bg" style="background: url(&quot;{{asset('assets/images/bg-image.jpeg')}}&quot;) center / contain no-repeat;"></div>
        <div class="coverBackground" style="width: 100%;height: 100%;"></div>
        <div class="">
            @yield('content')
        </div>
    </body>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    @stack('script')
</html>