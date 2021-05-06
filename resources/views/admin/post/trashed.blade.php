@extends('incudes.master')

@section('sub-title','Posts Trashed')
    
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
     
      <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>ID</th>
                    <th>judul</th>
                    <th>kategory</th>
                    <th>tags</th>
                    <th>gambar</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
       
                    
               
                    
               
                @forelse ($posts as $post)
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
                      <img src="{{ asset($post->gambar) }}" style=" width: 50px" class="img-fluid">
                    </td>
                    <td> {{$post->created_at}}</td>
                 
                    <td>
                     
                        <form action=" {{ route('posts.delete-permanen', $post->id)}}" method="POST">
                          @csrf
                          @method('delete')
                            <a href="{{ route('posts.restore', $post->id)}}" class="btn btn-info btn-sm">Restore</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        </td>
                        
                    </tr>
                 @empty

                 <tr>
                    <td>
                        <div class="text-center red">
                            <h2>trash Kosong</h2>
                        </div>
                     </td>
                 
                 </tr>
                
                @endforelse
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