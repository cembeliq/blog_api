<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model {

    protected $fillable = ["description", "is_completed", "completed_at", "due", "urgency", "updated_by", "assignee_id", "task_id", "checklist_id"];

    protected $dates = [];

    public static $rules = [
        "description" => "required",
        "is_completed" => "nullable",
        "completed_at" => "nullable",
        "due" => "nullable",
        "urgency" => "nullable",
        "updated_by" => "nullable",
        "assignee_id" => "nullable",
        "task_id" => "numeric",
        "checklist_id" => "required|numeric",
    ];

    public function checklists()
    {
        return $this->belongsTo("App\Checklist");
    }


}
