<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table="pinjam";
    protected $fillable=['peminjam', 'barang','jumlah', 'tgl_pinjam', 'tgl_kembali', 'surat', 'status', 'keterangan'];
    public function peminjam(){
        return $this->belongsTo(User::class);
    }
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}