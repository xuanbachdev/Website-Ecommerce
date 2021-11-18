<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Components\Recursive;
use App\Traits\StorageImageTrait;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $category, $product, $productImage, $tag, $productTag;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag){
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }


    // Front-end
    public function details_product($product_slug, Request $request){
        $categorysLimit = Category::where('parent_id', 0)->get();
//        $products = Product::where('$product_slug', $product_slug);
        $categorys = Category::where('parent_id',0)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();

        $details_product = DB::table('products')
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->where('products.product_slug',$product_slug)->get();

            foreach ($details_product as $key =>  $value){
                $category_id = $value->category_id;
            }

        $related_product = DB::table('products')
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->where('categories.category_id', $category_id)->whereNotIn('products.product_slug',[$product_slug])->orderby(DB::raw('RAND()'))->paginate(3);


        return view('front-end.product.show_details', compact( 'categorysLimit', 'categorys', 'productsRecommend'))
            ->with('product_details', $details_product)
            ->with('relate', $related_product);
    }


    // Back-end
    public function index(){
        $products = $this->product->paginate(5);
        return view('back-end.admin.product.index', compact('products'));
    }

    public function search(Request $request)
    {
        $products = $this->product->getProductSearch($request);
        return view('back-end.admin.product.index', compact('products'));

    }

    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('back-end.admin.product.add', compact('htmlOption'));
    }


    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request){
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'content' => $request->contents,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'product_slug' => Str::slug($request->product_name),
                'created_at' => now(),
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);

            // Insert data to product_images
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']

                    ]);
                }
            }

            // Insert tags for product
            $tagId = [];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagId[] = $tagInstance->id;
                }
                $product->tags()->attach($tagId);
                DB::commit();
                return redirect()->route('product.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());

        }

    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('back-end.admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'product_name' => $request->product_name,
                'price' => $request->price,
                'content' => $request->contents,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id,
                'product_slug' => Str::slug($request->product_name),
                'updated_at' => now(),
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            // Insert data to product_images
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']

                    ]);
                }
            }

            // Insert tags for product
            $tagIds = [];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }

            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }

    }

    public function delete($id) {
        return $this->deleteModelTrait($id, $this->product);
    }


}
