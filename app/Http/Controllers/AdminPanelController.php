<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Post;
use App\Models\Publicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('adminPanel.pages.index');
    }

    public function createCategory()
    {
        return view('adminPanel.pages.createCategory');
    }

    public function createCategoryPost(Request $request)
    {
        $categoryModel = new Category();
        $categoryModel->name = $request->category;
        $categoryModel->save();

        return redirect()->route('panel.listCategory')->with('success', 'Kategori başarıyla eklendi.');
    }

    public function listCategory()
    {
        $categories = Category::get();
        return view('adminPanel.pages.listCategory', compact('categories'));
    }

    public function updateCategory($id)
    {
        //where('sütun adı', 'ne aranıyor')
        $categoryModel = Category::find($id);
        return view('adminPanel.pages.updateCategory', compact('categoryModel'));
    }

    public function updateCategoryPost(Request $request)
    {
        $categoryModel = Category::find($request->categoryId);
        $categoryModel->name = $request->categoryName;
        $categoryModel->save();

        return redirect()->route('panel.listCategory')->with('success', 'Kategori başarıyla güncellendi.');
    }

    public function deleteCategory($id)
    {
        $categoryModel = Category::find($id);

        if ($categoryModel) {
            $bookModels = Book::where('category_id', $categoryModel->id)->get();

            foreach ($bookModels as $book) {
                $book->delete();
            }
        }
        $categoryModel->delete();
        return redirect()->route('panel.listCategory')->with('success', 'Kategori başarıyla silindi');
    }

    public function createBook()
    {
        $categories = Category::all();
        $authors = Author::all();
        $publicators = Publicator::all();


        return view('adminPanel.pages.createBook',compact('categories', 'authors', 'publicators'));
    }
    public function createBookPost(Request $request)
    {
        $bookModel = new Book();
        $bookModel->user_id = Auth::user()->id;
        $bookModel->name = $request->bookName;
        $bookModel->category_id = $request->category_id;
        $bookModel->pub_id = $request->pub_id;
        $bookModel->author_id = $request->author_id;

        $bookModel->pageNumber = $request->pageNumber;
        $bookModel->is_lended = $request->is_lended;
        $bookModel->barkod_no = $request->barkod_no;
        $bookModel->avaliable_lend_time = $request->avaliable_lend_time;

        $bookModel->save();

        return redirect()->route('panel.listBook')->with('success', 'Kitap başarıyla eklendi.');
    }


    public function listBook()
    {
        $books = Book::with(['categories', 'publicators', 'authors'])->get();

        return view('adminPanel.pages.listBook', compact('books'));
    }

    public function updateBook($id)
    {
        //where('sütun adı', 'ne aranıyor')
        $bookModel = Book::find($id);
        return view('adminPanel.pages.updateBook', compact('bookModel'));
    }

    public function updateBookPost(Request $request)
    {
        $bookModel = Book::find($request->bookId);
        $bookModel->name = $request->bookName;
        $bookModel->save();

        return redirect()->route('panel.listBook')->with('success', 'Kitap başarıyla güncellendi.');
    }

    public function deleteBook($id)
    {
        $bookModel = Book::find($id);
        $bookModel->delete();
        return redirect()->route('panel.listBook')->with('success', 'Kitap başarıyla silindi');
    }



}
