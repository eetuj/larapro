<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Audience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AudienceController extends Controller
{
    public function storeNbuy(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'selectedEvent' => 'required|exists:events,id',
        ]);
    
        $event = Event::find($data['selectedEvent']);
    
        // Create the audience
        $audience = Audience::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'event_id' => $event->id,
        ]);
    
        // Retrieve the newly created audience
        $profileData = Audience::find($audience->id);
// Retrieve the associated event using the relationship
$event = $profileData->event;

        // Pass the data to the view
        return view("audience_kuitti", compact('profileData', 'event'));
    }
}