<?php

namespace App\Models\Ekp;

use Illuminate\Database\Eloquent\Model;

class AdminTableTexts extends Model
{
    protected $connection = 'ekp';

    protected $table = 'admin_table_texts';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    protected $fillable = ['id'];
}
