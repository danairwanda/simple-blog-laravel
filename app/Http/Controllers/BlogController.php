<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// add this command to intragion with blog model.
use App\Blog; 
use App\Http\Requests;

class BlogController extends Controller{
  
  public function index(){
        // we need to show all data from blog table with pagination.
        $blogs = Blog::paginate(2);
        // show data in our index view
        return view('blog.index', ['blogs' => $blogs]);
    }   

    public function create(){
        // return on the view create page
        return view('blog.create');
    }

    public function store(Request $request){
        // create the validation form
        $this->validate($request, [
            'title'         =>  'required',
            'description'   =>  'required',
            ]);
        // create the input request data for thw store in database
        $blog = new Blog();
        $blog->title         = $request->title;
        $blog->description   = $request->description ;
        $blog->save();
        // redirect on the home page with message
        return redirect('blog')->with('message','data hasbeen saved!');
    }

    public function show($id){
        // display your blog data based on the id as primary key.
        $blog = Blog::find($id);
        // error 404 page
        if (!$blog) {
            abort(404);
        }
        // return in the view details with the blog data
        return view('blog.details')->with('blog', $blog);
    }

    public function edit($id){
        // display your blog data based on the id as primary key.
        $blog = Blog::find($id);
        // error 404 page
        if (!$blog) {
            abort(404);
        }
        // return in th view edit with the blog data
        return view('blog.edit')->with('blog', $blog);
    }

    public function update(Request $request, $id){
        // create the validation form
        $this->validate($request, [
            'title'         =>  'required',
            'description'   =>  'required',
            ]);
        // edit data with id
        $blog = Blog::find($id);
        $blog->title        = $request->title;
        $blog->description  = $request->description;
        $blog->save();
        // redirect on the home page with message
        return redirect('blog')->with('message','post hasbeen edited!');

    }

    public function destroy($id){
        // delete data based on the id as primary key.
        $blog = Blog::find($id);
        $blog->delete();
        // redirect to home page with message.
        return redirect('blog')->with('message','post hasbeen deleted!');
    }
}
