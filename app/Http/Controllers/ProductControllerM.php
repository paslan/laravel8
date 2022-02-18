<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (){

        $products=['Product 01', 'Product 02', 'Product 03'];
        return $products;
    }

    public function show($id){

        return "Exibindo o Produto de id: {$id} ";

    }

    public function create (){
        return "Formulário de criação de produtos";
    }


    public function edit($id){

        return "Editando o Produto de id: {$id} ";

    }

    public function destroy($id){

        return "Excluindo o Produto de id: {$id}....... ";

    }

    public function store($id){

        return "Cadastrtando novo Produto....... ";

    }

    public function update($id){

        return "Atualizando o Produto de id: {$id} ";

    }


}
