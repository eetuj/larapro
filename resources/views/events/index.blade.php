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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->name }}</td>
                                <td>
                                    @if ($event->qty == 0)
                                        <span class="text-danger">Full</span>
                                    @else
                                        {{ $event->qty }} / {{ $event->initial_qty }}
                                    @endif
                                </td>             
                                <td>{{ $event->location }}</td>
                                <td>{{ $event->age }}</td>
                                <td>{{ $event->price }}</td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->starts_at}}</td>   
                                <td>
                                    <a  class="btn btn-inverse-primary" href="{{ route('event.edit', ['event' => $event]) }}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('event.delete', ['event' => $event]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"  class="btn btn-inverse-danger">Delete</button>
            
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
    </div> <!-- row -->

    </div>

    </div>
    @endsection