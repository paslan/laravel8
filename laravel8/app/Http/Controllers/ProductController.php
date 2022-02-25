<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request=$request;

        // $this->middleware(['auth'])->only([
        //     'create',
        //     'store'
        // ]);

        // $this->middleware(['auth'])->except([
        //     'index',
        //     'show',
        //     'create',
        //     'store',
        //     'edit'
        // ]);


    }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {


         //$products = Product::all();
         //$products = Product::get();
         $products = Product::paginate();

         return view('admin.pages.products.index',[
             'products' => $products,
         ]);

         // return view('teste',[
         //     'teste'=>$teste
         // ]);
         // return view('teste',compact('teste'));

         //return view('admin.pages.products.index', compact('teste','teste2','teste3','teste4', 'products'));
     }



     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('admin.pages.products.create');
     }


     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(StoreUpdateProductRequest $request)
     {


         $data = $request->only('name', 'description', 'price');

   
         if ($request->hasFile('image') && $request->image->isValid()){
             $imagePath = $request->image->store('products');
             $data['image']=$imagePath;
         }


         Product::create($data);
         return redirect()->route('products.index');


         //  $request->validate([
         //      'name' => 'required|min:5|max:30',
         //      'description' => 'required|min:5|max:150',
         //      'price' => 'required',
         //      'photo' => 'required|image',
         //  ]);
         // dd('OK');
         //dd($request->all());
         //dd($request->only('name', 'description'));
         //dd($request->name);
         //dd($request->has('name'));
         //dd($request->input('teste', 'default'));
         //dd($request->except('_token', 'name'));
         //dd($request->file('photo')->isValid());
         // if($request->file('photo')->isValid()){
         //     //dd($request->photo->extension());
         //     //dd($request->photo->store('products'));
         //     $namefile = $request->name . '.' . $request->photo->extension();
         //     dd($request->photo->storeAs('products', $namefile));
         // }

     }


     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //$product = Product::where('id', $id)->first();

         $product = Product::find($id);

         if (!$product){
             return redirect()->back();
         }

         return view('admin.pages.products.show', [
             'product' => $product,
         ]);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {

         $product = Product::find($id);

         if (!$product){
             return redirect()->back();
         }

         return view('admin.pages.products.edit', [
             'product' => $product,
         ]);

     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\StoreUpdateProductRequest  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(StoreUpdateProductRequest $request, $id)
     {
         $product = Product::find($id);

         if (!$product){
             return redirect()->back();
         }

         $data = $request->all();

         if ($request->hasFile('image') && $request->image->isValid()){

             if($product->image && Storage::exists($product->image)){
                 Storage::delete($product->image);

             }
             $imagePath = $request->image->store('products');
             $data['image']=$imagePath;
         }

         $product->update($data);
         return redirect()->route('products.index');

     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $product = Product::find($id);

         if (!$product){
             return redirect()->back();
         }

         if($product->image && Storage::exists($product->image)){
             Storage::delete($product->image);
         }

         $product->delete();
         return redirect()->route('products.index');
     }

     public function search(Request $request)
     {
         $filter = $request->except('_token');
         $products = Product::search($request->filter);

         return view('admin.pages.products.index',[
             'products' => $products,
             'filters' => $filter,
         ]);

     }

     public function zoom($id)
     {
         dd('Zoom....');
        $product = Product::find($id);

        if (!$product){
            return redirect()->back();
        }

        return view('admin.pages.products.zoom', [
            'product' => $product,
        ]);
    }


}
