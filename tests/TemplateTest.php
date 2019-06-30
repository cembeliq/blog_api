<?php
class TemplateTest extends TestCase
{
    /**
     * /items [GET]
     */
    public function testShouldReturnAllItems(){
        $this->get("templates", []);
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
            'data' => [
                'attributes' => [
                    'name' => 'test template',
                    'checklist' => [
                        'description' => 'test checklist',
                        'due_interval' => 3,
                        'due_unit' => 'hour'
                    ],
                    'items' => [ 
                            '0' => [
                                        'description' => 'item test 1',
                                        'urgency' => 2,
                                        'due_interval' => 40,
                                        'due_unit' => 'minute'
                                    ]
                        
                    ]
                ]
            ]
        ];
        $this->post("checklists/templates", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'id',
                    'name',
                    'checklist',
                    'item',
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