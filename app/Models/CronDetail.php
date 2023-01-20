<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronDetail extends Model
{
    use HasFactory;

    protected $table = 'cron_details';

    protected $fillable = [
        'executed_at',
        'memory_usage',
        'execution_time',
        'status'
    ];
}
