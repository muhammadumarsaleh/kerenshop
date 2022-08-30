@extends('layouts.admin')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Post {{ $item->title }}</h1>
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
                    <form action="{{ route('post.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                             <input type="text" id="title" class="form-control @error('title') is-invalid
                             @enderror" name="title" placeholder="Name" value="{{ $item->title }}">
                             @error('title')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                             <textarea name="content" rows="10" class="d-block w-100 form-control @error('content') is-invalid
                             @enderror">{{ $item->content }}</textarea>
                             @error('content')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                             <input type="date" class="form-control @error('tanggal') is-invalid
                             @enderror" name="tanggal" placeholder="Size" value="{{ $item->tanggal }}">
                             @error('tanggal')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="picture">Picture</label>
                            <div>
                                <img src="{{ asset('storage/'. $item->picture) }}" class="img-thumbnail" style="width:20%;height:10%;">
                            </div>
                             <input type="file" class="form-control @error('picture') is-invalid
                             @enderror" name="picture" placeholder="Picture" accept="image/*" value="{{ $item->picture }}">
                             @error('file')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Ubah
                        </button>
                    </form>
                </div> 
            </div>

       </div>

@endsection
