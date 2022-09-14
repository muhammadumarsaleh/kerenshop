@extends('layouts.admin')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Product</h1>
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
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                             <input type="text" id="name" class="form-control @error('name') is-invalid
                             @enderror" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>
                             @error('name')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control @error('category') is-invalid
                            @enderror" aria-label="Default select example" value="{{ old('category') }}">
                                <option selected>Pilih Category</option>
                                <option value="1">Women</option>
                                <option value="2">Baby</option>
                                <option value="3">Men</option>
                                <option value="4">Shoes</option>
                                <option value="5">Watches</option>
                                <option value="6">Bag</option>
                                <option value="7">Beauty</option>
                            </select>
                            @error('category')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>    

                        <div class="form-group">
                            <label for="description">Description</label>
                             <textarea name="description" rows="10" class="d-block w-100 form-control @error('description') is-invalid
                             @enderror">{{ old('description') }}</textarea>
                             @error('description')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        

                        <div class="form-group">
                            <label for="size">Size</label>
                            <select name="size" id="size" class="form-control @error('size') is-invalid
                            @enderror" aria-label="Default select example" value="{{ old('size') }}">
                                <option selected>Pilih size</option>
                                <option value="All Size">All Size</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                            @error('size')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>    

                        {{-- <div class="form-group">
                            <label for="size">Size</label>
                             <input type="text" class="form-control @error('size') is-invalid
                             @enderror" name="size" placeholder="Size" value="{{ old('size') }}">
                             @error('size')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div> --}}

                        <div class="form-group">
                            <label for="colour">Color</label>
                             <input type="text" class="form-control @error('colour') is-invalid
                             @enderror" name="colour" placeholder="Colour" value="{{ old('colour') }}">
                             @error('colour')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                             <input type="number" class="form-control @error('stok') is-invalid
                             @enderror" name="stok" placeholder="Stok" value="{{ old('stok') }}">
                             @error('stok')
                                 <div class="invalid-feedback">
                                        {{ $message }}
                                 </div>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                             <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                             @error('price')
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
