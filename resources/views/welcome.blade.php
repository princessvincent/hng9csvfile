<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jquery</title>
    {{-- <link rel="stylesheet" href="style.css"> --}}
</head>

<body>

    <div>

      <form action="{{ route("acceptcsv") }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="file" class="form-control" id="files">
      <button type="submit" id="submit-file" name="sub" class="form-control">Upload</button>
      
      </form>

    </div>

<script>
   
</script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.2/papaparse.min.js"
    integrity="sha512-SGWgwwRA8xZgEoKiex3UubkSkV1zSE1BS6O4pXcaxcNtUlQsOmOmhVnDwIvqGRfEmuz83tIGL13cXMZn6upPyg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

</body>
{{-- <script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset ('js/index.js') }}"></script> --}}
</html>