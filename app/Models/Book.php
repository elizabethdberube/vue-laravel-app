<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Category;



class Book extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $Book = [
        'id',
        'category_id',
        'book_author',
        'book_name',
        'book_isbn',
        'book_no_of_copies',
        'book_status',
        'book_added_on',
        'updated_at',
    ];

    public function category($id) {
        return $this->belongsTo(Category::class);
    }
    
    // public function userDashboard($userId) {
    //      $id = auth()->id();
    //     $userId= User::find($id);
         
    //     $userBooks= Bookcheckout::get(['user_id' => $userId]);
        
        
    //     return $bookListItems= Book::get($userBooks['book_id']);
       
    // }

    public function checkoutBook() {
      
    $this->book_no_of_copies=$this->book_no_of_copies -1;
        
        if ($this->book_no_of_copies < 1){
            $this->book_status = 'Unavailable';
          
        }else{
            $this->book_status = 'Available';
        };

        // $this->checkout_date=$this->checkout_date +30;
        // $this->save();
  
    }

    public function addBook() {
      
        $this->book_no_of_copies=$this->book_no_of_copies +1;
            
            if ($this->book_no_of_copies < 1){
                $this->book_status = 'Unavailable';
              
            }else{
                $this->book_status = 'Available';
            };
    
            $this->save();
      
        }

        public function returnBook() {
      
            $this->book_issue_status= 'return';
                
    
                $this->save();
          
            }

}
