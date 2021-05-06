<?php

namespace App\Http\Controllers;

use App\Tags;
use App\Posts;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::paginate(5);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        //ambil data category untuk select option
        $categories = Category::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        //upload gambar dengan intial link name
        $gambar = $request->gambar;
        // gabungkan waktu dan nama file gambarnya
        $newGambar = time().$gambar->getClientOriginalName();
        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/uploads/posts/'.$newGambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id()
        ]);

        // tags multiple insert
        // panggil relasi tags. fungsi attach untuk many to many
        $post->tags()->attach($request->tags);
        $gambar->move('public/uploads/posts/', $newGambar);

        return redirect()->route('posts.index')->with('status', 'data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tags = Tags::all();
        $categories = Category::all();
        $posts = Posts::findOrFail($id);
        return view('admin.post.edit', compact('posts', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'judul' => 'required|min:3',
            'category_id' => 'required',
            'content' => 'required'
        ]);
    
        

        $posts = Posts::findOrFail($id);
        // 1. jika request form terdapat file gmabr
        if($request->has('gambar'))
        {
            // request formgambar
            $gambar = $request->gambar;
            // gabungkan waktu dan nama file gambarnya
            $newGambar = time().$gambar->getClientOriginalName();

            $gambar->move('public/uploads/posts/', $newGambar);

            // 2. maka penyimpanan gambar
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => 'public/uploads/posts/'.$newGambar,
                'slug' => Str::slug($request->judul),
                
            ];
    
        } 
        else {
                // 3. jika tidak terdapat gambar pada request. maka hanya field di bawah ini yang di isikan 
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul)
            ];
    

        }

        // tags multiple insert
        // panggil relasi tags. 
        // fungsi sync untuk mengsingkronkan data karna update
        // untuk insert menggunakan attach
        $posts->tags()->sync($request->tags);
        $posts->update($post_data);
        
        return redirect()->route('posts.index')->with('status', 'data berhasil diUbah');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $posts = Posts::findorFail($id);
        $posts->delete();

        return redirect()->route('posts.index')->with('status', 'data berhasil diHapus (Cek Di Trashed)');

    }

    // fungsi sampah trashed
    public function trashed() {

        // Retrieving Only Soft Deleted Models. liat di documentasi
        $posts = Posts::onlyTrashed()->paginate(10);
        return view('admin.post.trashed', compact('posts'));
    }

    // restore
    public function restore($id) {
        $posts = Posts::withTrashed()->where('id', $id)->first();
        $posts->restore();

        return redirect()->route('posts.index')->with('status', 'data berhasil diRestore');
    }

    // hapus permanen

    public function deletePermanen($id) {
        $posts = Posts::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();

        return redirect()->route('posts.index')->with('status', 'data berhasil dihapus dari trash');
    }




}
