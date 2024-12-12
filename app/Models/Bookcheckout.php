<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
use App\Models\Book;

class Bookcheckout extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = ['book_id', 'user_id', 'checkout_date', 'book_issue_status','book_fines','return_date'];


    protected $Bookcheckout = [
        'id',
        'user_id',
        'book_id',
        'expected_return_date',
        'return_date',
        'book_fines',
        'book_issue_status',
    ];



    public function Book() {
        return $this->belongsTo(Book::class);
    }
    public function User() {
        return $this->belongsTo(User::class);
    }


}
