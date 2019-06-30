<?php namespace App\Http\Controllers;

class TemplatesController extends Controller {

    const MODEL = "App\Templates";
    const TRANSFORMER = "App\Transformers\TemplateTransformer";

    use RESTActions;

}
