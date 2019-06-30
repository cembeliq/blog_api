<?php

namespace App\Transformers;
use App\Templates;
use League\Fractal;
class TemplateTransformer extends Fractal\TransformerAbstract
{
	public function transform(Templates $data)
	{
	    return [
	        'id'      => (int) $data->id,
	        'name'   => $data->name,
	        'checklist' => $data->checklist,
	        'item' => $data->item
	    ];
	}
}