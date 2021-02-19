<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAW2  Register</title>
    <link rel="stylesheet" href="{{ asset('styles\bootstrap-4.0.0\css\bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top:45px">
            <div class="col-md-4 col-md-offset-4">
                <h4>Registrarse</h4>
                <hr>
                <form action="{{ route('auth.create') }}">
                @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" placeholder="Nombre completo" value="{{ old('name') }}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="mail">Correo electrónico</label>
                        <input type="text" class="form-control" name="mail" placeholder="ejemplo@mail.com" value="{{ old('mail') }}">
                        <span class="text-danger">
                            @error('mail')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="password" value="{{ old('password') }}">>
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Register</button>
                    </div>
                    <br>
                    <p>Ya tengo una cuenta: <a href="login">login</a></p>
                </form>
            </div>
        </div>
    </div>