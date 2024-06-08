<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Portfolio::latest()->paginate(15);
        return view('admin.project.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
        $this->storeData($request, new Portfolio());
        return back()->with('success', 'New Project has been created');
    }

    public function edit(Portfolio $project)
    {
       
        return view('admin.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Portfolio::findOrFail($id);
        $this->storeData($request, $project, $project->id);
        return back()->with('success', 'Project has been updated');
    }

    public function storeData($request, $data, $id = null)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:portfolios,title,' . $id,
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->link = $request->link;
        $data->description = $request->description;
        $data->is_feature= $request->is_feature;
        if(isset($request['photo'])){
            $status = MediaHelper::ExtensionValidation($request['photo']);
            if(!$status){
                return ['errors' => [0=>'file format not supported']];
            }
            if($id){
                $data->photo = MediaHelper::handleUpdateImage($request['photo'],$data->photo);
            }else{
                $data->photo = MediaHelper::handleMakeImage($request['photo']);
            } 
        }

       
        $data->save();
    }

    public function destroy(Portfolio $project)
    {
        MediaHelper::handleDeleteImage($project->photo);
       
        $project->delete();

        return back()->with('success', 'Project has been deleted');
    }
}
