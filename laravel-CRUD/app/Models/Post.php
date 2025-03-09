<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; // تأكد من أن اسم الجدول مطابق تمامًا
    protected $fillable = ['name', 'email', 'message']; // تحديد الحقول القابلة للتعديل
}
