<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\sub_cate\add;
use App\Models\Image;
use App\Models\Main_category;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class sub_categories extends Controller
{
    public function index(){
        //select all main categories
        $sub_categories = Sub_category::where('parent', 0)->get();
        return view('admins.sub_categories.index')->with('sub_categories', $sub_categories);
    }

    public function createView(){
        $main_categories = Main_category::where('parent', 0)->get();

        return view('admins.sub_categories.create')->with('main_categories', $main_categories);
    }

    public function create(add $request){
        try{
            DB::beginTransaction();
                //get cate status
                ($request->status == 1)? $active = 1: $active = 0;

                $parent_sub_category = Sub_category::create([
                    'name'              => $request->sub_cate['en']['name'],
                    'status'            => $active,
                    'main_cate_id'      => $request->main_category,     
                    'parent'            => 0,
                ]);

                foreach($request->sub_cate as $key=>$cate){
                    Sub_category::create([
                        'name'              => $cate['name'],
                        'status'            => $active,
                        'locale'            => $key,
                        'parent'            => $parent_sub_category->id,
                        'main_cate_id'      => $request->main_category,     
                    ]);
                }

                //uppoad cate image
                $path = $this->upload_image($request->file('image'), 'uploads/sub_categories', 480, 594);
                Image::create([
                    'imageable_id'  => $parent_sub_category->id,
                    'imageable_type'=> 'App\Models\Sub_category',
                    'image'         => $path,
                ]);

            DB::commit();
            return redirect('admins/sub_categories')->with('success', 'add main category success');
        } catch(\Exception $ex){
            //if there are error
            return redirect('admins/sub_categories')->with('error', 'add category faild');
        }
    }

    public function delete($cate_id){
        try{
            $sub_category = Sub_category::find($cate_id);

            //delete image
            if(file_exists(base_path('public/uploads/sub_categories/') . $sub_category->image->image)){
                unlink(base_path('public/uploads/sub_categories/') . $sub_category->image->image);
            }
            $sub_category->image->delete();

            //delete main category
            foreach($sub_category->Sub_category_childs as $Sub_category_child){
                $Sub_category_child->delete();
            }
            $sub_category->delete();

            return redirect('admins/sub_categories')->with('success', 'delete success');
        } catch(\Exception $ex){
            return redirect('admins/sub_categories')->with('error', 'delete faild');
        }
    }

    public function editView($cate_id){
        $sub_category = Sub_category::find($cate_id);
        $main_categories = Main_category::where('parent', 0)->get();

        //if category not found
        if($sub_category == null)
            return view('admins.main_categories.index');

        return view('admins.sub_categories.edit')->with([
            'sub_category'         => $sub_category,
            'sub_category_childs'  => $sub_category->sub_category_childs,
            'main_categories'      => $main_categories,
        ]);    
    }

    public function edit($id, add $request){
        try{
            $sub_category = Sub_category::find($id);
            //if admin change categories image
            if($request->hasFile('image')){
                //delete old image
                if(file_exists(base_path('public/uploads/sub_categories/') . $sub_category->image->image)){
                    unlink(base_path('public/uploads/sub_categories/') . $sub_category->image->image);
                }
                $sub_category->image->delete();
                
                //uppoad new image
                $path = $this->upload_image($request->file('image'), 'uploads/sub_categories', 480, 594);
                Image::create([
                    'imageable_id'  => $sub_category->id,
                    'imageable_type'=> 'App\Models\Sub_category',
                    'image'         => $path,
                ]);
            }

            //check active
            ($request->status == 1)?$active = 1:$active = 0;

            //change parent
            $sub_category->name         = $request->sub_cate['en']['name'];
            $sub_category->status       = $active;
            $sub_category->main_cate_id = $request->main_category;
            $sub_category->save();

            //change main cate in all lang
            foreach($sub_category->Sub_category_childs as $sub_category_child){
                $sub_category_child->name           = $request->sub_cate[$sub_category_child->locale]['name'];
                $sub_category_child->status         = $active;
                $sub_category_child->main_cate_id   = $request->main_category;
                $sub_category_child->save();
            }

            return redirect('admins/sub_categories')->with('success', 'add sub category success');
        } catch(\Exception $ex){
            return redirect('admins/sub_categories')->with('error', 'edit category faild');
        }
    }
}
