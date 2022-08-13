<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <section style="padding-top:60px;">

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            All Category
                            <a href="{{ route('category.add') }}">Add Category</a>
                        </div>

                        <div class="card-body">
                            @if (Session::has('category_deleted'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('category_deleted') }}
                                </div>
                            @elseif (Session::has('category_edited'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('category_edited') }}
                                </div>
                            @elseif (Session::has('Category_Created'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('Category_Created') }}
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $catitem)
                                        <tr>
                                            <td>{{ $catitem->id }}</td>
                                            <td>{{ $catitem->name }}</td>
                                            <td>
                                                <a href="{{ route('category.getbyid', ['id'=>$catitem->id]) }}" class="btn btn-success">Details</a>
                                                <a href="{{ route('category.delete', ['id'=>$catitem->id]) }}" class="btn btn-danger">Delete</a>
                                                <a href="{{ route('category.edit', ['id'=>$catitem->id]) }}" class="btn btn-info">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
