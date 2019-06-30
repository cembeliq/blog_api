<?php

namespace App\Transformers;
use App\Checklists;
use League\Fractal;
class ChecklistTransformer extends Fractal\TransformerAbstract
{
	public function transform(Checklists $data)
	{
	    return [
	        'id'      => (int) $data->id,
	        'object_domain'   => $data->object_domain,
	        'object_id'    =>  $data->object_id,
	        'description'    =>  $data->description,
	        'is_completed'    =>  $data->is_completed,
	        'completed_at'    =>  $data->completed_at,
	        'due'    =>  $data->due,
	        'urgency'    =>  $data->urgency,
	        'template_id'    =>  $data->template_id,
	        'created_at'    =>  $data->created_at->format('d-m-Y'),
	        'updated_at'    =>  $data->updated_at->format('d-m-Y'),
            'links'   => [
                [
                    'uri' => 'checklist/'.$data->id,
                ]
            ],
	    ];
	}
}