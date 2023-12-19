<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Events\AppEventSaved;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    public function index2()
    {
        $events = Event::all();
        return view('/dashboard', ['events' => $events]);
    }
    public function create()
    {
        return view('events.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([

            'name' => 'required',
            'qty' => 'required|numeric',
            'location' => 'required',
            'age' => 'required',
            'price' => 'required|decimal:0,2',
            'event_type' => 'required',
            'starts_at' => 'required|date',  //for the starts_at field
            'description' => 'nullable'
        ]);
         // Check if the 'allow_audience' checkbox is checked
    $data['allow_audience'] = $request->has('allow_audience');
        $newEvent = Event::create($data);

        return redirect(route('adminDashboard'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    public function update(Event $event, Request $request)
    {
        $data = $request->validate([

            'name' => 'required',
            'qty' => 'required|numeric',
            'location' => 'required',
            'age' => 'required',
            'price' => 'required|decimal:0,2',
            'event_type' => 'required',
            'starts_at' => 'required|date',  //for the starts_at field
            'allow_audience' => 'nullable',  
            'description' => 'nullable'
        ]);
        $data['allow_audience'] = $request->has('allow_audience');
        $event->update($data);
        return redirect(route('adminDashboard'))->with('success', 'Event Updated Succefully!');
    }
    public function delete(Event $event)
    {
       //$event->enrollments()->delete();
        $event->Delete();
        return redirect(route('adminDashboard'))->with('success', 'Event Deleted Succefully');
    }



public function searchEvents(Request $request)
{
    $query = $request->input('query');

    // Perform your search logic here (e.g., searching in multiple columns)
    $events = Event::where('name', 'like', '%' . $query . '%')
        ->orWhere('location', 'like', '%' . $query . '%')
        ->orWhere('age', 'like', '%' . $query . '%')
        ->orWhere('price', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->orWhere('starts_at', 'like', '%' . $query . '%')
        ->get();
  // Check the user's role and redirect accordingly
  $user = Auth::user();

  if ($user->role === 'scout') {
      return view('scout.scout_dashboard', ['events' => $events]);
  } elseif ($user->role === 'admin') {
      return view('admin.index', ['events' => $events]);
  } elseif ($user->role === 'parent') {
      return view('parent.parent_dashboard', ['events' => $events]);
  }

  // Add additional conditions for other roles if needed

  // Default fallback, you can customize this as needed
  return view('default.dashboard', ['events' => $events]);
}
}