<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Public_view_page;
use DB;
use App\Public_page_view_details;
use Illuminate\Support\Facades\Input;
use App\Cover_image_tag;

class Public_view_pageController extends Controller
{
    

    public function create(Request $request)
    {
    	
    	$insert_info = new Public_view_page;
    	$insert_info->template_id = $request->template_id;
    	$insert_info->page_name = $request->page_title;
    	$insert_info->page_detail = $request->page_content;
    	$insert_info->save();
    	return redirect()->back();
    }

    public function edit(Request $request)
    {
    	$page_view = Public_view_page::find($request->input('id'));
    	return ($page_view);
    }

    public function update(Request $request)
    {
    	$id = $request->input('public_page_view_id');
     	if (isset($id)){
	          $array = DB::table('public_view_page')
	          ->where('id',$id)
	          ->update([
	           'page_name' => $request->publicpageview_title,
	           'page_detail' => $request->publicpageview_content,
	       ]);
   	 	}
   	 return redirect()->back();
	}

	public function delete($id)
	{
		
		$delete_page = Public_view_page::findOrFail( $id );

		$delete_page = $delete_page->delete();		
		return redirect()->back();

	}



	public function cover_image(Request $request, $id)
    {
    	//dd($id);
        $img_name = '';
        //dd(Input::hasFile('image'));
        if(Input::hasFile('image'))
        {
            $img_name = $this->UploadImage('image', Input::file('image'));


            if (Public_page_view_details::where('template_id', '=', $id)->count() > 0) {

            	// Public_page_view_details::where('template_id', '=', $id)->update($request->all());

            	Public_page_view_details::where('template_id', '=', $id)->update(array('image' => $img_name, 'template_id' => $id, 'cover_tag_id' => 1));
				}
			else
			{
					Public_page_view_details::insert([
		                'image' => $img_name,
		                'template_id' => $id,
		                'cover_tag_id' => 1,
            		]);
			}


            $path = asset('/public/storage/public_view_covers').'/'.$img_name;  
            // dd($path);
          //  return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]); 
        }
        //dd(123);
        return redirect()->back();      
    }
    public function UploadImage($type, $file){
        if( $type == 'image')
        {
            $path = base_path() . '/public/storage/public_view_covers';
        }

        $filename = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
        $file->move( $path , $filename);
        return $filename;
    }

    public function insert_tags(Request $request)
    {
    	// return $request->input('id');

    	$insert_tags = new Cover_image_tag();
    	$insert_tags->template_id = $request->input('id');
    	$insert_tags->tag_name = $request->input('value');
    	$insert_tags->save();
    	if ($insert_tags->save()){
           return \Response()->Json([ 'status' => 200,'msg'=>'You Have Successfully Added The Section']);
       }else{
           return \Response()->Json([ 'status' => 202, 'msg'=>'Something Went Wrong, Please Try Again!']);
       }
    }



}