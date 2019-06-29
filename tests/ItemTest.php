<?php
class ItemTest extends TestCase
{
    /**
     * /items [GET]
     */
    public function testShouldReturnAllItems(){
        $this->get("items", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ],
            'meta' => [
                '*' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links',
                ]
            ]
        ]);
        
    }
    /**
     * /items/id [GET]
     */
    public function testShouldReturnItem(){
        $this->get("items/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }
    /**
     * /items [POST]
     */
    public function testShouldCreateItem(){
        $parameters = [
            'product_name' => 'Infinix',
            'product_description' => 'NOTE 4 5.7-Inch IPS LCD (3GB, 32GB ROM) Android 7.0 ',
        ];
        $this->post("items", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }
    
    /**
     * /items/id [PUT]
     */
    public function testShouldUpdateItem(){
        $parameters = [
            'product_name' => 'Infinix Hot Note',
            'product_description' => 'Champagne Gold, 13M AF + 8M FF 4G Smartphone',
        ];
        $this->put("items/4", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
    }
    /**
     * /items/id [DELETE]
     */
    public function testShouldDeleteItem(){
        
        $this->delete("items/5", [], []);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}