<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class PasswordResets extends Model
{
    protected $tabel='password_resets';
    protected $primaryKey='send_email';
    public $timstamps=false;
}
