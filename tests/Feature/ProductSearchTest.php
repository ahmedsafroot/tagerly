<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ProductSearchTest extends TestCase
{
    /**
     * A success search By Product Name.
     *
     * @return void
     */
    public function testsearchByProductName()
    {
        $this->json('post', 'api/product/search?username=tagerly_task&password=B3Nn6RxS6Qx&product_name=door', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["products"=>
                        [ 
                            ['product_name' => 'door', 'price' => 100,"num_selling"=>78,"num_votes"=>43,"vendor_name"=>"samir fawzy"]
                            
                        ]
                    ]
        ]);
    }

    /**
     * A success search By Vendor Name.
     *
     * @return void
    */
    public function testsearchByVendorName()
    {
        $this->json('post', 'api/product/search?username=tagerly_task&password=B3Nn6RxS6Qx&vendor_name=ahmed refaat', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["products"=>
                        [ 
                            ['product_name' => 'desk', 'price' => 200,"num_selling"=>30,"num_votes"=>8,"vendor_name"=>"ahmed refaat"],
                            ['product_name' => 'bookcase', 'price' => 150,"num_selling"=>42,"num_votes"=>12,"vendor_name"=>"ahmed refaat"],
                            
                        ]
                    ]
        ]);
    }

    /**
     * A success search By price range.
     *
     * @return void
    */
    public function testsearchByPriceRange()
    {
        $this->json('post', 'api/product/search?username=tagerly_task&password=B3Nn6RxS6Qx&min_price=180&max_price=200', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["products"=>
                        [ 
                            ['product_name' => 'desk', 'price' => 200,"num_selling"=>30,"num_votes"=>8,"vendor_name"=>"ahmed refaat"],
                            
                        ]
                    ]
        ]);
    }

    /**
     * A success search By product name,vendor name and price range.
     *
     * @return void
    */
    public function testsearch()
    {
        $this->json('post', 'api/product/search?username=tagerly_task&password=B3Nn6RxS6Qx&product_name=bookcase&vendor_name=ahmed refaat&min_price=0&max_price=200', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["products"=>
                        [ 
                            ['product_name' => 'bookcase', 'price' => 150,"num_selling"=>42,"num_votes"=>12,"vendor_name"=>"ahmed refaat"],
                            
                        ]
                    ]
        ]);
    }

    /**
     * A success sort.
     *
     * @return void
    */
    public function testSort()
    {
        $this->json('post', 'api/product/search?username=tagerly_task&password=B3Nn6RxS6Qx&vendor_name=ahmed refaat&sortBy=price', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status"=> true,
                "msg"=>"",
                "data"=>
                    ["products"=>
                        [ 
                            ['product_name' => 'bookcase', 'price' => 150,"num_selling"=>42,"num_votes"=>12,"vendor_name"=>"ahmed refaat"],
                            ['product_name' => 'desk', 'price' => 200,"num_selling"=>30,"num_votes"=>8,"vendor_name"=>"ahmed refaat"],
                            
                        ]
                    ]
        ]);
    }

    /**
     * A Fail Permission.
     *
     * @return void
    */
    public function testFail()
    {
        $this->json('post', 'api/product/search?username=tagerly_task&password=123456&vendor_name=ahmed refaat&sortBy=price', ['Accept' => 'application/json'])
            ->assertStatus(403)
            ->assertJson([
                "status"=> false,
                "msg"=>"you don't have permission for this api",
                
           ]);
    }

    
}
