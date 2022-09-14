@extends('layouts.admin')
@section('content')
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Postingan</h1>
                            <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Post
                            </a>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Title</th>
                                            <th>content</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                            ?>
                                            @forelse ($posts as $post)
                                            <tr>
                                                <?php
                                                $picture = $post->picture;
                                                ?>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ asset('storage/'.$post->picture) }}" class="img-thumbnail" style="width:20%;height:10%;"></td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->excerpt }}</td>
                                                <td>
                                                    <a href="{{ route('post.edit', $post->slug) }}" class="btn btn-info">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('post.destroy', $post->slug) }}" method="POST" class="d-inline">
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
