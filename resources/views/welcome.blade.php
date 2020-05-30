<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <Title>Calculator</Title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="background-color: gray">

        <div class="container text-center">
            <h1>Basic Calculator</h1>
            <br />
            <br />
            <div class="row text-center">
                <div class="col-md-6">
                    @if(session('info'))
                        <div class="alert alert-info">
                            {{ session('info') }}
                        </div>
                    @endif
            </div>

            <br />
            <br />
        <form class="form-horizontal" method="POST" action="/calculate">
            {{ csrf_field() }}

            <div class="row text-center">
                <div class="col-md-3">
                <input class="form-control" type="number" name="first" placeholder="Enter number" required>
                </div>
                <div class="col-md-3">
                <select class="form-control" name="operator" required>
                        <option value="" selected=""> SELECT OPERATOR <option>
                        <option value="plus" > + <option>
                        <option value="minus" > - <option>
                        <option value="multiply" > * <option>
                        <option value="divide" > / <option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="number" name="second" placeholder="Enter number" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
        <div class="row text-center text-white mt-5">
            <h3>Past results </h3>
            @if(count($results) > 0)
                <table class="table text-white">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Number</th>
                        <th scope="col">Operator</th>
                        <th scope="col">Second Number</th>
                        <th scope="col">Result</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result )
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->first_number}}</td>
                            <td>{{$result->operator}}</td>
                            <td>{{$result->second_number}}</td> 
                            <td>{{$result->sum}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <div class="row mt-5">
                        <h5>No results found yet</h5>
                    </div>
            @endif
        </div>
    </body>
</html>
