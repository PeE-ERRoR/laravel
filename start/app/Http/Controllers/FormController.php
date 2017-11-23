<?php

namespace App\Http\Controllers;

use App\Form;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $form = Form::typeid()->get();
      //join types
        $form = Form::typeid()->get();
        // dd($form);
        $data = array(
          'forms' => $form
        );
        return view('./form/list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
          'types' => $this->getType()
        );
        return view('./form/form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Form::create($request->All());
        return redirect('./form');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
      // dd($form->id);
      $form = Form::typeid()->find($form->id);
      $data = array(
        'forms' => $form
      );
      return view('./form/view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
      $form = Form::find($form->id);
      $data = array(
        'form' => $form,
        'types' => $this->getType()
      );
      return view('./form/form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {

      $form = Form::find($form->id)->update($request->All());

      return redirect('./form')->with('success','Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form, $id)
    {

    }

    //get types
    function getType()
    {
      return Type::All();
    }

    //get by types
    public function listview($id)
    {
      $form = Form::getByType($id)->get();
      $data = array(
        'forms' => $form
      );
      return view('./form/list', $data);
    }

    public function statusList()
    {
      $data = array(
        'types' => $this->getType(),
        'provinces' => $this->getJson()
      );
      return View('./form/viewStatusList', $data);
    }

    public function getJson()
    {
      // return Storage::get('json/province.json');
      // $data = array(Storage::get('json/province.json'));

      $json = Storage::disk('local')->get('json/province.json');
      $json = json_decode($json, true);
      // echo '<pre>';
      // print_r($json);
      // echo '<pre>';
      // return  response()->json($json)->header('X-Value', 'True');
      // dd($json);
      // echo '<pre>';
      // var_dump($json);
      // echo '<pre>';

      return $json;
    }
}
