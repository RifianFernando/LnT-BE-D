<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Checkout example · Bootstrap v5.3</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('navbar.navbar')
    <form action="{{ route('update.book', $book->id) }}" class="mt-5" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input name="title" value="{{ $book->title }}" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Stock</label>
            <input name="stock" value="{{ $book->stock }}" type="number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Content</label>
            <input name="content" value="{{ $book->content }}" type="text" class="form-control">
        </div>
        <div class="col-sm-6">
            <label for="category" class="form-label">Category</label>
            <select id="category" name="category_id">
                <option value="" selected>Select a category</option>
                @forelse ($category as $item)
                    @if ($book->category->id == $item->id)
                        <option value="{{ $item->id }}" selected>{{ $item->CategoryName }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->CategoryName }}</option>
                    @endif
                @empty
                @endforelse
            </select>
        </div>

        {{-- <div class="col-sm-6">
            <label for="author" class="form-label">Authors</label>
            <select id="author" name="author_id">
                <option value="" selected>Select Author</option>
                @forelse ($authors as $item)
                    @if (2 == $item->id)
                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endif
                @empty
                @endforelse
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
