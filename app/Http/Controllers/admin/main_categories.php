<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\main_cate\add;
use App\Models\Image;
use App\Models\Main_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class main_categories extends Controller
{
    public function index(){
        //select all main categories
        $main_categories = Main_category::where('parent', 0)->get();
        return view('admins.main_categories.index')->with('main_categories', $main_categories);
    }

    public function createView(){
        return view('admins.main_categories.create');
    }

    public function create(add $request){
        try{
            DB::beginTransaction();
                //get cate status
                ($request->status== 1)? $active = 1: $active = 0;

                $parent_main_category = Main_category::create([
                    'name'              => $request->main_cate['en']['name'],
                    'status'            => $active,
                    'parent'            => 0,
                ]);

                foreach($request->main_cate as $key=>$cate){
                    Main_category::create([
                        'name'              => $cate['name'],
                        'status'            => $active,
                        'locale'            => $key,
                        'parent'            => $parent_main_category->id,
                    ]);
                }

                //uppoad cate image
                $path = $this->upload_image($request->file('image'), 'uploads/main_categories', 480, 594);
                Image::create([
                    'imageable_id'  => $parent_main_category->id,
                    'imageable_type'=> 'App\Models\Main_category',
                    'image'         => $path,
                ]);

            DB::commit();
            return redirect('admins/main_categories')->with('success', 'add main category success');
        } catch(\Exception $ex){
            //if there are error
            return redirect('admins/main_categories')->with('error', 'add category faild');
        }
    }

    public function delete($cate_id){
        try{
            $main_category = Main_category::find($cate_id);

            //delete image
            if(file_exists(base_path('public/uploads/main_categories/') . $main_category->image->image)){
                unlink(base_path('public/uploads/main_categories/') . $main_category->image->image);
            }
            $main_category->image->delete();

            //delete main category
            foreach($main_category->Main_category_childs as $Main_category_child){
                $Main_category_child->delete();
            }
            $main_category->delete();

            return redirect('admins/main_categories')->with('success', 'delete success');
        } catch(\Exception $ex){
            return redirect('admins/main_categories')->with('error', 'delete faild');
        }

    }

    public function editView($cate_id){
        $main_category = Main_category::find($cate_id);

        //if category not found
        if($main_category == null)
            return view('admins.main_categories.index');

        return view('admins.main_categories.edit')->with([
            'main_category'         => $main_category,
            'Main_category_childs'  => $main_category->Main_category_childs,
        ]);    
    }

    public function edit($id, Request $request){
        try{
            $main_category = Main_category::find($id);
            //if admin change categories image
            if($request->hasFile('image')){
                //delete old image
                if(file_exists(base_path('public/uploads/main_categories/') . $main_category->image->image)){
                    unlink(base_path('public/uploads/main_categories/') . $main_category->image->image);
                }
                $main_category->image->delete();
                
                //uppoad new image
                $path = $this->upload_image($request->file('image'), 'uploads/main_categories', 480, 594);
                Image::create([
                    'imageable_id'  => $main_category->id,
                    'imageable_type'=> 'App\Models\Main_category',
                    'image'         => $path,
                ]);
            }

            //check active
            ($request->status == 1)?$active = 1:$active = 0;

            //change parent
            $main_category->name       = $request->main_cate['en']['name'];
            $main_category->status     = $active;
            $main_category->save();

            //change main cate in all lang
            foreach($main_category->Main_category_childs as $Main_category_child){
                $Main_category_child->name       = $request->main_cate[$Main_category_child->locale]['name'];
                $Main_category_child->status     = $active;
                $Main_category_child->save();
            }

            return redirect('admins/main_categories')->with('success', 'add main category success');
        } catch(\Exception $ex){
            return redirect('admins/main_categories')->with('error', 'edit category faild');
        }
    }
}
