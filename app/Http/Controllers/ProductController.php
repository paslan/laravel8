<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use Illuminate\Http\Request;

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
        $teste = 123;
        $teste2 = 321;
        $teste3 = [];
        $teste4 = 5;
        $products=['TV','Geladeira', 'Fogão', 'Sofá'];



        // return view('teste',[
        //     'teste'=>$teste
        // ]);
        // return view('teste',compact('teste'));

        return view('admin.pages.products.index', compact('teste','teste2','teste3','teste4', 'products'));
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
        dd('ok');
        // $request->validate([
        //     'name' => 'required|min:5|max:30',
        //     'description' => 'nullable|min:5|max:150',
        //     'photo' => 'required|image',
        // ]);
        // dd('OK');
        //dd($request->all());
        //dd($request->only('name', 'description'));
        //dd($request->name);
        //dd($request->has('name'));
        //dd($request->input('teste', 'default'));
        //dd($request->except('_token', 'name'));
        //dd($request->file('photo')->isValid());
        if($request->file('photo')->isValid()){
            //dd($request->photo->extension());
            //dd($request->photo->store('products'));
            $namefile = $request->name . '.' . $request->photo->extension();
            dd($request->photo->storeAs('products', $namefile));
        }

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
        return view('admin.pages.products.edit', compact('id'));

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
        dd("Editando o Produto $id");
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
    }
}
