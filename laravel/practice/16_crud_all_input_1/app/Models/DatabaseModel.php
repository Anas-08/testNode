<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseModel extends Model
{
    use HasFactory;
    // table name model name must be same, if different then we need to change it
    // change the name of table (which is given in database)
    protected $table = "inputs";
}
