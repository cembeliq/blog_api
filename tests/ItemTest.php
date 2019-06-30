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
                    'checklist_id',
                    'description',
                    'created_at',
                    'updated_at',
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
        $this->get("items/3", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'id',
                    'description',
                    'is_completed',
                    'completed_at',
                    'due',
                    'urgency',
                    'assignee_id',
                    'task_id',
                    'checklist_id',
                    'created_at',
                    'updated_at',
                ]
            ]    
        );
        
    }
    /**
     * /items [POST]
     */
    public function testShouldCreateItem(){
        $parameters = [
            'description' => 'Infinix',
            'is_completed' => 'ok', 
            'completed_at' => '1', 
            'due' => '1', 
            'urgency' => '1', 
            'updated_by' => 'test',
            'assignee_id' => '1', 
            'task_id' => 1,
            'checklist_id' => 1,
        ];
        $this->post("items", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'id',
                    'description',
                    'checklist_id',
                ]
            ]    
        );
        
    }
    
    /**
     * /items/id [PUT]
     */
    public function testShouldUpdateItem(){
        $parameters = [
            'description' => 'Champagne Gold',
            'checklist_id' => 1,
        ];
        $this->put("items/4", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'id',
                    'description',
                    'checklist_id',
                ]
            ]    
        );
    }
    /**
     * /items/id [DELETE]
     */
    public function testShouldDeleteItem(){
        
        $this->delete("items/4", [], []);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}