@extends('incudes.master')

@section('sub-title','Tags')
    
@section('content')
    

<div class="col-12 col-md-12 col-lg-12">

    <div class="card">
      <form action=" {{ route('tags.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">

            <label>Tags</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="yusuf" required="">
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