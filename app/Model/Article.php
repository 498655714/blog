<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
class Article extends Model
{
    protected $tabel='articles';
    protected $primaryKey='art_id';
    protected $guarded=[];
}
