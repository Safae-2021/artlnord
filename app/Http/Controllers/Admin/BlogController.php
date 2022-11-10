<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use Str;

class BlogController extends Controller
{
    //
    public function blogList()
    {
        $selectBlogs = Blog::paginate(5);
        return view('Admin.pages.blogs.bloglist', compact('selectBlogs'));
    }

    public function addBlog()
    {
        return view('Admin.pages.blogs.addblog');
    }

    public function storeBlog(Request $req)
    {
        $getTitle = $req->title;
        $getTitleAr = $req->titlear;
        $getdescription = $req->description;
        $getdescriptionAr = $req->descriptionar;
        $getStatus = $req->status;

        $this->validate($req, [
            'title' => 'required',
            'titlear' => 'required',
            'description' => 'required',
            'descriptionar' => 'required',
            'photo' => 'required',
        ]);

        ////// add it into storage ////

        $photoFile = $req->file('photo');

        $blogFolder = Str::random(8);
        // Generate a file name with extension
        $photoName = $blogFolder . '/blog-' . time() . '.' . $photoFile->getClientOriginalExtension();

        if ($req->hasFile('photo')) {
            // Save the file                                folder , file
            $photoPath = $photoFile->storeAs('public/images/blogs', $photoName);
        }

        ////

        Blog::create([
            'title' => $getTitle,
            'titlear' => $getTitleAr,
            'description' => $getdescription,
            'descriptionar' => $getdescriptionAr,
            'photo' => $photoName,
            'status' => true,
        ]);

        return redirect()->route('blog.list');
    }

    public function deleteBlog($blog_id)
    {
        Blog::where('id', $blog_id)->delete();
        return redirect()->route('blog.list');
    }

    public function editBlog($blog_id)
    {
        $selectBlogsInfo = Blog::where('id', $blog_id)->get();
        return view('Admin.pages.blogs.editBlog', compact('selectBlogsInfo', 'blog_id'));
    }

    public function updateBlog(Request $req, $blog_id)
    {
        $getTitle = $req->title;
        $getTitleAr = $req->titlear;
        $getdescription = $req->description;
        $getdescriptionAr = $req->descriptionar;
        $getStatus = $req->status;

        $this->validate($req, [
            'title' => 'required',
            'titlear' => 'required',
            'description' => 'required',
            'descriptionar' => 'required',
            // 'photo'          => 'required',
        ]);

        $selectBlog = Blog::where('id', $blog_id)
            ->get()
            ->first();
        $getBlogPhoto = $selectBlog->photo;

        $path = 'public/images/blogs';

        ////// add it into storage ////
        $blogPhotoFolder = $getBlogPhoto;
        $name = explode('/', $blogPhotoFolder);
        $folderName = $name[0];
        $fileName = $name[1];
        // dd($folderName);

        $photoFile = $req->file('photo');

        if ($req->hasFile('photo')) {
            Storage::delete($path . '/' . $getBlogPhoto);

            // Generate a file name with extension
            $photoName = $folderName . '/blog-' . time() . '.' . $photoFile->getClientOriginalExtension();

            // Save the file                                folder , file
            $photoPath = $photoFile->storeAs('public/images/blogs', $photoName);

            Blog::where('id', $blog_id)->update([
                'title' => $getTitle,
                'titlear' => $getTitleAr,
                'description' => $getdescription,
                'descriptionar' => $getdescriptionAr,
                'photo' => $photoName,
                'status' => true,
            ]);
        } elseif (!$req->hasFile('photo')) {
            Blog::where('id', $blog_id)->update([
                'title' => $getTitle,
                'titlear' => $getTitleAr,
                'description' => $getdescription,
                'descriptionar' => $getdescriptionAr,
                'photo' => $getBlogPhoto,
                'status' => true,
            ]);
        }
        return redirect()->route('blog.list');
    }
}
