<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\PhotoAlbum;
use DB;

class PagesController extends Controller {

    public function __construct()
    {
        $this->user_id = Auth::id();
    }

	public function welcome()
	{
		return view('pages.welcome');
	}

	public function about()
	{
		return view('pages.about');
	}

	public function contact()
	{
		return view('pages.contact');
	}

    public function gallery()
    {
        $matchThese = ['user_id' => $this->user_id];

        $photoAlbums = PhotoAlbum::where($matchThese)->select(array(
            'photo_albums.id',
            'photo_albums.name',
            'photo_albums.description',
            'photo_albums.folder_id',
            DB::raw('(select filename from photos WHERE album_cover=1 AND deleted_at IS NULL and photos.photo_album_id=photo_albums.id LIMIT 1) AS album_image'),
            DB::raw('(select filename from photos WHERE photos.photo_album_id=photo_albums.id AND deleted_at IS NULL ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')
        ))->limit(8)->get();

        return view('pages.gallery', compact('pages.gallery', 'photoAlbums'));
    }

}
