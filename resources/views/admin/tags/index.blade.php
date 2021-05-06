@extends('incudes.master')

@section('sub-title','tags')
    
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
        <a href=" {{route('tags.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>ID</th>
                    <th>Name Tag</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($tags as $tag)
                    <tr>
                    <td> {{ $tag->id}}</td>
                    <td> {{$tag->name}}</td>
                    <td> {{$tag->slug}}</td>
                    <td> {{$tag->created_at}}</td>
                    <td>
                      <div class="badge badge-success">Active</div>
                    </td>
                    <td>
                     
                        <form action="{{ route('tags.destroy', $tag->id)}}" method="POST">
                          @csrf
                          @method('delete')
                          <a href="" class="btn btn-secondary  btn-sm">Detail</a>
                          <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-warning btn-sm">Edit</a>
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
            {{ $tags->links()}}
        </nav>
      </div>
    </div>
  </div>
@endsection