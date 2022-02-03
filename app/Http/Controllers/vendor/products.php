<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\vendor\addProduct;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class products extends Controller
{
    public function itemsView(){
        $products = Product::where('vendor_id', '=', auth()->user()->id)->get();
        return view('vendors.products.productsShow', compact('products'));
    }

    public function addProductView(){
        return view('vendors.products.addView');
    }

    public function add(addProduct $Request){
        //get vendor from session(guard)
        $vendor = auth('vendor')->user();
        
        if($vendor->status == 1){
            //add product
            $product = Product::create([
                'name'                  => $Request->name,
                'describe'              => $Request->describe,
                'price'                 => $Request->price,
                'sub_categoriesId'      => $Request->sub_CategoriesId,
                'vendor_id'             => $vendor->id,
                'discound'              => $Request->discound,
                'quantity'              => $Request->quantity,
            ]);

            //image to product
            foreach($Request->file('images') as $image){
                $image_path = $this->upload_image($image, 'uploads/products', 480, 594);
                Image::create([
                    'imageable_id'   => $product['id'],
                    'imageable_type' => 'App\Models\Product',
                    'image'          => $image_path,
                ]);
            }
        } else {
            return redirect('vendors/products')->with('error', 'your acount not active' );
        }
        
        return redirect('vendors/products')->with('success', 'add item success' );
        
    }

    public function editeItem($id){
        $product = Product::find($id);
        
        //if product nout fuond
        if(empty($product)){
            return redirect('vendors/products');
        }

        return view('vendors.products.editeVeiw')->with('product', $product);
    }

    public function edite($id,addProduct $Request){
        $product       = Product::find($id);

        //if product nout found
        if(empty('product'))
            return redirect('vendors/products')->with('error', 'this product not found');
        
        //edit product
        $product->name                 = $Request->name;
        $product->sub_categoriesId     = $Request->sub_CategoriesId;
        $product->price                = $Request->price;
        $product->discound             = $Request->discound;
        $product->quantity             = $Request->quantity;
        $product->describe             = $Request->describe;
        $product->save();

        //change images
        if($Request->hasFile('images')){
            //delete old image
            foreach($product->images as $image){
                if(file_exists(base_path('public/uploads/products/' . $image->image))){
                    unlink(base_path('public/uploads/products/' . $image->image));
                }
                $image->delete();
            }

            //update new images
            foreach($Request->file('images') as $image){
                $image_path = $this->upload_image($image, 'uploads/products', 480, 594);
                Image::create([
                    'imageable_id'   => $product['id'],
                    'imageable_type' => 'App\Models\Product',
                    'image'          => $image_path,
                ]);
            }
        }

        return redirect('vendors/products')->with('success', 'edite item success');
    }
}
