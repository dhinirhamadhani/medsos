<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Feed Video</title>
    <style>
        h2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="text-center">Feed</h2>
        @foreach ($vid as $vid)
            <div class="position-relative d-inline-block">
                <video width="640" height="360" controls class="card-img-top">
                    <source src="{{ asset('/vid/'.$vid->vid)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="text-left">
                <div>{{ $vid->caption }}</div>
                <div>{{ $vid->created_at->format('d F Y')}}</div>
            </div>
            <form action="{{ route('vidd.destroy',$vid->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus video ini')">Hapus</button>
            </form>
            <br>
        @endforeach
            <a class="btn btn-success" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
   
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a class="btn btn-success" href="{{ route('vidd.create') }}">Add</a>
        </div>
</body>
</html>