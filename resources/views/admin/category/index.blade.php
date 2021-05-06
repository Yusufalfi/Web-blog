@extends('incudes.master')

@section('sub-title','Category')
    
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
        <a href=" {{route('category.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                    <td> {{ $category->id}}</td>
                    <td> {{$category->name}}</td>
                    <td> {{$category->slug}}</td>
                    <td> {{$category->created_at}}</td>
                    
                    <td><div class="badge badge-success">Active</div></td>
                    <td>
                     
                        <form action="{{ route('category.destroy', $category->id)}}" method="POST">
                          @csrf
                          @method('delete')
                          <a href="" class="btn btn-secondary  btn-sm">Detail</a>
                          <a href="{{ route('category.edit', $category->id)}}" class="btn btn-warning btn-sm">Edit</a>
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
            {{ $categories->links()}}
        </nav>
      </div>
    </div>
  </div>
@endsection