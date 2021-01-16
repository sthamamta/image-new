<html>
<head>
<link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.css">
</head>
<body>
<h3>upload image</h3>

@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

        <strong style="text-decoration-color: green;">{{ $message }}</strong>

</div>
@endif

<form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

                    <input type="file" name="image" class="form-control">

                    <button type="submit">Upload</button>
            </div>

        </form>
</body>
</html>