<?php

namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class ForeignerDataEntry extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'foreigner_data_entry';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function foreignerDataEntryInfo()
    {
        return $this->hasMany(ForeignerDataEntryInfo::class, 'foreigner_data_entry_id', 'id');
    }
}
