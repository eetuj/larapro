<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Raw;

class ScoutController extends Controller
{
    public function ScoutDashboard()
    {
        $events = Event::all();
        return view("scout.scout_dashboard", ['events' => $events]);
    }

    public function ScoutLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function ScoutProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('scout.scout_profile_view', compact('profileData'));
    }

    //UPDATE SCOUT DATA
    public function ScoutProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->phone = $request->phone;
        $data->email = $request->email;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName(); //date . original name    
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            [
                'message' => 'Scout Profile Updated Successfully',
                'alert-type' => 'success',
            ]
        );
        return redirect()->back()->with($notification);
    }

    public function ScoutChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('scout.scout_change_password', compact('profileData'));
    }

    public function ScoutUpdatePassword(Request $request)
    {   //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

        ]);

        ///Match the old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                [
                    'message' => 'Old Password Does not Match!',
                    'alert-type' => 'error'
                ]
            );
            return back()->with($notification);
        }

        //update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            [
                'message' => 'Password Changes Successfully!',
                'alert-type' => 'success',
            ]
        );
        return back()->with($notification);
    }


    //Retrive Parent's info
    public function myParents()
    {
        $user = auth()->user(); // Get the authenticated user
        $parents = $user->parents; // Retrieve the parents associated with the user

        return view('scout.myParents', compact('parents'));
    }
    public function addParent()
    {
        return view('scout.addParent');
    }

    public function linkParent(Request $request)
    {
        // Validate the form data
        $request->validate([
            'parent_name' => 'required',
            'parent_username' => 'required',
            'parent_email' => 'required|email',
            'parent_phone' => 'required',
        ]);

        // Find the authenticated scout
        $scout = auth()->user();

        // Find the parent based on the provided information
        $parent = User::where([
            'name' => $request->input('parent_name'),
            'username' => $request->input('parent_username'),
            'email' => $request->input('parent_email'),
            'phone' => $request->input('parent_phone'),
            'role' => 'parent',
            'age' => 18,
        ])->first();

        // Check if the parent is found
        if ($parent) {
            // Check if the parent is not already linked to the scout
            if (!$scout->parents->contains($parent->id)) {
                // Associate the parent with the scout
                $scout->parents()->attach($parent->id);

                return redirect(route('scout.myParents'))->with('success', 'Parent associated successfully');
            } else {
                return redirect(route('scout.addParent'))->with('error', 'Parent is already associated with the scout.');
            }
        } else {
            return redirect(route('scout.addParent'))->with('error', 'Parent not found. Please check the provided information.');
        }
    }

    public function unlinkParent(User $parent): RedirectResponse
    {
        $user = auth()->user();
        $user->parents()->detach($parent->id);
    
        return redirect(route('scout.myParents'))->with('success', 'Parent unlinked successfully');
    }

    public function viewEnrollments(User $scout)
{     
    $enrollments = $scout->enrollments; // Retrieve the enrollments associated with the user
    return view('scout.view_enrollments', compact('enrollments'));
}
}
