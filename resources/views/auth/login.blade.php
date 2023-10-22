@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="{{ route('authenticate') }}" method="post">
                @csrf

                <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                            <label for="email" class="mb-2">Email Address</label> 
                          <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" placeholder="Masukan Email Anda" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            </div>
                        </div>
                    </div>



                    <div class="mb-3 row justify-content-center">
                        <div class="col-md-7 col-form-label text-start">
                            <div class="col">
                            <label for="password" class="mb-2">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password')}}</span>
                        @endif
                            </div>
                        </div>
                    </div>


                <div class="mb-3 row">
                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>

    </div>
</div>

@endsection