<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\Language;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_page = Page::all()->groupBy('lang');
        $all_language = Language::all();
        return view('backend.pages.page.index')->with([
            'all_page' => $all_page,
            'all_language' => $all_language,
        ]);
    }
    public function new_page(){
        $all_language = Language::all();
        return view('backend.pages.page.new')->with(['all_language' => $all_language]);
    }
    public function store_new_page(Request $request){
        $this->validate($request,[
            'content' => 'nullable',
            'lang' => 'nullable',
            'title' => 'required',
            'status' => 'required|string|max:191',
        ]);

        Page::create([
            'lang' => $request->lang,
            'status' => $request->status,
            'content' => $request->page_content,
            'title' => $request->title,
        ]);

        return redirect()->back()->with([
            'msg' => 'New Page Created...',
            'type' => 'success'
        ]);
    }
    public function edit_page($id){
        $page_post = Page::find($id);
        $all_language = Language::all();
        return view('backend.pages.page.edit')->with([
            'page_post' => $page_post,
            'all_language' => $all_language
        ]);
    }
    public function update_page(Request $request,$id){
        $this->validate($request,[
            'content' => 'nullable',
            'lang' => 'nullable',
            'title' => 'required',
            'status' => 'required|string|max:191',
        ]);
        Page::where('id',$id)->update([
            'lang' => $request->lang,
            'status' => $request->status,
            'content' => $request->page_content,
            'title' => $request->title,
        ]);


        return redirect()->back()->with([
            'msg' => 'Page updated...',
            'type' => 'success'
        ]);
    }
    public function delete_page(Request $request,$id){
        Page::find($id)->delete();
        return redirect()->back()->with([
            'msg' => 'Page Delete Success...',
            'type' => 'danger'
        ]);
    }
}
