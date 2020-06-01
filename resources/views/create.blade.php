@extends('layout.main')

@section('content')

    <div class="container">

        @if($errors->any())

            @foreach($errors->all() as $error)

                <div class="alert alert-danger" role="alert">
                   {{ $error}}
                </div>
                
            @endforeach
            
        @endif

        <h1 class="text-center">Page de création </h1>

        <!-- Default form register -->
        <form class="text-center border border-light p-5" action="{{ route('store') }}" method="POST">

            {{ csrf_field() }}

            <p class="h4 mb-4">Ajouter des étudiants</p>

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="first_name">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="last_name">
                </div>
            </div>

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

            <!-- Phone number -->
            <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" name="phone">
        
            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Ajouter</button>

        </form>
   

</div>




@endsection