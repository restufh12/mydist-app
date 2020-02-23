<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataSetting extends Model
{
  protected $connection = 'mysqlcloud';
  protected $table = 'datasetting';
  protected $primaryKey = 'RunNo';
}
