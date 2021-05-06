@extends('incudes.master')

@section('sub-title','Edit Tags')
    
@section('content')
    

<div class="col-12 col-md-12 col-lg-12">

    <div class="card">
      <form action=" {{ route('tags.update', $tags->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
          <div class="form-group">

            <label>Tags</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $tags->name}}" required="">
              {{-- error validasi form  --}}
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection