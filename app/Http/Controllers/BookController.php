<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function index()
    {
        $data = Book::getUser();

        return view('book.vw_book', compact('data'));
    }

    public function landing_page()
    {
        // $data = Book::All();
        $data = Book::getUser();

        return view('book.vw_landing_page', compact('data'));
    }

    public function create()
    {
        return view('book.vw_create_book');
    }

    public function add_book(Request $request)
    {
        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->cover = $request->cover;
        $book->rating = $request->rating;

        $user = Auth::user();
        $user_id = $user->id;

        $book->user_id = $user_id;

        $image = $request->cover;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->cover->move('img_books', $imagename);

            $book->cover = $imagename;
        }
        $book->save();
        return redirect()->route('vw_book')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function delete_book($id)
    {
        $data = Book::find($id);

        if ($data) {
            $image_path = public_path('img_books/' . $data->cover);

            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $data->delete();

            return redirect()->route('vw_book')->with('success', $data->title . ' Berhasil dihapus');
        } else {
            return redirect()->route('vw_book')->with('Error', $data->title . ' Gagal dihapus');
        }

        return redirect()->back();
    }

    public function edit_book($id)
    {
        $data = Book::find($id);

        return view('book.vw_edit_book', compact('data'));
    }

    public function update_book(Request $request, $id)
    {
        $book = Book::find($id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->cover = $request->cover;
        $book->rating = $request->rating;

        $image = $request->cover;

        if ($image) {
            //hapus cover
            $image_path = public_path('img_books/' . $book->cover);

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imagename = time() . ' . ' . $image->getClientOriginalExtension();
            $request->cover->move('img_books', $imagename);

            $book->cover = $imagename;
        }

        if ($book) {

            $book->save();

            return redirect()->route('vw_book')->with('success', $book->title . ' Berhasil diupdate');
        } else {
            return redirect()->route('vw_book')->with('Error', $book->title . ' Gagal diupdate');
        }
    }

    public function book_search(Request $request)
    {

        $author = $request->author;
        $date_start = $request->start;
        $date_end = $request->end;
        $rating = $request->rating;

        $data = Book::filter($author, $date_start, $date_end, $rating);

        return view('book.vw_book', compact('data'));
    }

    public function book_search_lp(Request $request)
    {

        $author = $request->author;
        $date_start = $request->start;
        $date_end = $request->end;
        $rating = $request->rating;

        $data = Book::filter_lp($author, $date_start, $date_end, $rating);

        return view('book.vw_landing_page', compact('data'));
    }
}
