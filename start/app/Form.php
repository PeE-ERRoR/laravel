<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Form extends Model
{

  protected $fillable = [
      'name', 'date', 'type_id', 'delete'
  ];

  protected $dates = ['date'];

  // protected $casts = [
  //   'is_admin' => 'boolean',
  // ];

  //
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  //set ค่า Date คือชื่อ database
  public function setDateAttribute($date)
  {
    // $this->attributes['name'] = strtolower($name);
    $this->attributes['date'] = Carbon::parse($date)->subDay();
  }

  // public function scopeTypeId($query)
  // {
  //   return $query->where('type_id', 4);
  // }

  public function scopeTypeId($query)
  {
    return $query->join('types', 'forms.type_id', '=', 'types.id')
                ->select('forms.*', 'types.type_name');
  }

  public function scopeGetByType($query, $type_id)
  {
    return $query->join('types', 'forms.type_id', '=', 'types.id')
                ->select('forms.*', 'types.type_name')
                ->where('type_id', $type_id);
  }

}
