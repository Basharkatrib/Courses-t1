<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('User.profile', compact('user'));
        }
        
        // Handle case where user is not logged in
        return redirect('/'); // أو أي رد فعل آخر مناسب
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('images'), $imageName);
            $user->profile_image = $imageName; 
        }
    
        
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    
    
   
}
