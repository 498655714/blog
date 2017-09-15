<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Request;
class User extends Model
{
    protected $tabel='users';
    protected $primaryKey='id';
    public $timstamps=false;
}
