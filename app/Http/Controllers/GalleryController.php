<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
            'id' => "posts",
            'menu' => 'Gallery',
            'galleries' => Post::where('picture', '!=',
           '')->whereNotNull('picture')->orderBy('created_at', 'desc')->paginate(30)
            );
            return view('gallery.index')->with($data);
           
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
            ]);
            if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);

            $request->file('picture')->storeAs("posts_image", $smallFilename);
            $request->file('picture')->storeAs("posts_image", $mediumFilename);
            $request->file('picture')->storeAs("posts_image", $largeFilename);

            $smallThumbnailPath = storage_path("app/public/posts_image/{$smallFilename}");
            $this->createThumbnail($smallThumbnailPath, 150,93);
            $mediumThumbnailPath = storage_path("app/public/posts_image/{$mediumFilename}");
            $this->createThumbnail($mediumThumbnailPath, 300,185);
            $largeThumbnailPath = storage_path("app/public/posts_image/{$largeFilename}");
            $this->createThumbnail($largeThumbnailPath, 150,93);

            } else {
            $filenameSimpan = 'noimage.png';
            }

            $post = new Post;
            $post->picture = $filenameSimpan;
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->save();
            
            return redirect('gallery')->with('success', 'Berhasil menambahkan data baru');
           
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('gallery.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        File::delete(public_path() ."/storage/posts_image/".$post->picture);

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
            ]);

            if ($request->hasFile('picture')) {
                $filenameWithExt = $request->file('picture')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('picture')->getClientOriginalExtension();
                $basename = uniqid() . time();
                $smallFilename = "small_{$basename}.{$extension}";
                $mediumFilename = "medium_{$basename}.{$extension}";
                $largeFilename = "large_{$basename}.{$extension}";
                $filenameSimpan = "{$basename}.{$extension}";
                $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);

                $request->file('picture')->storeAs("posts_image", $smallFilename);
                $request->file('picture')->storeAs("posts_image", $mediumFilename);
                $request->file('picture')->storeAs("posts_image", $largeFilename);

                $smallThumbnailPath = storage_path("app/public/posts_image/{$smallFilename}");
                $this->createThumbnail($smallThumbnailPath, 150,93);
                $mediumThumbnailPath = storage_path("app/public/posts_image/{$mediumFilename}");
                $this->createThumbnail($mediumThumbnailPath, 300,185);
                $largeThumbnailPath = storage_path("app/public/posts_image/{$largeFilename}");
                $this->createThumbnail($largeThumbnailPath, 150,93);


            } else {
                $filenameSimpan = 'noimage.png';
            };

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'picture' => $filenameSimpan,
        ]);

            return redirect()->route('gallery.index')->with('success', 'Berhasil Mengedit data baru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        //delete image
        File::delete(public_path() ."/storage/posts_image/".$post->picture);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function createThumbnail($path, $width, $height)
    {
    $img = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->save($path);
    }
}