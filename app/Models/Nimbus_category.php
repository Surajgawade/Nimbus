<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nimbus_category extends Model
{
    protected $fillable=['category_name','slug','status','created_by','created_on','modified_by','modified_on','cancel_by','cancel_on'];
   
    public static function get_all_category_datatable($where,$columns)
    {
        $query = DB::table('nimbus_categories')
        ->select(DB::raw(
            "nimbus_categories.*"
        ));
        if(isset($where['filter_by_status']) &&  $where['filter_by_status'] != '')	
		{ 
            $filter_by_status  =  $where['filter_by_status'];
	          
			$query->where('nimbus_categories.status', $filter_by_status);
			
        }
       
		if(is_array($where) && $where['search']['value'] != "" )
		{
			$query->where('nimbus_categories.category_name','LIKE', '%'.$where['search']['value'].'%');

		}

		if(!empty($where['order']))
		{
			$column_name_index = $where['order'][0]['column'];
			$order_by = $where['order'][0]['dir']; 
            
            
			$query->orderBy($where['columns'][$column_name_index]['data'],$order_by);
		}
		else
		{
		
		    $query->orderBy('nimbus_categories'.'id','DESC');
		}
		
		$query->offset($where['start']);
		
        $query->limit($where['length']);
	
		$result = $query->get();
		
		return $result->toArray();
       
    }

    public static function get_all_category_datatable_count($where,$columns)
    {
        $query = DB::table('nimbus_categories')
        ->select(DB::raw(
            "nimbus_categories.*"
        ));
        if(isset($where['filter_by_status']) &&  $where['filter_by_status'] != '')	
		{ 
            $filter_by_status  =  $where['filter_by_status'];
	          
            $query->where('nimbus_categories.status', $filter_by_status);
 
        }
        if(isset($where['filter_by_project']) &&  $where['filter_by_project'] != '')	
		{  
		    $filter_by_project  =  $where['filter_by_project'];
	          
			$query->where('nimbus_categories.category_name', $filter_by_project);

		}

		if(is_array($where) && $where['search']['value'] != "" )
		{
			$query->where('nimbus_categories.category_name','LIKE', '%'.$where['search']['value'].'%');

		}

		if(!empty($where['order']))
		{
			$column_name_index = $where['order'][0]['column'];
			$order_by = $where['order'][0]['dir']; 
            
            
			$query->orderBy($where['columns'][$column_name_index]['data'],$order_by);
		}
		else
		{
		
		    $query->orderBy('nimbus_categories.id','DESC');
		}
	
		$result = $query->get();

		return $result->toArray();
        
    
    }

    public static function get_category_details($arrwhere)
    {

        $query = DB::table('nimbus_categories')
        ->select(DB::raw(
            "nimbus_categories.*"
		));
       
        $query->where($arrwhere); 

		$result = $query->get()->first();
       
		return $result;
    
    }

	public static function countActiveProject(){
        $data=Project::where('status','1')->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
