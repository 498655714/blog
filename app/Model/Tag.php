<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
class Tag extends Model
{
    protected $tabel='tags';
    protected $primaryKey='tag_id';
    protected $guarded=[];
}
