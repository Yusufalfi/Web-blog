@extends('incudes.master')

@section('sub-title','List users')
    
@section('content')
    
<div class="col-12 col-md-12 col-lg-12">

  {{-- flash data --}}
    @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
    @endif
  {{--  --}}

    <div class="card">
      <div class="card-header">
        <a href=" {{route('users.create')}}" class="btn btn-primary btn-sm">Tambah users</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>created_at</th>
                    <th>status</th>
                    
                    <th>Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                    <td> {{$user->id}}</td>
                    <td> {{$user->name}}</td>
                    <td> {{$user->email}}</td>
                    <td> 
                        {{-- jika user fiel tipenya 1 maka dia admin jika 0 maka dia users --}}
                        @if ($user->type === 1)
                        <div class="badge badge-success">Administator</div> 

                         @else
                            
                         <div class="badge badge-warning">Author</div> 
                       
                        @endif
                    </td>
                    <td> {{$user->created_at}}</td>
                    
                    <td><div class="badge badge-success">Active</div></td>
                    <td>
                     
                        <form action="{{ route('users.destroy', $user->id)}}" method="POST">
                          @csrf
                          @method('delete')
                          <a href="" class="btn btn-secondary  btn-sm">Detail</a>
                          <a href="{{ route('users.edit', $user->id)}}" class="btn btn-warning btn-sm">Edit</a>
                          <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        </td>
                    </tr>
                
                @endforeach
            </table>
        </div>
      </div>
      <div class="card-footer text-right">
        <nav class="d-inline-block">
            {{ $users->links()}}
        </nav>
      </div>
    </div>
  </div>
@endsection