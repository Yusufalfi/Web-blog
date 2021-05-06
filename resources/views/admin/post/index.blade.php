@extends('incudes.master')

@section('sub-title','Post')
    
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
        <a href=" {{route('posts.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>ID</th>
                    <th>judul</th>
                    <th>kategory</th>
                    <th>tags</th>
                    <th>creator</th>
                    <th>gambar</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                    <td> {{ $post->id}}</td>
                    <td> {{$post->judul}}</td>
                    <td> {{$post->category->name}}</td>
                    <td>
                      @foreach ($post->tags as $tag)
                        <span class="btn btn-primary btn-sm">{{ $tag->name}}</span>  
                      @endforeach
                    </td>
                    <td>
                       {{ $post->users->name}}
                    </td>
                    <td>
                      <img src="{{ asset($post->gambar) }}" style=" width: 50px" class="img-fluid">
                    </td>
                    <td> {{$post->created_at}}</td>
                    
                    
                    <td><div class="badge badge-success">Active</div></td>
                    <td>
                     
                        <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                          @csrf
                          @method('delete')
                          <a href="" class="btn btn-secondary  btn-sm">Detail</a>
                          <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-warning btn-sm">Edit</a>
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
            {{ $posts->links()}}
        </nav>
      </div>
    </div>
  </div>
@endsection