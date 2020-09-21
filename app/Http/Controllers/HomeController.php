<?php

namespace App\Http\Controllers;

use App\Planning;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $viewDir = "admin.planning";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $records = Planning::findRequested();

        $events = [];
        foreach ($records as $item) {
            $events[] = [
                'title' => $item->nourriture->libelle,
                'url'   => route('admin.planning.edit' , array('planning' => $item->id)),
                'start' => $item->date
            ];
        }
        $planningJson = json_encode($events);

        return $this->view( "index", compact('records','planningJson'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }
}
