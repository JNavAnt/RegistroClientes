<!DOCTYPE html>
<html>
<head>
    <title>AUTOCOMPLETE SEARCH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js">
  </script>
</head>


<body>
   
<div class="container">
    <h1>AUTOCOMPLETE SEARCH</h1> 
    <form action="get">
    <input type="hidden" name="_token" value="{{ Session::token() }}">  
    <input class="typeahead form-control" type="text" id="autocomplete">
    </form>
</div>
   
<script type="text/javascript">
    
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
    
</script>

<!--<script>
  $( function() {
     
    $( "#autocomplete" ).autocomplete({
      source: function( request, response ) {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax( {
          url: "{{route('autocomplete')}}",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      }
      
    } );
  } );
</script>-->
</body>
</html>