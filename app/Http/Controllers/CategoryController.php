<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategory();
        return view("manager.category.index", compact("categories"));
    }

    public function show($id, $slug){
        $category = $this->categoryService->getById($id);
        return view("manager.category.detail", compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $this->categoryService->createCategory($request->all());
        if(!$store){
            $noti = [
                'message' => 'Không thể lưu dữ liệu',
                'type' => 'error'
            ];
        } else {
            $noti = [
                'message' => 'Lưu dữ liệu thành công',
                'type' => 'success'
            ];
        }
        return redirect()->back()->with($noti);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $edit = $this->categoryService->updateCategory($id, $request->all());
        if(!$edit){
            $noti = [
                'message' => 'Không thể lưu dữ liệu',
                'type' => 'error'
            ];
        } else {
            $noti = [
                'message' => 'Cập nhật dữ liệu thành công',
                'type' => 'success'
            ];
        }
        return redirect()->back()->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->categoryService->destroyCategory($id);
        if(!$destroy){
            $noti = [
                'message' => 'Không thể lưu dữ liệu',
                'type' => 'error'
            ];
        } else {
            $noti = [
                'message' => 'Xóa dữ liệu thành công',
                'type' => 'success'
            ];
        }
        return redirect()->back()->with($noti);
    }
}