<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('packages/bs/js/bootstrap.min.js') }}
{{ HTML::script('packages/bb/js/underscore-min.js') }}
{{ HTML::script('packages/bb/js/backbone-min.js') }}

{{ HTML::script('js//base/base.js') }}

@yield('scripts')