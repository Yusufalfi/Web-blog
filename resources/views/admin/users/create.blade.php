@extends('incudes.master')

@section('sub-title','Tambah User ')
    
@section('content')
    

<div class="col-12 col-md-12 col-lg-12">

    <div class="card">
      <form action=" {{ route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

          <div class="form-group">
            <label>Nama User</label>
            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required="">
              {{-- error validasi form  --}}
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="yusuf@gmail.com" required>
              {{-- error validasi form  --}}
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
            <label>Type User</label>
            <select name="type" id="" class="form-control">
                <option value="" holder>Pilih Type User</option>
                <option value="1" holder>Administator</option>
                <option value="0" holder>Author</option>
            </select>
              {{-- error validasi form  --}}
              @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required="">
              {{-- error validasi form  --}}
              @error('password')
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