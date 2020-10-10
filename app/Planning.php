<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class Planning extends Model {


    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Planning::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('nourriture_id') and $query->where('nourriture_id',\Request::input('nourriture_id'));
        \Request::input('date') and $query->where('date','like','%'.\Request::input('date').'%');
        \Request::input('plannifier_pour') and $query->where('plannifier_pour',\Request::input('plannifier_pour'));
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));

        // restriction des plannings affichés uniquement pour l'utilisateur l'à ajouter
        $query->where('user_id', Auth::id());

        // sort results
        \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));

        // paginate results
        return $query->paginate(Config::get('constants.perpage.admin'));
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'nourriture_id' => 'required|integer',
            'date' => 'date',
            'plannifier_pour' => 'in:matin,midi,soir',
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

    public function getDate(){
        $dateTime = $this->date ;
        $tzDate = explode(' ', $dateTime) ;
        return $tzDate[0];
    }

    public function getHeure(){
        $dateTime = $this->date ;
        $tzDate = explode(' ', $dateTime) ;
        return $tzDate[1];
    }

}

