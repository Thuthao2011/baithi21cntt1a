<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $primaryKey = 'id';

    // Định nghĩa các trường trong bảng bills
    protected $fillable = [
        'id_customer',
        'date_order',
        'total',
        'payment',
        'note',
        'status',
        'created_at',
        'updated_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
    
    // Các phương thức, quan hệ, hoặc logic liên quan đến model Bill sẽ được định nghĩa ở đây
}
