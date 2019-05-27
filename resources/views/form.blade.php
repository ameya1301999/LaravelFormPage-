<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
<title>Form Page</title>
    <div class="container flex-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            @if(is_array(session()->get('success')))
                                <ul>
                                    @foreach (session()->get('success') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ session()->get('success') }}
                            @endif
                        </div>
                    @endif
                    <div class="card-header">{{ __('Form Page') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('store') }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pincode" class="col-md-4 col-form-label text-md-right">{{ __('Pincode') }}</label>

                                <div class="col-md-6">
                                    <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" value="{{ old('pincode') }}" name="pincode"  autocomplete="pincode">

                                    @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>"{{$message}}"</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
