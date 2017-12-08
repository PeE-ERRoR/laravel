<?php

namespace App\Http\Controllers;

use App\Form;
use App\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Carbon;
// API
use App\User;
use App\Http\Resources\User as UserResource;

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
        'provinces' => $this->getProvince()
      );
      return View('./form/viewStatusList', $data);
    }

    public function getProvince()
    {
      $json = Storage::disk('local')->get('json/province.json');
      $json = json_decode($json, true);
      // echo '<pre>';
      // print_r($json);
      // echo '<pre>';
      return $json;
    }

    public function getDistrict($province)
    {
      $json = Storage::disk('local')->get('json/district.json');
      $json = json_decode($json, true);

      $data['district'] = array();
      foreach ($json['district'] as $district) {
        if ($district['changwat_pid'] == $province) {
          $data['district'][] = $district;
        }
      }

      return $data;
    }

    public function getSubDistrict($district)
    {
      $json = Storage::disk('local')->get('json/subdistrict.json');
      $json = json_decode($json, true);

      $data['subdistrict'] = array();
      foreach ($json['subdistrict'] as $key => $subdistrict) {
        if ($subdistrict['amphoe_pid'] == $district) {
          $data['subdistrict'][] = $subdistrict;
        }
      }

      return $data;
    }

    public function getFile()
    {
      return $a;
    }

    public function getAPI()
    {
       return new UserResource(User::find(1));
    }
}
