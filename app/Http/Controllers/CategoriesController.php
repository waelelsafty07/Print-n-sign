<?php

namespace App\Http\Controllers;
use App\DataTables\CategoriesDatatables;
use App\Models\Categories;
use Intervention\Image\ImageManager;
use Imagick;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesDatatables $categories)
    {
        //
        // $category = Categories::firstOrCreate();
        return $categories->render('admin.categories.index',['page_title'=>'Categories']);
        // return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create', ['page_title' => 'Create Category']);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->name;
        $file='';
        if($request->avatar!=null){
            
            
            $file = $this->store_file([
                    'source'=>$this->base64ToFile($request->avatar),
                    'validation'=>"image",
                    'path_to_save'=>'/uploads/website/',
                    'type'=>'AVATAR', 
                    'user_id'=>\Auth::user()->id,
                    'resize'=>[500,3000],
                    'small_path'=>'small/',
                    'visibility'=>'PUBLIC',
                    'file_system_type'=>env('FILESYSTEM_DRIVER'),
                    'watermark'=>true,
                    'compress'=>'auto',
                ])['filename'];
            $this->use_hub_file($file, auth()->user()->id);
            
        }
        $request->validate([
            'name'=>"required|min:3|max:190|unique:subcategories"
        ]);
        Categories::create([
            'name'=>$request->name,
            'image'=>$file
        ]);
        notify()->success('Successful Operation','Category Added Successfully');
        return redirect()->back();
    }
    public function base64ToFile($file){

        $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file));

        // save it to temporary dir first.
        $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();
        file_put_contents($tmpFilePath, $fileData);

        // this just to help us get file info.
        $tmpFile = new File($tmpFilePath);

        $file = new UploadedFile(
            $tmpFile->getPathname(),
            $tmpFile->getFilename(),
            $tmpFile->getMimeType(),
            0,
            true // Mark it as test, since the file isn't from real HTTP POST.
        ); 

        return $file;
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
        $category = Categories::find($id)->firstOrCreate();
        $page_title = 'Edit Category';
        return view('admin.categories.edit', compact(['category','page_title']));
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
        $request->validate([
            'name'=>"required|min:3|max:190",
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE', 
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'compress'=>'auto'
            ])['filename'];
            \App\Models\Categories::query()->update(['image'=>$file]);
        }

        \App\Models\Categories::query()->update([
            'name'=>$request->name,
        ]);
        notify()->success('Category updated successfully','Successful Operation');
        return redirect()->back();
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
        Categories::find($id)->delete();
        notify()->success('Successful Operation','Operation Deleted Successfully');
        return redirect()->back();
    }
    public function multiple(Request $request)
    {
        if(is_array(request('item')))
        {
            Categories::destroy(request('item'));
        }else
        {
            Categories::find(request('item'))->delete();
        }
        notify()->success('Successful Operation','Operation Deleted Successfully');
        return redirect()->back();
    }
}
