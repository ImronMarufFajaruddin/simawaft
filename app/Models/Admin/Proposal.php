<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proposal extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kegiatan_id',
        'dokumen',
        'status',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
