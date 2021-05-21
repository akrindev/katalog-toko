@extends('layouts.tabler')

@section('title', 'Product Category')

@section('content')
    <div class="page-header">
        <h2 class="page-title">Product Category</h2>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('dashboard.products.category.add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Nama Kategori" required>
                    </div>

                    <div class="form-footer">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                    </form>
                </div>
                <table class="table card-table">
                    <tbody>
                    @forelse ($categories as $category)
                        @if ($category->id == 1)
                        <tr>
                            <td colspan="2">
                                <div>{{ $category->name }}</div>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <form method="POST" action="{{ route('dashboard.products.category', $category->id) }}">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <td>
                                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                                </td>

                                <td>
                                    <button class="btn-sm btn btn-primary btn-block" type="submit">save</button>
                                    <button class="btn btn-sm btn-block btn-danger" onclick="event.preventDefault(); confirm('yakin mau hapus kategori ini?') ? document.getElementById('del{{ $category->id }}').submit() : false;">Hapus</button>
                                </td>
                            </form>
                            <form action="{{ route('dashboard.products.category', $category->id) }}" method="POST" id="del{{ $category->id }}">
                            @csrf
                            @method('delete')
                            </form>
                        </tr>
                        @endif
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
