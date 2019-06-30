<?php
namespace App\Transformers;
use App\Items;
use League\Fractal;
class ItemTransformer extends Fractal\TransformerAbstract
{
	public function transform(Items $item)
	{
	    return [
	        'id'      => (int) $item->id,
	        'checklist_id'   => $item->checklist_id,
	        'description'    =>  $item->description,
	        'is_completed'    =>  $item->is_completed,
	        'completed_at'    =>  $item->completed_at,
	        'due'    =>  $item->due,
	        'urgency'    =>  $item->urgency,
	        'assignee_id'    =>  $item->assignee_id,
	        'task_id'    =>  $item->task_id,
	        'created_at'    =>  $item->created_at->format('d-m-Y'),
	        'updated_at'    =>  $item->updated_at->format('d-m-Y'),
            'links'   => [
                [
                    'uri' => 'items/'.$item->id,
                ]
            ],
	    ];
	}
}