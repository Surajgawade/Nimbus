<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Nimbus_product;
use App\Models\Nimbus_product_images;
use App\Models\Nimbus_category;
use App\Models\Nimbus_sub_category;
use App\Models\Nimbus_child_category;

class FrontendController extends Controller
{
   
    public function index(Request $request){
       
        return view('frontend.index');
    }

    public function home(){
       
      /*  $featured=Product::where('status','active')->where('is_featured',1)->orderBy('price','DESC')->limit(2)->get();
        $posts=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $banners=Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        // return $banner;
        $products=Product::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
        // return $category;*/
        return view('frontend.index');

      /*  return view('frontend.index')
                ->with('featured',$featured)
                ->with('posts',$posts)
                ->with('banners',$banners)
                ->with('product_lists',$products)
                ->with('category_lists',$category);*/
    }   

    public function aboutUs(){
        return view('frontend.about-us');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function productDetail($slug){
        $product_detail= Nimbus_product::getProductBySlug($slug);
        // dd($product_detail);
        return view('frontend.pages.product_detail')->with('product_detail',$product_detail);
    }


    public function products(){
        
        $products=Nimbus_product::where('status',1)->get();

        return view('frontend.products')->with('products',$products);
    }

    public function ProductByCategory($category_name,$sub_category_name = NULL,$child_category_name = NULL){

        if($sub_category_name == NULL && $child_category_name == NULL)
        {
            $products_category=Nimbus_category::where('status',1)->where('slug', $category_name)->orderBy('id','ASC')->limit(1)->get()->first();

            $products=Nimbus_product::where('status',1)->where('category_id', $products_category->id)->get();

        }else if($sub_category_name != NULL && $child_category_name == NULL){

            $products_category=Nimbus_category::where('status',1)->where('slug', $category_name)->orderBy('id','ASC')->limit(1)->get()->first();
            
            $products_sub_category=Nimbus_sub_category::where('status',1)->where('slug', $sub_category_name)->orderBy('id','ASC')->limit(1)->get()->first();

            $products=Nimbus_product::where('status',1)->where('category_id', $products_category->id)->where('sub_category_id', $products_sub_category->id)->get();

        }else if($child_category_name != NULL && $sub_category_name == NULL){

            $products_category=Nimbus_category::where('status',1)->where('slug', $category_name)->orderBy('id','ASC')->limit(1)->get()->first();

            $Nimbus_child_category=Nimbus_child_category::where('status',1)->where('slug', $child_category_name)->orderBy('id','ASC')->limit(1)->get()->first();

            $products=Nimbus_product::where('status',1)->where('category_id', $products_category->id)->where('child_category_id', $Nimbus_child_category->id)->get();

        }else if($child_category_name != NULL && $sub_category_name != NULL){

            $products_category=Nimbus_category::where('status',1)->where('slug', $category_name)->orderBy('id','ASC')->limit(1)->get()->first();

            $products_sub_category=Nimbus_sub_category::where('status',1)->where('slug', $sub_category_name)->orderBy('id','ASC')->limit(1)->get()->first();

            $product_child_category=Nimbus_child_category::where('status',1)->where('slug', $child_category_name)->orderBy('id','ASC')->limit(1)->get()->first();

            $products=Nimbus_product::where('status',1)->where('category_id', $products_category->id)->where('sub_category_id', $products_sub_category->id)->where('child_category_id', $product_child_category->id)->get();
        }
       

        return view('frontend.products')->with('products',$products);
    }

    
    public function productdetails($product_name){


        $products_details=Nimbus_product::get_product_cat_details(array('nimbus_products.slug'=>$product_name));

        return view('frontend.product-details')->with('products_details',$products_details);

    }

    public function getsubcategory(Request $request){
        
        $frm_details = $request->all();
        $sub_category=Nimbus_sub_category::where('status',1)->where('category_id', $frm_details['category_name'])->get();

        $dropdowns = '';
        $dropdowns = '<option value="">--Select Sub Category--</option>';
        foreach ($sub_category as $key => $value) {
        
            $dropdowns .= '<option value="'.$value->id.'">'.ucwords($value->sub_category_name).'</option>';
        }

        echo $dropdowns; 
    }

    public function getchildcategory(Request $request){
        
        $frm_details = $request->all();
        $child_category=Nimbus_child_category::where('status',1)->where('category_id', $frm_details['category_name'])->where('sub_category_id', $frm_details['sub_category_name'])->get();


        $dropdowns = '';
        $dropdowns = '<option value="">--Select child Category--</option>';
        foreach ($child_category as $key => $value) {
        
            $dropdowns .= '<option value="'.$value->id.'">'.ucwords($value->child_category_name).'</option>';
        }

        echo $dropdowns; 
    }

    public function downloads(){
        
        return view('frontend.downloads');
       
    }
    public function ewaste(){
        
        return view('frontend.ewaste');
       
    }
    public function news(){
        
        return view('frontend.news');
       
    }
    public function careers(){
        
        return view('frontend.careers');
       
    }
    public function client(){
        
        return view('frontend.client');
       
    }
    public function principle(){
        
        return view('frontend.principle');
       
    }
   


    public function productGrids(){
        $products=Product::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids);
            // return $products;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(9);
        }
        // Sort by name , price, category

      
        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productLists(){
        $products=Product::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // dd($cat_ids);
            $products->whereIn('cat_id',$cat_ids)->paginate;
            // return $products;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(6);
        }
        // Sort by name , price, category

      
        return view('frontend.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
    }
    public function productFilter(Request $request){
            $data= $request->all();
            // return $data;
            $showURL="";
            if(!empty($data['show'])){
                $showURL .='&show='.$data['show'];
            }

            $sortByURL='';
            if(!empty($data['sortBy'])){
                $sortByURL .='&sortBy='.$data['sortBy'];
            }

            $catURL="";
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }

            $brandURL="";
            if(!empty($data['brand'])){
                foreach($data['brand'] as $brand){
                    if(empty($brandURL)){
                        $brandURL .='&brand='.$brand;
                    }
                    else{
                        $brandURL .=','.$brand;
                    }
                }
            }
            // return $brandURL;

            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('e-shop.loc/product-grids')){
                return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
            else{
                return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
    }
    public function productSearch(Request $request){
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $products=Product::orwhere('title','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');
        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }

    public function productBrand(Request $request){
        $products=Brand::getProductByBrand($request->slug);
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }
    public function productCat(Request $request){
        $products=Category::getProductByCat($request->slug);
        // return $request->slug;
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
        }

    }
    public function productSubCat(Request $request){
        $products=Category::getProductBySubCat($request->sub_slug);
        // return $products;
        $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(request()->is('e-shop.loc/product-grids')){
            return view('frontend.pages.product-grids')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }
        else{
            return view('frontend.pages.product-lists')->with('products',$products->sub_products)->with('recent_products',$recent_products);
        }

    }


   
  
    // Login
    public function login(){
        return view('frontend.pages.login');
    }
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }


    
}
