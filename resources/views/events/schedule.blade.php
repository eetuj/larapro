<!-- resources/views/events/schedule.blade.php -->

@extends('layouts.app') <!-- Make sure to adjust the layout according to your setup -->

@section('content')
    <div class="container">
        <h2>Schedule for {{ $event->name }}</h2>

        @if (!empty($schedule))
            <ul>
                @foreach ($schedule as $date)
                    <li>{{ $date }}</li>
                @endforeach
            </ul>
        @else
            <p>No schedule available for this event.</p>
        @endif
    </div>
@endsection