<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('category.list', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $categoryCreate = $this->category->create([
            'name' =>  $params['name'],
            'display_name' => $params['display_name']
        ]);
        if($categoryCreate) {
            return redirect()->route('category.list');
        } else {
            return "Error";
        }
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();

        $name = $params['name'];
        $display_name = $params['display_name'];

        $category = $this->category->find($id)->update([
            'name' =>  $params['name'],
            'display_name' => $params['display_name']
        ]);
        if($category) {
            return redirect()->route('category.list');
        } else {
            return "Error";
        }
    }

    public function delete($id)
    {
        $category = $this->category->find($id);
        if($category->delete()) {
            return redirect()->route('category.list');
        } else {
            return "Error";
        }
    }


}
