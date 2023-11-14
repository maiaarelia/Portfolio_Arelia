@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-7">

        <div class="card">
            <div class="card-header">R E G I S T E R</div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                                <label for="name" class="mb-2">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Masukan Nama Lengkap" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                                <label for="name" class="mb-2">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Masukan Email Anda" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                                <label for="photo" class="mb-2">Photo</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                                    name="photo" value="{{ old('photo') }}">
                                @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                                <label for="password" class="mb-2">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Buat Password Anda">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                                <label for="password_confirmation" class="mb-2">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Konfirmasi Ulang Password">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 row justify-content-center">
                        <input type="submit" class="col-md-5 btn btn-primary" value="R E G I S T R A S I">
                    </div>


                    <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                                <p class="isi_peringatan mt-2" style="text-align: center;">Sudah Memiliki Akses untuk
                                    Melihat Website Portofolio? <span style="color: blue;"><a href="auth.login">Log
                                            In</a></span></p>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection