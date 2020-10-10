<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class NourritureIngredient extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = NourritureIngredient::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('nourriture_id') and $query->where('nourriture_id',\Request::input('nourriture_id'));
        \Request::input('ingredient_id') and $query->where('ingredient_id',\Request::input('ingredient_id'));
        \Request::input('poids') and $query->where('poids',\Request::input('poids'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));
        
        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(Config::get('constants.perpage.admin'));
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'nourriture_id' => 'required|integer',
            'ingredient_id' => 'integer',
            'poids' => '',
        ];

        // no list is provided
        if(!$attributes)
            return $rules;

        // a single attribute is provided
        if(!is_array($attributes))
            return [ $attributes => $rules[$attributes] ];

        // a list of attributes is provided
        $newRules = [];
        foreach ( $attributes as $attr )
            $newRules[$attr] = $rules[$attr];
        return $newRules;
    }

    public function nourriture()
    {
        return $this->belongsTo('App\Nourriture');
    }

    public function ingredient()
    {
        return $this->belongsTo('App\Ingredient');
    }

}

