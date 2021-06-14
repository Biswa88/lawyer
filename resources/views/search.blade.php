<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin-top:40px">
                <h4>Search </h4><hr>
                <form action="{{ route('web.search') }}" method="get">
                <div class="form-group"></div>
                <label for="">Enter Keyword</label>
                <input type="text" class="form-control" name="query" placeholder="Search Here">

            </div>
      
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <br>
        <br>
        <hr>
        <br>
        @if(isset($case_deals))
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Case_Deal</th>
                {{-- <th>Case_No</th>
                <th>Year</th> 
                <th>Status</th>--}}
                

            </tr>
        </thead>
        <tbody>
            @if(count($case_deals)>0)
            @foreach ($case_deals as $item)
            
            <tr>
                <td>{{$item->case_deal  }}</td>
                {{-- <td>{{$item->case_no}}</td>
                <td>{{$item->year }}</td>
                <td>{{$item->status }}</td> --}}
                
            </tr>
                
            @endforeach
            @else
            <tr><td>No Result Found!</td></tr>
            @endif
        </tbody>
        
        </table>
        <div class="pagination-block">
            {{ $case_deals->links() }}
        </div>

     @endif
        </div>
    </div>
</body>
</html>