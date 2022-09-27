<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SystemProductGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // hanya user yang sudah login dan role admin yang bole mengakses
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        // $product-groups = ProductGroup::get();
        $productGroups = ProductGroup::paginate(5);

        $filterKeyword = $request->get('name');

        if ($filterKeyword) {
            $productGroups = ProductGroup::where("title", "LIKE", "%$filterKeyword%")->orderBy('title')->paginate(5);
        }


        return view('system.product-groups.index', ['productGroups' => $productGroups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.product-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:product-groups',
            'parent_id' => 'exists:product-groups,id'
        ])->validate();

        // print_r($request->all());
        // ProductGroup::create($request->all());

        $new_category = new ProductGroup;
        $new_category->title = $request->get('title');
        $new_category->parent_id = $request->get('product-groups');
        $new_category->save();
        return redirect()->route('system.product-groups.index')->with('status', 'Ürün grubu başarıyla kaydedildi.');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductGroup::findOrFail($id);
        return view('system.product-groups.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = ProductGroup::findOrFail($id);
        Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:product-groups,title,' . $category->id,
            // 'parent_id' => 'exists:product-groups,id'
        ])->validate();

        // $category->parent_id = $request->get('product-groups');
        // echo $category;
        // die();

        // jika ada perubhan pada selectbox
        if ($request->get('product-groups')) {
            $category->parent_id = $request->get('product-groups');
            $category->save();
        }

        $category->update($request->all());


        return redirect()->route('system.product-groups.index')->with('status', 'Ürün grubu başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = ProductGroup::findOrFail($id);
        $category->delete();
        return redirect()->route('system.product-groups.index')->with('status', 'Ürün grubu başarıyla silindi.');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');
        $productGroups = ProductGroup::where("title", "LIKE", "%$keyword%")->get();
        return $productGroups;
    }
}
