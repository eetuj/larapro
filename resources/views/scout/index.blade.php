@extends('scout.scout_dashboard')
@section('scout')
  
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
                            <th>Enroll</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->qty }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->age }}</td>
                            <td>{{ $event->price }}</td>
                            <td>{{ $event->description }}</td>
                            <td>
                                <form method="post"
                                   action="{{ route('event.enroll', ['event' => $event]) }}">
                                   @csrf
                                   <button type="submit" class="btn btn-info">Enroll</button>
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
