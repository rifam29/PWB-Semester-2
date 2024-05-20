@extends('template.master')

@section('content')
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Horizontal Form</h6>
                            <form action="{{ route('cast.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control @error('nama') {{ 'is-invalid' }} @enderror" id="nama" placeholder="Enter Nama" value="{{ old('nama') }}">
                                    </div>
                                    @error('nama')
                                    <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                                    <div class="col-sm-10">
                                    <input type="number" name="umur" class="form-control @error('umur') {{ 'is-invalid' }} @enderror" id="umur" placeholder="Enter Umur" value="{{ old('umur') }}">
                                    </div>
                                    @error('umur')
                                    <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="bio">Bio</label>
                                    <div class="col-sm-10">
                                    <textarea name="bio" id="bio" cols="30" rows="10" class="form-control @error('bio') {{ 'is-invalid' }} @enderror" placeholder="Enter Umur">{{ @old('bio') }}</textarea>
                                    </div>
                                    @error('bio')
                                    <span id="terms-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        
                    </div>
                        </div>
                    </div>
                    <!-- <div class="col-sm-12 col-xl-6">
                        
                    </div> -->
                </div>
            </div>
@endsection
