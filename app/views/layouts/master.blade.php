<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LBC - {{ $headerCaption }}</title>

    @include('layouts.styles') 
      
  </head>
  <body>
    <div class="container">

        <div class="row header">
            <h2><span class="glyphicon glyphicon-th"></span><!-- TITLE FROM SUB VIEW -->{{ $headerCaption }}</h2>
        </div>
        <div class="row content">
            <!-- CONTENTS FROM SUB VIEW --> 
            @yield('content')
        </div>
    </div>

    @include('layouts.scripts')   
  </body>
</html>
