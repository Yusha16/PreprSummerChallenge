<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Collection;

class LabController extends Controller
{
    //This will make it so that we need you to be logged in to use any of the lab feature
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $labs = \App\Lab::all();
        return view('lab.index', ['labs' => $labs]);
    }

    public function create()
    {
        return view('lab.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:labs,name'],
            'location' => ['required', 'string', 'max:255']
        ]);

        //Add the current date to the data
        $data['dateAdded'] = date("Y-m-d");

        //Here is where we manually validate the location (implement when the google map API is added)
        //Throw the message if the validation failed
        //throw ValidationException::withMessages(['location' => 'This address does not exist']);

        \App\Lab::create($data);
        
        //Return back to the list of labs
        return view('lab.index');

    }
}
