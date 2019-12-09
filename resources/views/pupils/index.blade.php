@extends('pupils.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pupil list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pupils.create') }}"> Add new pupil</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Kind Of Sport</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pupils as $pupil)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pupil->first_name }}</td>
            <td>{{ $pupil->last_name }}</td>
            <td>{{ $pupil->age }}</td>
            <td>{{ $pupil->kind }}</td>
            <td>
                <form action="{{ route('pupils.destroy',$pupil->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pupils.show',$pupil->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('pupils.edit',$pupil->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $pupils->links() !!}

    <div class="container">
<div class="pull-right">
            <a class="btn btn-primary" href="/"> Back</a>
</div>  
</div>

@endsection