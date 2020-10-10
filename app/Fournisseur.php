<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Fournisseur extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Fournisseur::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('nom') and $query->where('nom','like','%'.\Request::input('nom').'%');
        \Request::input('apropos') and $query->where('apropos','like','%'.\Request::input('apropos').'%');
        \Request::input('tel') and $query->where('tel','like','%'.\Request::input('tel').'%');
        \Request::input('mail') and $query->where('mail','like','%'.\Request::input('mail').'%');
        \Request::input('adresse') and $query->where('adresse','like','%'.\Request::input('adresse').'%');
        \Request::input('ville') and $query->where('ville','like','%'.\Request::input('ville').'%');
        \Request::input('siteweb') and $query->where('siteweb','like','%'.\Request::input('siteweb').'%');
        \Request::input('facebook') and $query->where('facebook','like','%'.\Request::input('facebook').'%');
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
            'nom' => 'required|string|max:200',
            'apropos' => 'string',
            'tel' => 'required|string|max:20',
            'mail' => 'string|max:200',
            'adresse' => 'string|max:200',
            'ville' => 'string|max:200',
            'siteweb' => 'string|max:200',
            'facebook' => 'string|max:255',
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

}

