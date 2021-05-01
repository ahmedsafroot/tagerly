<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App\Model;
class ProductController extends Controller
{
    use GeneralTrait;
    //
    
    public function search(Request $request)
    {
        try
        {
            $collection = collect([
                ['product_name' => 'desk', 'price' => 200,"num_selling"=>30,"num_votes"=>8,"vendor_name"=>"ahmed refaat"],
                ['product_name' => 'chair', 'price' => 100,"num_selling"=>100,"num_votes"=>17,"vendor_name"=>"mohamed ali"],
                ['product_name' => 'bookcase', 'price' => 150,"num_selling"=>42,"num_votes"=>12,"vendor_name"=>"ahmed refaat"],
                ['product_name' => 'door', 'price' => 100,"num_selling"=>78,"num_votes"=>43,"vendor_name"=>"samir fawzy"],
            ]);
           
            if(isset($request->product_name))
            {
                $collection=$collection->where('product_name', $request->product_name );
            }
            if(isset($request->vendor_name))
            {
                $collection=$collection->where('vendor_name',$request->vendor_name);
            }
            if(isset($request->min_price) && isset($request->max_price))
            {
                $collection=$collection->whereBetween('price', [$request->min_price, $request->max_price]);
            }
            if(isset($request->sortBy))
            {
                $collection=$collection->sortBy($request->sortBy);
            }
            
            
            $products=$collection->values()->all();
            
            return $this->returnData("products",$products,"");
        }
        catch (\Exception $e) {

            return $this->returnErrorMessage(200,$e->getMessage());

        }
    }
}
