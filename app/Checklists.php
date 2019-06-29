<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklists extends Model {

    protected $fillable = ["object_domain", "object_id", "description", "is_completed", "completed_at", "due", "urgency", "template_id"];

    protected $dates = [];

    public static $rules = [
        "object_domain" => "required",
        "object_id" => "required",
        "description" => "required",
        "is_completed" => "nullable",
        "completed_at" => "nullable",
        "due" => "nullable",
        "urgency" => "nullable",
        "template_id" => "required|numeric",
    ];

    public function templates()
    {
        return $this->belongsTo("App\Template");
    }


}
