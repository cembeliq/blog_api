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
	        // 'created_at'    =>  $data->created_at->format('d-m-Y'),
	        // 'updated_at'    =>  $data->updated_at->format('d-m-Y'),
            'links'   => [
                [
                    'uri' => 'template/'.$data->id,
                ]
            ],
	    ];
	}
}