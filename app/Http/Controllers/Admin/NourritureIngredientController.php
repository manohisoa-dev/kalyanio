<?php
namespace App\Http\Controllers\admin;

use App\Nourriture;
use App\NourritureIngredient;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class NourritureIngredientController extends Controller
{
    public $viewDir = "admin.nourriture_ingredient";

    public function index()
    {
        $records = NourritureIngredient::findRequested();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, NourritureIngredient::validationRules());

        NourritureIngredient::create($request->all());

        $nourriture = Nourriture::find($request->input('nourriture_id')) ;
        $nourriture->cout = $nourriture->cout($format = false) ;
        $nourriture->save() ;

        # notification
        Notify::success('Nourriture Ingredient a été créer avec succès');
        if($request->input("nourriture_id") != ''){
            return redirect(route('admin.nourriture-ingredient.index' , array('nourriture_id' => $request->input("nourriture_id"))));
        }else{
            return redirect(route('admin.nourriture-ingredient.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, NourritureIngredient $nourritureIngredient)
    {
        return $this->view("show",['nourritureIngredient' => $nourritureIngredient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, NourritureIngredient $nourritureIngredient)
    {
        return $this->view( "edit", ['nourritureIngredient' => $nourritureIngredient] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, NourritureIngredient $nourritureIngredient)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, NourritureIngredient::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $nourritureIngredient->update($data);
            return "Record updated";
        }

        $this->validate($request, NourritureIngredient::validationRules());

        $nourritureIngredient->update($request->all());

        $nourriture = Nourriture::find($request->input('nourriture_id')) ;
        $nourriture->cout = $nourriture->cout($format = false) ;
        $nourriture->save() ;

        # notification
        Notify::success('Nourriture Ingredient a été mise à jour avec succès');
        return redirect(route('admin.nourriture-ingredient.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, NourritureIngredient $nourritureIngredient)
    {
        $nourritureIngredient->delete();

        # notification
        Notify::success('Nourriture Ingredient a été supprimer avec succès');
        return redirect(route('admin.nourriture-ingredient.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
