<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniquePrimaryKey implements Rule
{
    protected $table;
    protected $primaryKey;
    protected $excludeId;

    public function __construct($table, $primaryKey, $excludeId = null)
    {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $this->excludeId = $excludeId;
    }

    public function passes($attribute, $value)
    {
        $query = DB::table($this->table)->where($this->primaryKey, $value);
        
        if($this->excludeId !== null){
            $query->where('id', '<>', $this->excludeId);
        }

        $count = $query->count();
        
        return $count === 0;
    }

    public function message()
    {
        return 'La clave primaria ya ha sido ingresada en la tabla '.$this->table.'.';
    }
}
