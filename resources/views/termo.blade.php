<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Termo de Consentimento</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="d-flex h-100 p-2 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Dental Life App</h3>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">TERMO DE CONSENTIMENTO.</h1>
        <p class="lead">{{$termo_patient->patients->name}}, Após ler o pdf com os termos do procedimento em questão, Aceite o Termo no fim da pagina</p>

        <!-- {{$termo_patient->termos->pdfpath}} -->
        <!-- <iframe height="600" width="850" id="iframepdf" src="http://ea69619de38e.ngrok.io/uploads/termos/tratamento%20ortod%C3%B4ntico.pdf"></iframe> -->
        <iframe height="300" width="300" id="iframepdf" src="http://dentallifeapp.com/uploads/{{$termo_patient->termos->pdfpath}}"></iframe>
       	<!-- <p class="lead">{{$termo_patient->patients->name}}</p> -->
        <p class="lead">
          <!-- <a href="#" class="btn btn-lg btn-secondary">Aceitar Termo</a> -->
          @if($termo_patient->aceito == 1)
				    <a href="#" class="btn btn-lg btn-success">Termo Aceito</a>
          @elseif ($termo_patient->recusado == 1)
            <a href="#" class="btn btn-lg btn-danger">Termo Recusado</a>
				  @else
					 <button class="btn btn-lg btn-success" onclick="enviar()" id="enviar">Aceitar Termo</button> 

           <button class="btn btn-lg btn-danger" onclick="recusar()" id="recusar">Recusar Termo</button> 
				  @endif
          
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
       
        </div>
      </footer>
    </div>

    <script type="text/javascript">
    	function enviar(){
    	    let numeroTermo = {{$termo_patient->id}};
    	    
    	    var query = "{{url("/")}}/validatermo/"+numeroTermo;

    	    console.log(query);
	     	$.ajax({
	     	    url: query,
	     	    success: function(data){
	     	       $('#enviar').hide();
	     	       location.reload();
	     	    }
	     	})
    	}

      function recusar(){
          let numeroTermo = {{$termo_patient->id}};
          
          var query = "{{url("/")}}/recusatermo/"+numeroTermo;

          console.log(query);
        $.ajax({
            url: query,
            success: function(data){
               $('#recusar').hide();
               location.reload();
            }
        })
      }

    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    
    
  </body>
</html>



<!-- 
	{{$termo_patient->id}}
	{{$termo_patient->patients_id}}
	{{$termo_patient->termos_id}}
	{{$termo_patient->aceito}}
 -->