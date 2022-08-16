@extends('layouts.admin')
@section('content')
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Product</h1>
                            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Product
                            </a>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Name</th>
                                            <th>Stok</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                            ?>
                                            @forelse ($products  as $product)
                                            <tr>
                                                <?php
                                                $picture = $product->picture;
                                                ?>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ asset('storage/'.$product->picture) }}" class="img-thumbnail" style="width:20%;height:10%;"></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->stok }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                            @empty 
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    Data kosong
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                    <!-- /.container-fluid -->
@endsection
