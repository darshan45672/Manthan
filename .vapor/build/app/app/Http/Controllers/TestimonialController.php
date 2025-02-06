<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index(){
        $user = Auth::user();
        $testimonials = Testimonials::where('user_id', $user->id)->first();
        // dd($testimonials);
        return view('dashboard.testimonial.index', compact('testimonials'));
    }

    public function create(){
        return view('dashboard.testimonial.create');
    }

    public function edit(){
        $testimonial = Testimonials::where('user_id', Auth::user()->id)->first();
        return view('dashboard.testimonial.edit', compact('testimonial'));
    }

    public function store(Request $request){

        // dd($request->all());
        $request->validate([
            'title' => 'required|min:5',
            'testimonial' => 'required',
        ]);

        $testimonial = new Testimonials();
        $testimonial->user_id = Auth::user()->id;
        $testimonial->title = $request->title;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->save();

        // dd("done save");

        return redirect()->route('user.testimonials')->with('success', 'Testimonial added successfully');
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:5',
            'testimonial' => 'required',
        ]);

        $testimonial = Testimonials::find($id);

        $testimonial->update([
            'title' => $request->title,
            'testimonial' => $request->testimonial,
        ]);

        // dd("done update");
        return redirect()->route('user.testimonials')->with('success', 'Testimonial updated successfully');
    }

    public function destroy($id){
        $testimonial = Testimonials::find($id);
        $testimonial->delete();

        return redirect()->route('user.testimonials')->with('success', 'Testimonial deleted successfully');
    }
}
