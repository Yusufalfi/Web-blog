@extends('incudes.master')

@section('sub-title','Post Create')
    
@section('content')
    

<div class="col-12 col-md-12 col-lg-12">

    <div class="card">
      <form action=" {{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="judul" required="">
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
              <option value=" {{ $category->id}}">{{$category->name }}</option>
              @endforeach
             
            </select>
          </div>

          <div class="form-group mt-2">
            <label>Content</label>
            <textarea class="form-control  @error('content') is-invalid @enderror" name="content"></textarea>
              {{-- error validasi form  --}}
              @error('content')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label>Gambar</label>
            <input type="file" id="gambar" class="form-control @error('gambar') is-invalid @enderror" name="gambar" required="">
              {{-- error validasi form  --}}
              @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          
          <div class="form-group">
            <label>Pilih Tags</label>
            <select class="form-control select2"  multiple="" name="tags[]" required>
              @foreach ($tags as $tag)
               <option value="{{ $tag->id}}"> {{ $tag->name}}</option>
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