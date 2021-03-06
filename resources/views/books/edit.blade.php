@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('authors.index') }}">Penulis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Penulis</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambah Penulis</div>

                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-4">
                            <input name="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Judul Buku" value="{{ $book->title }}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-4">
                                <select name="author_id" type="text" class="form-control {{ $errors->has('author_id') ? ' is-invalid' : '' }}" placeholder="Nama Penulis">
                                    <option> -- Pilih Penulis  -- </option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}"
                                            @if($book->author_id == $author->id)
                                                selected
                                            @endif>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('author_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('author_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-4">
                            <input name="amount" type="text" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" value="{{ $book->amount }}" placeholder="Jumlah">
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cover</label>
                            <div class="col-sm-4">
                            <input name="cover" type="file" class="form-control {{ $errors->has('cover') ? ' is-invalid' : '' }}">
                                @if ($errors->has('cover'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cover') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            @if ($book->cover)
                              <img src="{{ asset('img/' . $book->cover)}}" alt="" width="200" height="200">
                            @endif
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
