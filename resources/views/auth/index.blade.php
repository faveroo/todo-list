<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas - Login/Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
               aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
               aria-controls="pills-register" aria-selected="false">Register</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <!-- LOGIN -->
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="loginEmail" name="email" class="form-control" value="{{ old('email') }}" required/>
                    <label class="form-label" for="loginEmail">Email</label>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="loginPassword" name="password" class="form-control" required/>
                    <label class="form-label" for="loginPassword">Password</label>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-start">
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" name="remember" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck"> Remember me </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
            </form>
        </div>

        <!-- REGISTER -->
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerName" name="name" class="form-control" value="{{ old('name') }}" required/>
                    <label class="form-label" for="registerName">Name</label>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" name="email" class="form-control" value="{{ old('email') }}" required/>
                    <label class="form-label" for="registerEmail">Email</label>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerPassword" name="password" class="form-control" required/>
                    <label class="form-label" for="registerPassword">Password</label>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-outline mb-4">
                    <input type="password" id="registerPasswordConfirmation" name="password_confirmation" class="form-control" required/>
                    <label class="form-label" for="registerPasswordConfirmation">Confirm Password</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" id="registerCheck" required/>
                    <label class="form-check-label" for="registerCheck">
                        I have read and agree to the terms
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
            </form>
        </div>
    </div>
    <!-- Pills content -->

</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
</body>
</html>
