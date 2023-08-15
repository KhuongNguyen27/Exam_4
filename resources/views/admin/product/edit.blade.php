@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <strong style='color:blue'>Sửa sách</strong>
            </div>
            <div class="card-body card-block">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="name"
                            value="{{ $product->name }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="author_id" class='form-control'>
                            <option value="{{ $product->author_id}}">{{ $product->author-> name }}</option>
                            @foreach($authors as $author)
                            <option value="{{ $author-> id}}">{{ $author-> name }}</option>
                            @endforeach
                        </select>
                        @error('author_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="isbn"
                            value="{{ $product->isbn }}">
                        @error('isbn')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select name="category_id" class="form-control">
                            <option value="{{ $product->category_id}}">{{ $product->category->name }}</option>
                            @foreach($categories as $category)
                            <option value="{{ $category-> id}}">{{ $category-> name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="page"
                            value="{{ $product->page}}">
                        @error('page')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" name="year"
                            value="{{ $product->year}}">
                        @error('year')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('products.index') }}" class='btn btn-secondary'>Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>
@endsection