<?php

namespace App\Http\Controllers;
use App\Models\edge;
use App\Models\Categories;
use App\Models\Imageproducts;
use App\Models\paper_sizes;
use App\Models\paper_type;
use App\Models\paper_weight;
use App\Models\points;
use App\Models\Products;
use App\DataTables\ProductsDatatables;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatables $products)
    {
        //
        return $products->render('admin.products.index',['page_title'=>'Products']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create', ['page_title' => 'Create Products']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // return $request;
        $text =$this->RemoveSpecialChar($request['fileuploader-list-file']);
        $array = explode(' ', $text);
        $request->validate([
            'name'=>"required|min:3|max:190",
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'points'=>'required',
            'description'=>'required',
            'small_description'=>'required',
        ]);
        //points

        $id = Products::create([
            'products_name'=>$request->name,
            'category_id'=>$request->category_id,
            'subCategory_id'=>$request->subcategory_id,
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            
        ])->id;

        // return points[]$id;
        foreach ($array as $arr)
        {
            if(!empty($arr))
            {
                Imageproducts::create([
                    'imageproducts_name'=>$arr,
                    'product_id'=>$id,
                ]);
            }
        }
        //points
        foreach ($request->points as $arr)
        {
            if(!empty($arr))
            {
                points::create([
                    'name_points'=>$arr,
                    'product_id'=>$id,
                ]);
            }
        }
        
        notify()->success('Successful Operation','Products Added Successfully');
        return redirect()->back();
    }
    public function RemoveSpecialChar($str) {
  
        // Using str_replace() function 
        // to replace the word 
        $res = str_replace( array( '\'', '"',
        ',' , ';', '<', '>','file',':','{','}','[',']' ), ' ', $str);
    
        // Returning the result 
        return $res;
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
        $product = Products::where('id', $id)->first();
        $points = points::where('product_id', $product->id)->get();
        $Imageproducts = Imageproducts::where('product_id', $product->id)->get();
        $page_title = 'Edit Products';
        return view('admin.products.edit', compact(['product','page_title','points','Imageproducts']));
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
        // return $request;
        $request->validate([
            'name'=>"required|min:3|max:190",
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'points'=>'required',
            'description'=>'required',
            'small_description'=>'required',
        ]);
        //points

        $Product_id = Products::find($id)->update([
            'products_name'=>$request->name,
            'category_id'=>$request->category_id,
            'subCategory_id'=>$request->subcategory_id,
            'small_description'=>$request->small_description,
            'description'=>$request->description,
            
        ]);

        //points
        // return $request->points;
        if(!empty($request->points))
        {
            points::where('product_id',$id)->delete();
                
        }
        foreach ($request->points as $arr)
        {
            if(!empty($arr))
            {
                points::where('product_id',$id)->create([
                    'name_points'=>$arr,
                    'product_id'=>$id,
                ]);
            }
        }
        
        notify()->success('Successful Operation','Products Updated Successfully');
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
        Products::find($id)->delete();
        notify()->success('Successful Operation','Operation Deleted Successfully');
        return redirect()->back();
    }
    public function multiple(Request $request)
    {
        // return $request;
        if(is_array(request('item')))
        {
            Products::destroy(request('item'));
        }else
        {
            Products::find(request('item'))->delete();
        }
        notify()->success('Successful Operation','Operation Deleted Successfully');
        return redirect()->back();
    }
}


