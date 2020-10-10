<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Ingredient extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Ingredient::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('libelle') and $query->where('libelle','like','%'.\Request::input('libelle').'%');
        \Request::input('prix') and $query->where('prix',\Request::input('prix'));
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
            'libelle' => 'required|string|max:200',
            'prix' => 'required',
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

    public function prix($format = true){
        if($format){
            return number_format($this->prix , 0,'.',' ') . ' Ar';
        }else{
            return $this->prix ;
        }
    }

    public function prixFmg($format = true){
        if($format){
            $prix = $this->prix * 5 ;
            return number_format($prix , 0,'.',' ') . ' Fmg';
        }else{
            return ($this->prix * 5) ;
        }
    }

    public function ingredientType()
    {
        $type = $this->belongsTo('App\IngredientType', 'ingredient_type_id');
        return $type->first();
    }

}

