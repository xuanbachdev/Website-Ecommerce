<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Components\Recursive;

class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }

    //Front-end
    public function index_frontend($slug, $categoryId)
    {
        $categorysLimit = Category::where('parent_id', 0)->take(10)->get();
        $products = Product::where('category_id', $categoryId)->paginate(12);
        $categorys = Category::where('parent_id',0)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        return view('front-end.product.category.list', compact('categorysLimit', 'products', 'categorys', 'productsRecommend'));
    }

    // Back-end
    public function index() {
        $categories = $this->category->latest()->paginate(5);
        return view('back-end.admin.category.index', compact('categories'));
    }

    public function create(){
        $htmlOption = $this->getCategory($parent_id = '');
        return view('back-end.admin.category.add', compact('htmlOption'));
    }

    public function store(Request $request) {
        $this->category->create([
            'category_name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'category_slug' => Str::slug($request->category_name)
        ]);

        return redirect()->route('categories.index');
    }

    public function getCategory($parent_id) {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }

    public function edit($category_id) {
        $category = $this->category->find($category_id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('back-end.admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($category_id, Request $request){
        $this->category->find($category_id)->update([
            'category_name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'category_slug' => Str::slug($request->category_name)
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id) {
        return $this->deleteModelTrait($id, $this->category);
    }

}
