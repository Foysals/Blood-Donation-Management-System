<?php

namespace App\Models\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModels extends Model
{
public function update(){
    DB::connection('main')->update("update users set name = ? whare id =?")
}
}
