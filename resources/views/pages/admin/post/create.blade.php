@extends('layouts.admin')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Postingan</h1>
            </div> 
                
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                             <input type="text" id="title" class="form-control @error('title') is-invalid
                             @enderror" name="title" placeholder="Title" value="{{ old('title') }}" autofocus>
                             @error('title')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                             <textarea name="content" rows="10" class="d-block w-100 form-control @error('content') is-invalid
                             @enderror">{{ old('content') }}</textarea>
                             @error('content')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>

                        {{-- <div class="form-group">
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Pilih size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                        </div>     --}}

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                             <input type="date" class="form-control @error('tanggal') is-invalid
                             @enderror" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}">
                             @error('tanggal')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="picture">Picture</label>
                             <input type="file" class="form-control @error('picture') is-invalid
                             @enderror" name="picture" placeholder="Picture" accept="image/*" value="{{ old('picture') }}">
                             @error('file')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </form>
                </div> 
            </div>

       </div>

@endsection


