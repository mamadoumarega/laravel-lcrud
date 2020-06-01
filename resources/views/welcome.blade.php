@extends('layout.main')

@section('content')
 
    <div class="container">
        <h1 class="text-center mb-3">Home Page</h1>

                
        @if(session('successMsg'))

            <div class="alert alert-success" role="alert">
                {{ session('successMsg') }}
            </div>
                
        @endif

        <table class="table table-striped">
            <thead class="black white-text">
              <tr>
                <th scope="col">id</th>
                <th scope="col">First_Name</th>
                <th scope="col">Last_Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
    
            <tbody>

                @foreach($students as $student)
                    
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a class="btn btn-raised btn-primary btn-sm" href="{{ route('edit', $student->id) }}"><i class="fas fa-edit"></i>
                            </a>
                            ||
                            <form  method="POST" id="delete-form-{{ $student->id }}" action="{{ route('delete', $student->id) }}"  
                                style="display: none;">

                                {{ csrf_field() }}
                                {{ method_field('delete') }}

                            </form>

                            <button onclick="if(confirm('êtes-vous sûr de vouloir supprimer?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $student->id }}').submit()
                            } else{
                                event.preventDefault();
                            }
                            
                            " class="btn btn-raised btn-danger btn-sm" href=""><i class="fas fa-trash"></i>

                            </button>

                        </td>
                    </tr>

                @endforeach
             
    
            </tbody>
        </table>

        {{ $students->links() }}

    </div>

@endsection