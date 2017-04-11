<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Photo;
use App\PhotoAlbum;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
        $this->user_id = Auth::id();
    }

	public function index()
	{
        $title = "Dashboard";
        $matchThese = ['user_id' => $this->user_id];

        $news = Article::count();
        $newscategory = ArticleCategory::count();
        $users = User::count();
        $photo = Photo::where($matchThese)->count();
        $photoalbum = PhotoAlbum::where($matchThese)->count();
		return view('admin.dashboard.index',  compact('title','news','newscategory','photo','photoalbum','users'));
	}
}