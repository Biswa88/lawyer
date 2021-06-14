<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</head>
<body>
    <section style="padding-top:60px;">
           <div class="container">
               <div class="row">
                   <div class="col-md-6 offset-md-3">
                       <div class="card">
                           <div class="card-header">
                               Import
                           </div>
                           <div class="card-body">
                               <form method= "POST" enctype="multipart/form-data" action="{{route('lawyer.import')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="file">Choose CSV</label>
                                    <input type="file" name="file" class="form-control" />
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                           </div>


                       </div>
                   </div>
               </div>
           </div>
    </section>
</body>
</html>