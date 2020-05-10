<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Debug;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Collection;
use App\Lab;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertNull\consume;

class LabController extends Controller
{
    //This will make it so that we need you to be logged in to use any of the lab feature
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $labs = Lab::all();
        return view('lab.index', ['labs' => $labs]);
    }

    public function show(Lab $lab)
    {
        return view('lab.show', ['lab' => $lab]);
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

        Lab::create($data);

        //Return back to the list of labs
        //return view('lab.index');
        //Call the list view
        return $this->index();
    }

    public function edit(Lab $lab)
    {
        return view('lab.edit', ['lab' => $lab]);
    }

    public function update(Lab $lab)
    {
        //Validate the lab data
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255', 'unique:labs,name,' . $lab->id],
            'location' => ['required', 'string', 'max:255']
        ]);

        //Same as create we will validate the location when we implement the Google Map API

        //Update the database
        $lab->update($data);

        //Go back to the Details view of the Lab
        return redirect("lab/{$lab->id}");
    }

    public function destroy(Lab $lab)
    {
        $lab->delete();
        //For now I am returning a index view (but in reality it is sending a success if the view is being returned)
        return $this->index();
    }
}
