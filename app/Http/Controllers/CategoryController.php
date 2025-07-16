<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nimbus_category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helper;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Nimbus_category::where('status',1)->get();
        // return $category;
       // return view('backend.product.index')->with('products',$products);
        return view('admin.category.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.category.create');
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
            'category_name'=>'required',

        );
        $messages = array(
            'category_name.required'    => 'Please Enter Categoy Name',

        );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->passes())
        {

            $frm_details = $request->all();

            $category_slug = str_replace(" ","_",$frm_details['category_name']);

            $category_slug  = str_replace("&","_", $category_slug );

            $category_slug  = str_replace("/","_", $category_slug);


            $field_array = array('category_name' => $frm_details['category_name'],
                        'slug' => $category_slug,
                        'status' => STATUS_ACTIVE,
                        'created_by' => auth()->user()->id,
                        'created_on' => date(DB_DATE_FORMAT),

                    );

                $result=Nimbus_category::create($field_array);
                if ($result) {

                    $json_array['status'] = SUCCESS_CODE;

                    $json_array['message'] = 'Record Successfully Insert';

                    $json_array['redirect'] = ADMIN_SITE_URL.'category';

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

        $category_list = Nimbus_category::get_all_category_datatable($params, $columns);
        $totalRecords = count(Nimbus_category::get_all_category_datatable_count($params, $columns));

        $x = 0;

        foreach ($category_list as $category_lists) {

            $status = ($category_lists->status == 1) ? "Active" : "Inactive";

            $data_arry[$x]['id'] = $x + 1;
            $data_arry[$x]['created_on'] =  date('d-m-Y h:i:s', strtotime($category_lists->created_on));
            $data_arry[$x]['category_name'] = $category_lists->category_name;
            $data_arry[$x]['status'] = $status;


            $data_arry[$x]['encry_id'] = ADMIN_SITE_URL. "category/edit/" . $category_lists->id;


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

        $category=Nimbus_category::get_category_details(array('nimbus_categories.id'=>$id));

        return view('admin.category.edit')->with('category',$category);
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
            'category_name'=>'required'
        );
        $messages = array(
            'category_name.required'    => 'Please Enter Category Name'
        );

        $validator = Validator::make( $request->all(), $rules, $messages );

        if ( $validator->passes())
        {

            $frm_details = $request->all();

            $category_slug = str_replace(" ","_",$frm_details['category_name']);

            $category_slug  = str_replace("&","_", $category_slug );

            $category_slug  = str_replace("/","_", $category_slug);

            $field_array = array('category_name' => $frm_details['category_name'],
                        'slug' => $category_slug,
                        'modified_by' => auth()->user()->id,
                        'modified_on' => date(DB_DATE_FORMAT),

                    );

            $result=Nimbus_category::where("id", $frm_details['hidden_uid'])->update($field_array);
            if ($result) {

                $json_array['status'] = SUCCESS_CODE;

                $json_array['message'] = 'Record Successfully Update';

                $json_array['redirect'] = ADMIN_SITE_URL.'category';

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

    public function export(Request $request) {
       // $from = Carbon::parse($request->get('from'));
       // $to = Carbon::parse($request->get('to'));

       return Excel::download(new LeadExport, 'Lead.xlsx');

        //return Excel::download(new ReportsExport($from, $to), 'reports.xlsx');
    }

}
