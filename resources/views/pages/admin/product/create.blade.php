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
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                             <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                             <textarea name="description" rows="10" class="d-block w-100 form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label>
                             <input type="text" class="form-control" name="size" placeholder="Size" value="{{ old('size') }}">
                        </div>
                        <div class="form-group">
                            <label for="colour">Colour</label>
                             <input type="text" class="form-control" name="colour" placeholder="Colour" value="{{ old('colour') }}">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                             <input type="number" class="form-control" name="stok" placeholder="Stok" value="{{ old('stok') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                             <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="picture">Picture</label>
                             <input type="file" class="form-control" name="picture" placeholder="Picture" value="{{ old('picture') }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </form>
                </div> 
            </div>

       </div>

@endsection
