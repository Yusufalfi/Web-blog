@extends('incudes.master')

@section('sub-title','Post Edit')
    
@section('content')
    

<div class="col-12 col-md-12 col-lg-12">

    <div class="card">
      <form action=" {{ route('posts.update', $posts->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" required="" value="{{ $posts->judul}}">
              {{-- error validasi form  --}}
              @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
          <div class="form-group">
            <label>Pilih Category</label>
            <select class="form-control" name="category_id" required>
                <option value="" holder>Pilih Kategory</option>
              @foreach ($categories as $category)
              <option value=" {{ $category->id}}"
                    {{-- jika field category_id yang di field posts sama dengan" field category id maka selected --}}
                    @if ($posts->category_id == $category->id)
                        selected
                    @endif
                >{{$category->name }}</option>
              @endforeach
             
            </select>
            
          </div>

          <div class="form-group mt-2">
            <label>Content</label>
            <textarea class="form-control  @error('content') is-invalid @enderror" name="content"> {{ $posts->content}}</textarea>
              {{-- error validasi form  --}}
              @error('content')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label>Gambar</label>
            <input type="file" id="gambar" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
              {{-- error validasi form  --}}
              @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          
          <div class="form-group">
            <label>Pilih Tags</label>
            <select class="form-control select2"  multiple="" name="tags[]" required>
              @foreach ($tags as $tag)
               <option value="{{ $tag->id}}"
                        {{--lopping posts. PANGGIL RELASI TAG  --}}
                    @foreach ($posts->tags as $item)
                        {{-- JIKA TAG ID SAMA DENGAN" ITEM ID MAKA SELECTED lihat di field Post_tags--}}
                        @if ($tag->id == $item->id)
                            selected                            
                        @endif
                    @endforeach
                
                > {{ $tag->name}}</option>
              @endforeach
            </select>
          </div>

        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection