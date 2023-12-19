@extends('admin.admin_dashboard')
@section('admin')
  

    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">events</h6>
                </div>
                <div class="table-responsive">
                  
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>QTY</th>
                                <th>Location</th>
                                <th>Age</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Starting Date</th> 
                            </tr>
                        </thead>

      
                        <tbody>
       @if($results->isEmpty())
    <h5 style="color:red">No results found.</h5>  
    @else  
                            @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->id }}</td>
                                <td>{{$result->name }}</td>
                                 <td>{{$result->qty }}</td>           
                                <td>{{ $result->location }}</td>
                                <td>{{ $result->age }}</td>
                                <td>{{ $result->price }}</td>
                                <td>{{ $result->description }}</td>
                                <td>{{ $result->starts_at}}</td>
                                
                                
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                         @endif
                        </tbody>
                    </table>
                    @if (session()->has('success'))
                    <div>
                        {{ session('success') }}
                    </div>
                @endif

                </div>
            </div>
        </div>
    </div>
@endsection