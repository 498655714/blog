<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
class Category extends Model
{
    protected $tabel='categories';
    protected $primaryKey='cate_id';
    protected $guarded=[];
}
