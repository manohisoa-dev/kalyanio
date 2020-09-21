<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Plank\Mediable\Mediable;
use App\Helpers\ImageResizer ;

class Nourriture extends Model {
    use Mediable ;
    use ImageResizer;

    protected static $directory = 'nourriture';
    protected static $directoryResize = 'nourriture/nourriture-resize';

    protected static $aImageSize = array(
        'mini'              => [25, 25],
        'thumb'             => [50, 50],
        'medium'            => [100, 100],
        'large'             => [800, 500]
    );

    protected $table = "nourritures";

    public $guarded = ["id","created_at","updated_at"];

    public static function findRequested()
    {
        $query = Nourriture::query();

        // search results based on user input
        \Request::input('id') and $query->where('id',\Request::input('id'));
        \Request::input('category_id') and $query->where('category_id',\Request::input('category_id'));
        \Request::input('sous_category_id') and $query->where('sous_category_id',\Request::input('sous_category_id'));
        \Request::input('description') and $query->where('description','like','%'.\Request::input('description').'%');
        \Request::input('nb_personne') and $query->where('nb_personne',\Request::input('nb_personne'));
        \Request::input('preparation') and $query->where('preparation','like','%'.\Request::input('preparation').'%');
        \Request::input('preparation_duree') and $query->where('preparation_duree','like','%'.\Request::input('preparation_duree').'%');
        \Request::input('cuisson') and $query->where('cuisson','like','%'.\Request::input('cuisson').'%');
        \Request::input('created_at') and $query->where('created_at',\Request::input('created_at'));
        \Request::input('updated_at') and $query->where('updated_at',\Request::input('updated_at'));

        if(\Request::input('search')){
            if(is_numeric(\Request::input('search'))){
                $query->where('cout','<=',\Request::input('search'));
            }else{
                $query->where('libelle','like','%'.\Request::input('search').'%');
            }
        }
        \Request::input('cout') and $query->where('cout','<=',\Request::input('search'));
        \Request::input('libelle') and $query->where('libelle','like','%'.\Request::input('libelle').'%');
        // sort results
        if(!\Request::input("sort")){
            $query->orderBy('libelle',\Request::input("sortType","asc"));
        }else{
            \Request::input("sort") and $query->orderBy(\Request::input("sort"),\Request::input("sortType","asc"));
        }

        // paginate results
        return $query->paginate(Config::get('constants.perpage.admin'));
    }

    public static function validationRules( $attributes = null )
    {
        $rules = [
            'libelle' => 'required|string|max:200',
            'category_id' => 'required|integer',
            'sous_category_id' => 'integer',
            'description' => 'string',
            'nb_personne' => 'integer',
            'preparation' => 'string',
            'preparation_duree' => 'string',
            'cuisson' => 'string',
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

    public function cout($format = true)
    {
        $nourritureIngredients = $this->ingredients()->get() ;
        $cout = 0 ;
        foreach ($nourritureIngredients as $nourritureIngredient){
            $ingredient = $nourritureIngredient->ingredient ;
            $quantite = $nourritureIngredient->poids ;
            $prixIngredient = ($quantite * $ingredient->prix) / 1000 ;
            $cout = $cout + $prixIngredient ;
        }
        if($format){
            return number_format($cout , 0,'.',' ') . ' Ar';
        }else{
            return $cout;
        }
    }

    public function coutFmg($format = true){
        if($format){
            $cout = $this->cout(false) * 5 ;
            return number_format($cout , 0,'.',' ') . ' Fmg';
        }else{
            return ($this->cout() * 5) ;
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function sousCategory()
    {
        return $this->belongsTo('App\SousCategory');
    }

    public function ingredients()
    {
        return $this->hasMany('App\NourritureIngredient');
    }

    public function plannings()
    {
        return $this->hasMany('App\Planning');
    }
}

