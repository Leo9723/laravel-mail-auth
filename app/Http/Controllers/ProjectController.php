<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use App\Models\Lead;
use App\Mail\NewContact;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();



        $newProject = new Project();

        if($request->hasFile('cover_image')){
            $path = Storage::disk('public')->put('post_images', $request->cover_image);

            $form_data['cover_image'] = $path;
        }

        $newProject->fill($form_data);

        $newProject->save();

        if($request->has('technologies')){
            $newProject->technologies()->attach($request->technologies);
        }

        $new_lead = new Lead();

        $new_lead->title = $form_data['title'];
        $new_lead->description = $form_data['description'];

        $new_lead->save();

        Mail::to('info@projects.com')->send(new NewContact($new_lead));


        return redirect()->route('admin.projects.index', $newProject->id)->with('message', 'Progetto aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $project = Project::find($project);
        $types = Type::all();
        $technologies = Technology::all();


        if($project){
            return view('admin.projects.edit', compact('project', 'types', 'technologies'));
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $project)
    {
        $project = Project::find($project);

        $form_data = $request->validated();

        if($request->hasFile('cover_image')){

            if($project->cover_image){
                Storage::delete($project->cover_image);
            }

            $path = Storage::disk('public')->put('post_images', $request->cover_image);

            $form_data['cover_image'] = $path;
        }


        $project->update($form_data);

        if($request->has('technologies')){
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.index', ['project' => $project->id])->with('message', 'Progetto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        $project = Project::find($project);

        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Progetto cancellato correttamente');
    }


}
