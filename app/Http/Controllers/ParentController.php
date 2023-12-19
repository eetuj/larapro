<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ParentController extends Controller
{
    public function ParentDashboard()
    {

        $events = Event::all();
        return view("parent.parent_dashboard", ['events' => $events]);
    }

        //Retrive Child's info
        public function myChild()
        {
            $user = auth()->user(); // Get the authenticated user
            $scouts = $user->scouts; // Retrieve the scout associated with the user
    
            return view('parent.myChild', compact('scouts'));
        }

        public function addChild()
        {
            return view('parent.addChild');
        }
    
        public function linkChild(Request $request)
        {
            // Validate the form data
            $request->validate([
                'child_name' => 'required',
                'child_username' => 'required',
                'child_email' => 'required|email',
            ]);
    
            // Find the authenticated scout
            $parent = auth()->user();
    
            // Find the parent based on the provided information
            $scout = User::where([
                'name' => $request->input('child_name'),
                'username' => $request->input('child_username'),
                'email' => $request->input('child_email'),
                'role' => 'scout',
                'age' => 17,
            ])->first();
    
            // Check if the parent is found
            if ($scout) {
                // Check if the parent is not already linked to the scout
                if (!$parent->scouts->contains($scout->id)) {
                    // Associate the parent with the scout
                    $parent->scouts()->attach($scout->id);
    
                    return redirect(route('parent.myChild'))->with('success', 'Scout associated successfully');
                } else {
                    return redirect(route('parent.addChild'))->with('error', 'Scout is already associated with the Parent.');
                }
            } else {
                return redirect(route('parent.addChild'))->with('error', 'Scout not found. Please check the provided information.');
            }
        }
        //Unlink the Parent
        public function unlinkChild(User $scout): RedirectResponse
    {
        $user = auth()->user();
        $user->scouts()->detach($scout->id);
    
        return redirect(route('parent.myChild'))->with('success', 'Scout unlinked successfully');
    }
    
}
