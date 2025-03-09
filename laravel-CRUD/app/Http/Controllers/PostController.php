<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * عرض جميع البيانات (index).
     */
    public function index()
    {
        $posts = Post::all(); // يجب أن يكون الاسم بحروف كبيرة
        return view('posts.index', compact('posts'));    
    }

    /**
     * عرض نموذج إنشاء جديد (create).
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * حفظ البيانات في قاعدة البيانات (store).
     */
    public function store(Request $request)
    {
       
    $post=new post();
    $post->name=$request->name;
    $post->email=$request->email;
    $post->message=$request->message;
    $post->save();
    return ('done');

        // Post::create($request->all()); // استخدم Post بدلاً من post
        // return redirect()->route('posts.index')->with('success', 'Data added successfully.');
    }

    /**
     * عرض نموذج تعديل بيانات (edit).
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    /**
     * تحديث البيانات في قاعدة البيانات (update).
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:posts,email,' . $id,
            'message' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Data updated successfully.');
    }

    /**
     * حذف البيانات من قاعدة البيانات (destroy).
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('success', 'Data deleted successfully.');
    }
}
