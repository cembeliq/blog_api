<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model {

    protected $fillable = ["name", "checklist", "item"];

    protected $dates = [];

    public static $rules = [
        "name" => "nullable",
    ];

    public $timestamps = false;

    // Relationships

}
