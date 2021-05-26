<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Component\Recursive;
use App\Http\Requests\CategoryAddRequest;
use App\Models\Category;
use App\Traits\DeleteModelTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public $category;
    use DeleteModelTraits;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('backEnd.admin.category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('backEnd.admin.category.add', compact('htmlOption'));
    }

    public function store(CategoryAddRequest $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('backEnd.admin.category.edit', compact('category','htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id) {
        return $this->deleteModelTraits($id, $this->category);
    }
}
