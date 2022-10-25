<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\Markdown\Facades\Markdown;
use Session;
use App\Models\User;
use App\Models\story;

class StoryController extends Controller
{
    public function list(Request $request){
        $stories = story::latest()->paginate(5);

        return view('stories.stories_list', compact('stories'));
    }

    public function create()
    {
        return view('stories.create_stories');
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required'
        ]);
        story::create([
            'user_id' => $userId,
            'title' => $request->title,
            'slug' => str()->slug($request->slug),
            'status' =>'Active',
            'publish_date' => date('Y-m-d H:i:s'),
            'content' => Markdown::convert($request->description)->getContent(),
        ]);

        return redirect()->route('list.stories')->with('message', 'Story Created Successfully');

    }
    public function edit(Request $request, $slug)
    {
        $storyDetail =story::where('slug',$slug)->first();
        return view('stories.edit_stories',compact('storyDetail')); 
    }

    public function update(Request $request, $slug)
    {
        try {
            $userId = Auth::user()->id;
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'description' => 'required'
            ]);
       
            $storyUpdate = story::where('slug',$slug)->first();
            $storyUpdate->title = $request->title;
            $storyUpdate->slug = $request->slug;
            $storyUpdate->content = $request->description;
            $storyUpdate->save();
            return redirect()->route('list.stories')->with('message', 'Story updated Successfully');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function destory(Request $request, $id)
    {
        try {
               $story =  story::find($id);
                if($story->delete()) {
                    return redirect()->route('list.stories')->with('message', 'Story deleted Successfully');
                }
            } catch (Exception $e) {
                return back()->with('error', $e->getMessage());
           }
    }

    public function view(Request $request, $userName,$slug){
        try {
            $storyDetail =story::where('slug',$slug)->first();
            return view('stories.view_stories',compact('storyDetail')); 
            
         } catch (Exception $e) {
             return back()->with('error', $e->getMessage());
        }
    }
}
