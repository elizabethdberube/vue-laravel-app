<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Bookcheckout;
use App\Models\Category;
use App\Models\Book;
use App\Models\User;


class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
    * @param  int  $id
    * @return \Illuminate\View\View
    */
     
    public function __construct()
    {
       $this->middleware('auth');
    }
    public function checkout($id)
    {
     
        $userId = auth()->id();
        $user= User::find($userId);
        $book = Book::find($id);

        

        return view('checkout', array('user' => $user, 'book' => $book, 'userId' => $userId));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id)
    
    {
        $selectedBook = Book::findOrFail($id);
        $selectedBook->checkoutBook();
        $idUser = auth()->id();
        $storeUser= User::find($idUser);
        
       

        $data = array( 'id'=>$request->input('id'),
        'user_id'=>$request->input('user_id'),
        'book_id'=>$request->input('book_id'),
        'checkout_date'=>now(),
        'book_issue_status'=>$request->input('book_issue_status'),
     
    );

    Bookcheckout::create($request->all());

     return redirect()->route('dashboard')->with('success', 'Book is successfully checked out');
   }

}
  

  

