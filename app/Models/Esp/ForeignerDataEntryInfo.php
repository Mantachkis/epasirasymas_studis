<?php

namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class ForeignerDataEntryInfo extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'foreigner_data_entry_info';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function foreignerDataEntry()
    {
        return $this->belongsTo(ForeignerDataEntry::class, 'id', 'foreigner_data_info_id');
    }
}
