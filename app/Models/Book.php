<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Book extends Model
{

    use HasFactory;

    protected $fillable = [
        'title', 'author', 'description', 'cover', 'rating', 'user_id',
    ];

    public static function getUser()
    {
        return DB::table('books')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->select('books.*', 'users.name as nama_user')
            ->paginate(8);
    }

    public static function filter($author, $date_start, $date_end, $rating)
    {
        $query = DB::table('books')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->select('books.*', 'users.name as nama_user');
    
        if ($author) {
            $query->where('author', 'ILIKE', '%' . $author . '%');
        }
    
        if ($date_start && $date_end) {
            $query->whereBetween('books.created_at', [$date_start, $date_end]);
        }
    
        if ($rating) {
            $query->where('books.rating', $rating);
        }
    
        return $query->paginate(8);
    }

    public static function filter_lp($author, $date_start, $date_end, $rating)
    {
        $query = DB::table('books')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->select('books.*', 'users.name as nama_user');
    
        if ($author) {
            $query->where('author', 'ILIKE', '%' . $author . '%');
        }
    
        if ($date_start && $date_end) {
            $query->whereBetween('books.created_at', [$date_start, $date_end]);
        }
    
        if ($rating) {
            $query->where('books.rating', $rating);
        }
    
        return $query->paginate(8);
    }
}
?>
