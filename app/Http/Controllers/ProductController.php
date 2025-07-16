<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nimbus_category;
use App\Models\Nimbus_product;
use App\Models\Nimbus_sub_category;
use App\Models\Nimbus_child_category;
use App\Models\Nimbus_product_images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helper;
use Maatwebsite\Excel\Facades\Excel;
use Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Nimbus_product::where('status',1)->get();
        // return $category;
       // return view('backend.product.index')->with('products',$products);
        return view('admin.product.index')->with('product',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Nimbus_category::where('status',1)->get();


        return view('admin.product.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $json_array =  array();
        $rules = array(
            'product_name'=>'required',
            'price'=>'required',
            'category_name'=>'required'

        );
        $messages = array(
            'product_name.required' => 'Please Enter Product Name',
            'price'=> 'Please Enter Price',
            'category_name.required' => 'Please Enter Categoy Name'

        );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->passes())
        {


            $frm_details = $request->all();

            $product_slug = str_replace(" ","_",$frm_details['product_name']);

            $product_slug  = str_replace("&","_", $product_slug);

            $product_slug  = str_replace("/","_", $product_slug);

            $field_array = array('product_name' => $frm_details['product_name'],
                'category_id' => $frm_details['category_name'],
                'sub_category_id' => $frm_details['sub_category_name'],
                'child_category_id' => $frm_details['child_category_name'],
                'slug' => $product_slug,
                'price' => $frm_details['price'],
                'discount' => $frm_details['discount'],
                'weight' => $frm_details['weight'],
                'stock' => $frm_details['stock'],
                'introduction' => $frm_details['introduction'],
                'application' => $frm_details['applications'],
                'features' => $frm_details['features'],
                'specifications' => $frm_details['specifications'],
                'accessories' => $frm_details['accessories'],
                'related_products' => $frm_details['related_products'],
                'description' => $frm_details['description'],

                'status' => STATUS_ACTIVE,
                'created_by' =>  auth()->user()->id,
                'created_on' => date(DB_DATE_FORMAT)
            );


            $result=Nimbus_product::create($field_array);

            if($request->hasfile('product_pdf'))
            {
                $allowedfileExtension=['pdf'];

                $filename = $request->product_pdf->getClientOriginalName();

                $file_info  = pathinfo( $filename);

                $extension = $request->product_pdf->extension();

                $size =  $request->product_pdf->getSize();

                $check=in_array($extension,$allowedfileExtension);

                if($check)
                {
                    $new_file_name = preg_replace('/[[:space:]]+/', '_', $file_info['filename']);
                    $new_file_name = str_replace(',', '_', $new_file_name);
                    $new_file_name = str_replace('.','_',$new_file_name.'_'.DATE(UPLOAD_FILE_DATE_FORMAT));
                    $new_file_name = $new_file_name.'.'.strtolower($extension);
                    $filestore = $request->product_pdf->move(public_path('product_pdf'), $new_file_name);

                    $result_upload = Nimbus_product::where("id",$result->id)->update(array('product_pdf' => $new_file_name));
                }

            }

            if($request->hasfile('gallery'))
            {

                $allowedfileExtension=['jpeg','jpg','png'];
                $files = $request->file('gallery');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $file_info  = pathinfo( $filename);

                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getSize();

                    $check=in_array($extension,$allowedfileExtension);
                    //dd($check);
                    if($check)
                    {

                        $new_file_name = preg_replace('/[[:space:]]+/', '_', $file_info['filename']);
                        $new_file_name = str_replace(',', '_', $new_file_name);
                        $new_file_name = str_replace('.','_',$new_file_name.'_'.DATE(UPLOAD_FILE_DATE_FORMAT));


                        $new_file_name_image = $new_file_name.'.'.strtolower($extension);

                        $filestore = $file->move(public_path('products'), $new_file_name_image);

                        $thumbnailpath = public_path('products/thumbnail/');

                        copy(public_path('products/').$new_file_name_image, $thumbnailpath.$new_file_name_image);

                        $this->createThumbnail($thumbnailpath.$new_file_name_image, 320, 360);

                        $file_array_image = array(
                                'product_id' => $result->id,
                                'gallery' => $new_file_name_image,
                                'thumbnail_image' => $new_file_name_image,
                                'status' => STATUS_ACTIVE,
                                'created_by' => auth()->user()->id,
                                'created_on' => date(DB_DATE_FORMAT)
                            );

                        $result_upload_image = Nimbus_product_images::create( $file_array_image);

                    }
                }

            }

            if ($result) {

                $json_array['status'] = SUCCESS_CODE;

                $json_array['message'] = 'Record Successfully Insert';

                $json_array['redirect'] = ADMIN_SITE_URL.'product';

            } else {
                $json_array['status'] = ERROR_CODE;

                $json_array['message'] = 'Something went wrong,please try again';
            }

        }

        if ( $validator->fails() )
        {

            $json_array['status'] = ERROR_CODE;

            $json_array['message'] = $validator->errors();

        }

        echo json_encode($json_array);

        exit();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $params =  $data_arry = $columns = array();

        $params = $request->all();

        $columns = array('category_name', 'slug');

        $product_list = Nimbus_product::get_all_product_datatable($params, $columns);
        $totalRecords = count(Nimbus_product::get_all_product_datatable_count($params, $columns));

        $x = 0;

        foreach ($product_list as $product_lists) {

            $status = ($product_lists->status == 1) ? "Active" : "Inactive";

            $data_arry[$x]['id'] = $x + 1;
            $data_arry[$x]['created_on'] =  date('d-m-Y h:i:s', strtotime($product_lists->created_on));
            $data_arry[$x]['category_name'] = $product_lists->category_name;
            $data_arry[$x]['product_name'] = $product_lists->product_name;
            $data_arry[$x]['stock'] = $product_lists->stock;
            $data_arry[$x]['price'] = $product_lists->price;
            $data_arry[$x]['discount'] = $product_lists->discount;
            $data_arry[$x]['weight'] = $product_lists->weight;

            $data_arry[$x]['status'] = $status;
            $data_arry[$x]['encry_id'] = ADMIN_SITE_URL. "product/edit/" . $product_lists->id;

            $x++;
        }

        $json_data = array(
            "draw" => intval($params['draw']),
            "recordsTotal" => intval($totalRecords),
            "recordsFiltered" => intval($totalRecords),
            "data" => $data_arry,
        );

       echo json_encode($json_data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product=Nimbus_product::get_product_details(array('nimbus_products.id'=>$id));

        $category=Nimbus_category::where('status',1)->get();

        $product_images=Nimbus_product_images::where('status',1)->where('product_id',$product->id)->get();

        $sub_category=Nimbus_sub_category::where('status',1)->where('category_id',$product->category_id)->get();

        $child_category=Nimbus_child_category::where('status',1)->where('category_id',$product->category_id)->where('sub_category_id',$product->sub_category_id)->get();

        return view('admin.product.edit')->with('product',$product)->with('category',$category)->with('sub_category',$sub_category)->with('child_category',$child_category)->with('product_images',$product_images);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $json_array =  array();
        $rules = array(
            'product_name'=>'required',
            'price'=>'required',
            'category_name'=>'required'

        );
        $messages = array(
            'product_name.required' => 'Please Enter Product Name',
            'price'=> 'Please Enter Price',
            'category_name.required' => 'Please Enter Categoy Name'

        );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->passes())
        {


            $frm_details = $request->all();

            $product_slug = str_replace(" ","_",$frm_details['product_name']);

            $product_slug  = str_replace("&","_", $product_slug);

            $product_slug  = str_replace("/","_", $product_slug);

            $field_array = array('product_name' => $frm_details['product_name'],
                        'category_id' => $frm_details['category_name'],
                        'sub_category_id' => $frm_details['sub_category_name'],
                        'child_category_id' => $frm_details['child_category_name'],
                        'slug' => $product_slug,
                        'price' => $frm_details['price'],
                        'discount' => $frm_details['discount'],
                        'weight' => $frm_details['weight'],
                        'stock' => $frm_details['stock'],
                        'introduction' => $frm_details['introduction'],
                        'application' => $frm_details['applications'],
                        'features' => $frm_details['features'],
                        'specifications' => $frm_details['specifications'],
                        'accessories' => $frm_details['accessories'],
                        'related_products' => $frm_details['related_products'],
                        'description' => $frm_details['description'],
                        'status' => STATUS_ACTIVE,
                        'modified_by' => auth()->user()->id,
                        'modified_on' => date(DB_DATE_FORMAT),

                    );

            $result=Nimbus_product::where("id", $frm_details['hidden_uid'])->update($field_array);

            if($request->hasfile('product_pdf'))
            {
                $allowedfileExtension=['pdf'];

                $filename = $request->product_pdf->getClientOriginalName();

                $file_info  = pathinfo( $filename);

                $extension = $request->product_pdf->extension();

                $size =  $request->product_pdf->getSize();

                $check=in_array($extension,$allowedfileExtension);

                if($check)
                {
                    $new_file_name = preg_replace('/[[:space:]]+/', '_', $file_info['filename']);
                    $new_file_name = str_replace(',', '_', $new_file_name);
                    $new_file_name = str_replace('.','_',$new_file_name.'_'.DATE(UPLOAD_FILE_DATE_FORMAT));
                    $new_file_name = $new_file_name.'.'.strtolower($extension);
                    $filestore = $request->product_pdf->move(public_path('product_pdf'), $new_file_name);

                    $result_upload = Nimbus_product::where("id",$frm_details['hidden_uid'])->update(array('product_pdf' => $new_file_name));
                }

            }

            if($request->hasfile('gallery'))
            {

                $allowedfileExtension=['jpeg','jpg','png'];
                $files = $request->file('gallery');
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $file_info  = pathinfo( $filename);

                    $extension = $file->getClientOriginalExtension();
                    $size = $file->getSize();

                    $check=in_array($extension,$allowedfileExtension);
                    //dd($check);
                    if($check)
                    {

                        $new_file_name = preg_replace('/[[:space:]]+/', '_', $file_info['filename']);
                        $new_file_name = str_replace(',', '_', $new_file_name);
                        $new_file_name = str_replace('.','_',$new_file_name.'_'.DATE(UPLOAD_FILE_DATE_FORMAT));


                        $new_file_name_image = $new_file_name.'.'.strtolower($extension);

                        $filestore = $file->move(public_path('products'), $new_file_name_image);

                        $thumbnailpath = public_path('products/thumbnail/');

                        copy(public_path('products/').$new_file_name_image, $thumbnailpath.$new_file_name_image);

                        $this->createThumbnail($thumbnailpath.$new_file_name_image, 320, 360);

                        $file_array_image = array(
                                'product_id' => $frm_details['hidden_uid'],
                                'gallery' => $new_file_name_image,
                                'thumbnail_image' => $new_file_name_image,
                                'status' => STATUS_ACTIVE,
                                'created_by' => auth()->user()->id,
                                'created_on' => date(DB_DATE_FORMAT)
                            );

                        $result_upload_image = Nimbus_product_images::create( $file_array_image);

                    }
                }

            }

            if ($result) {

                $json_array['status'] = SUCCESS_CODE;

                $json_array['message'] = 'Record Successfully Update';

                $json_array['redirect'] = ADMIN_SITE_URL.'product';

            } else {
                $json_array['status'] = ERROR_CODE;

                $json_array['message'] = 'Something went wrong,please try again';
            }

        }

        if ( $validator->fails() )
        {

            $json_array['status'] = ERROR_CODE;

            $json_array['message'] = $validator->errors();

        }

        echo json_encode($json_array);

        exit();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }


    public function remove_uploaded_file_gallery($id){
        $json_array = array();
        if (!empty($id)) {

            $product_images=Nimbus_product_images::where('id',$id)->get()->first();

            $field_array = array('status' => 2,
            'cancel_by' => auth()->user()->id,
            'cancel_on' => date(DB_DATE_FORMAT));

            $result=Nimbus_product_images::where("id", $id)->update($field_array);

            if ($result) {
                $json_array['status'] = SUCCESS_CODE;

                $json_array['message'] = 'Attachment removed successfully, please refresh the page';
            } else {
                $json_array['status'] = ERROR_CODE;

                $json_array['message'] = 'Something went worong, please try again';
            }

        } else {

            $json_array['status'] = ERROR_CODE;

            $json_array['message'] = 'ID not found';
        }

        echo json_encode($json_array);

        exit();
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }


    public function upload(Request $request){

        $fileFormat = $request->file('file')->getClientOriginalExtension();
        $PhotoValidFormat = array('jpg', 'png', 'gif', 'jpeg', 'bmp');


        if (in_array(strtolower($fileFormat), $PhotoValidFormat) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

            $PhotoName = uniqid() . '.' . $request->file('file')->getClientOriginalExtension();

            $fileSize = number_format($_FILES['file']['size'] / 1048576, 2);//to mb

            if ($fileSize <= 50) {

                if ($request->file('file')->move(public_path('products/details'), $PhotoName)) {

                    return json_encode(array(

                        'location'=> PRODUCT.'/'.'details/'.$PhotoName

                    ));

                } else
                    $res = -1;

            } //bad format or size not allowed for php.ini
            else {
                if (isset($_FILES['file']['error']) && $_FILES['file']['error'] == 1)
                    $res = -1;
                else
                    $res = 0;
            }

            echo json_encode(array('res' => $res));
        }

    }


    public function export(Request $request) {
       // $from = Carbon::parse($request->get('from'));
       // $to = Carbon::parse($request->get('to'));

       return Excel::download(new LeadExport, 'Lead.xlsx');

        //return Excel::download(new ReportsExport($from, $to), 'reports.xlsx');
    }

}
