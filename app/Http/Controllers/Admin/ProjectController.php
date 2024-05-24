<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper as Help;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $form_data = $request->all();

        $exixts = Project::where('title', $form_data['title'])->first();

        // controllo se esiste già il progetto
            if($exixts) {

                return redirect()->route('admin.projects.create')->with('error', 'Progetto già esistente!');
// controllo di successo nell'aggiunta del progetto
            } else {

                $new_project = new Project();
                $form_data['slug'] = Help::generateSlug($form_data['title'], Project::class);

                $new_project->fill($form_data);

                $new_project->save();

                return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiunto correttamente!');

            }



    }

    /**
     * Display the specified resource.
     */


    //  DETTAGLIO DEL PROGETTO
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $form_data = $request->all();



        // controllo sulla validità dei dati inseriti e slug
        $exist = Project::where('title', $form_data['title'])->first();

        if($exist) {

            return redirect()->route('admin.projects.index')->with('error', 'Progetto già esistente');

        } else {
            if($form_data['title'] === $project->title){
            $form_data['slug'] = $project->slug;

            } else {

                $form_data['slug'] = Help::generateSlug($form_data['title'], Project::class) ;
            }


        }

        $project->update($form_data);

        return redirect()->route('admin.projects.index',$project);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('deleted', 'Il progetto'. ' ' . $project->title. ' ' .'è stato cancellato con successo!');
    }
}
