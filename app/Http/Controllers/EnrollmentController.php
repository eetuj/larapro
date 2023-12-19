<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\UnenrollReason;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EnrollmentController extends Controller
{

    public function support()
    {
        $events = Event::all();
        return view("audience_index", ['events' => $events]);
    }



        public function myEnrollments()
{
    $user = auth()->user(); // Get the authenticated user
    $enrollments = $user->enrollments; // Retrieve the enrollments associated with the user

    return view('enrollments_index', compact('enrollments'));
}

public function enroll(Event $event)
{
    $user = auth()->user();

    // Check if the event has available slots
    if ($event->qty > 0) {
        // Check if the user is already enrolled
        if (!$user->isEnrolledInEvent($event)) {
            // Decrement the event's quantity by 1
            $event->decrement('qty');

            // Create an enrollment
            $enrollment = new Enrollment();
            $enrollment->user_id = $user->id;
            $enrollment->event_id = $event->id;
            $enrollment->save();

            return redirect(route('ScoutDashboard'))->with('success', 'Event Enrolled successfully');
        } else {
            return redirect(route('ScoutDashboard'))->with('error', 'Already enrolled, cannot enroll again');
        }
    } else {
        return redirect(route('ScoutDashboard'))->with('error', 'Event is full, cannot enroll');
    }
}


public function unenroll(Event $event, Request $request): RedirectResponse
{
    if (auth()->user()->role == 'scout') {
        $user = auth()->user();
    } elseif (auth()->user()->role == 'parent') {
        $user = auth()->user()->scouts->first();
    }
    // Find the enrollment
    $enrollment = Enrollment::where('user_id', $user->id)->where('event_id', $event->id)->first();

    // Check if the user is enrolled in the event
    if ($enrollment) {
        // Increment the event's quantity by 1
        $event->increment('qty');

        // Delete the enrollment
        $enrollment->delete();
        
        UnenrollReason::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'unenroll_reason' => $request->input('unenroll_reason', 'Reason not provided'),
        ]);

        $user = auth()->user();
        // Redirect based on user role
        if ($user->role === 'scout') {
            return redirect(route('scout.myenrollments'))->with('success', 'Unenrolled successfully');
        } elseif ($user->role === 'parent') {
            return redirect(route('ParentDashboard'))->with('success', 'Unenrolled successfully');
        }
    } else {
        // Redirect based on user role
        if ($user->role === 'scout') {
            return redirect(route('scout.myenrollments'))->with('error', 'Not enrolled in the event');
        } elseif ($user->role === 'parent') {
            return redirect(route('ParentDashboard'))->with('error', 'Not enrolled in the event');
        }
    }
}

}
