<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Credenciales</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;400&display=swap');

        .container{
            padding: 1rem;
        }
        .container .row{
            justify-content: center;
            text-align: center;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .container .row .card{
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .container .row .card .card-header{
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }
        .container .row .card .card-body{
            flex: 1 1 auto;
            padding: 1.25rem;
            box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-header">Recuperación de Contraseña</div>
                    <div class="card-body">
                        <h3>App Demo</h3>
                        <h5 class="card-title">Estimada/o Usuario, Para recuperar su contraseña favor ingresar en el enlace "Recuperar Contraseña".</h5>
                        <p class="card-text">Usuario: {{ $msg['usuario'] }} </p>
                        <a href="{{ asset('') }}newPassword/id/{{$msg['token']}}">Recuperar Contraseña</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>