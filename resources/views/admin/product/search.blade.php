@extends('Admin.master')
@section('content')
<a href="{{ route('products.index') }}" class='btn btn-light'>Quay lại</a>
<table class="table">
    <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên sách</th>
        <th scope="col">ISBN</th>
        <th scope="col">Tác giả</th>
        <th scope="col">Thể loại</th>
        <th scope="col">Số trang</th>
        <th scope="col">Năm xuất bản</th>
        <th scope="col">Hành động</th>
    </tr>
    @foreach ($products as $key => $product)
    <tr>
        <?php 
        ?>
        <td>{{ $key++ }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->isbn }}</td>
        <td>{{ $product->author->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->page }}</td>
        <td>{{ $product->year }}</td>
        <td>
            <div class="d-flex">
                <a href="{{ route('products.edit', $product->id) }}" class='btn btn-primary'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
                <form action="{{ route('products.destroy',$product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá sách?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash" viewBox="0 0 16 16">
                            <path
                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                            <path
                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                        </svg></button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>
@endsection