<?php

namespace App\Http\Controllers;
use App\Models\Subcategories;
use App\Models\Categories;
use App\DataTables\SubcategoriesDatatables;
use Intervention\Image\ImageManager;
use Imagick;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxList($id)
    {
        //
        // return $id;
        $data= Subcategories::where('category_id', $id)->get();
        return $data;
    }
    public function index(SubcategoriesDatatables $subcategories, $id)
    {
        //
        // $subcategories = Subcategories::where('category_id',$id)->get();
        $page_title = Categories::find($id);
        return $subcategories->with('id', $id)->render('admin.categories.subcategories.index',['page_title'=>'Sub Categories '.$page_title['name']]);

        // echo $subcategories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $page_title='Create a new subCategory';
        return view('admin.categories.subcategories.create',compact('page_title','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'name'=>"required|min:3|max:190|unique:subcategories",
            'category_id'=>"required",
        ]);
        Subcategories::create([
            'name'=>$request->name,
            'image'=>$file,
            'category_id'=>$request->category_id
        ]);
        notify()->success('Successful Operation','SubCategory Added Successfully');
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
        $Subcategories = Subcategories::find($id);
        $page_title = 'Edit SubCategory';
        return view('admin.categories.subcategories.edit', compact(['Subcategories','page_title']));
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
        //

        $request->validate([
            'name'=>"required|min:3|max:190",
            'category_id'=>"required",
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
                \App\Models\Subcategories::find($id)->update(['image'=>$file]);
            }
            
        Subcategories::find($id)->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id
        ]);
        notify()->success('Successful Operation','SubCategory Updated Successfully');
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

        // return $id;
        //
        Subcategories::find($id)->delete();
        notify()->success('Successful Operation','Operation Deleted Successfully');
        return redirect()->back();
    }
    public function multiple(Request $request)
    {
        // return $request;
        if(is_array(request('item')))
        {
            Subcategories::destroy(request('item'));
        }else
        {
            Subcategories::find(request('item'))->delete();
        }
        notify()->success('Successful Operation','Operation Deleted Successfully');
        return redirect()->back();
    }
}
