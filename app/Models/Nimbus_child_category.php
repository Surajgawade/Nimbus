<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nimbus_child_category extends Model
{
    protected $fillable=['category_id','sub_category_id','child_category_name','slug','status','created_by','created_on','modified_by','modified_on','cancel_by','cancel_on'];
   
    public static function get_all_child_category_datatable($where,$columns)
    {
        $query = DB::table('nimbus_child_categories')
        ->select(DB::raw(
            "nimbus_child_categories.*,nimbus_categories.category_name,nimbus_sub_categories.sub_category_name"
        ))
		->join('nimbus_categories', 'nimbus_categories.id', '=', 'nimbus_child_categories.category_id','left')
		->join('nimbus_sub_categories', 'nimbus_sub_categories.id', '=', 'nimbus_child_categories.sub_category_id','left');
       
       
		if(is_array($where) && $where['search']['value'] != "" )
		{
			$query->where('nimbus_child_categories.child_category_name','LIKE', '%'.$where['search']['value'].'%');

		}

		if(!empty($where['order']))
		{
			$column_name_index = $where['order'][0]['column'];
			$order_by = $where['order'][0]['dir']; 
            
            
			$query->orderBy($where['columns'][$column_name_index]['data'],$order_by);
		}
		else
		{
		
		    $query->orderBy('nimbus_child_categories'.'id','DESC');
		}
		
		$query->offset($where['start']);
		
        $query->limit($where['length']);
	
		$result = $query->get();
		
		return $result->toArray();
       
    }

    public static function get_all_child_category_datatable_count($where,$columns)
    {
		$query = DB::table('nimbus_child_categories')
        ->select(DB::raw(
            "nimbus_child_categories.*,nimbus_categories.category_name,nimbus_sub_categories.sub_category_name"
        ))
		->join('nimbus_categories', 'nimbus_categories.id', '=', 'nimbus_child_categories.category_id','left')
		->join('nimbus_sub_categories', 'nimbus_sub_categories.id', '=', 'nimbus_child_categories.sub_category_id','left');
        
      

		if(is_array($where) && $where['search']['value'] != "" )
		{
			$query->where('nimbus_child_categories.child_category_name','LIKE', '%'.$where['search']['value'].'%');

		}

		if(!empty($where['order']))
		{
			$column_name_index = $where['order'][0]['column'];
			$order_by = $where['order'][0]['dir']; 
            
            
			$query->orderBy($where['columns'][$column_name_index]['data'],$order_by);
		}
		else
		{
		
		    $query->orderBy('nimbus_child_categories'.'id','DESC');
		}
	
		$result = $query->get();

		return $result->toArray();
        
    
    }

    public static function get_child_category_details($arrwhere)
    {

        $query = DB::table('nimbus_child_categories')
        ->select(DB::raw(
            "nimbus_child_categories.*"
		));
       
        $query->where($arrwhere); 

		$result = $query->get()->first();
       
		return $result;
    
    }

}
