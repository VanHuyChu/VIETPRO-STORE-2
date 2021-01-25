<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Variant,Values,Category};

class Products extends Model
{
    protected $table='products';
    /**
     * Đang sử dụng Product::class để view dữ liệu, cần tham chiếu đến bảng Category -> Vào đúng bảng Product viết hàm tham chiếu
     * belongsTo: Một đến nhiều(1 SP n Cate)
     * tham so 1: Class tham chieu den
     * tham so 2: Khoa ngoai trong bang product
     * tham so 3: Khoa chinh bang product
     */
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function values()
    {
        return $this->belongsToMany(Values::class, 'values_product', 'product_id', 'values_id');
    }
    public function variant()
    {
        return $this->hasMany(Variant::class, 'product_id', 'id');
    }
}
