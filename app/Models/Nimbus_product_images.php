<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nimbus_product_images extends Model
{
    protected $fillable=['product_id','gallery','thumbnail_image','status','created_by','created_on','modified_by','modified_on','cancel_by','cancel_on','created_at','updated_at'];

}
