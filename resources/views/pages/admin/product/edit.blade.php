@extends('layouts.admin')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Product {{ $item->name }}</h1>
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
                    <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                             <input type="text" id="name" class="form-control @error('name') is-invalid
                             @enderror" name="name" placeholder="Name" value="{{ $item->name }}">
                             @error('name')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                             <textarea name="description" rows="10" class="d-block w-100 form-control @error('description') is-invalid
                             @enderror">{{ $item->description }}</textarea>
                             @error('description')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                             <input type="text" class="form-control @error('size') is-invalid
                             @enderror" name="size" placeholder="Size" value="{{ $item->size }}">
                             @error('size')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="colour">Colour</label>
                             <input type="text" class="form-control @error('colour') is-invalid
                             @enderror" name="colour" placeholder="Colour" value="{{ $item->colour }}">
                             @error('colour')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                             <input type="number" class="form-control @error('stok') is-invalid
                             @enderror" name="stok" placeholder="Stok" value="{{ $item->stok }}">
                             @error('stok')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                             <input type="number" class="form-control" name="price" placeholder="Price" value="{{ $item->price }}">
                             @error('price')
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
