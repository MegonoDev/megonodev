<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akuns';
    protected $fillable = ['nama_akun', 'type_akun', 'alur_akun'];
    protected $primaryKey = 'id_akun';

    public function getAlurAkunAttribute($value)
    {
        if ($value == 'debet') {
            $class = 'badge-primary';
        } else {
            $class = 'badge-success';
        }
        return '<span class="badge ' . $class . '">' . $value . '</span>';
    }
}
