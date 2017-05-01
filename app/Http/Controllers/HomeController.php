<?php

namespace App\Http\Controllers;

use App\Article;
use App\PhotoAlbum;
use DB;
use PhpImap;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::with('author')->orderBy('position', 'DESC')->orderBy('created_at', 'DESC')->limit(4)->get();

		$photoAlbums = PhotoAlbum::select(array(
			'photo_albums.id',
			'photo_albums.name',
			'photo_albums.description',
			'photo_albums.folder_id',
			DB::raw('(select filename from photos WHERE album_cover=1 AND deleted_at IS NULL and photos.photo_album_id=photo_albums.id LIMIT 1) AS album_image'),
			DB::raw('(select filename from photos WHERE photos.photo_album_id=photo_albums.id AND deleted_at IS NULL ORDER BY position ASC, id ASC LIMIT 1) AS album_image_first')
		))->limit(8)->get();

		return view('pages.home', compact('articles', 'photoAlbums'));
	}

    public function inboxRead()
    {
        $mailbox = new PhpImap\Mailbox('{pop.europe.secureserver.net:110/pop}INBOX', 'feedback@vackerglobal.com', '434535cron5dtgtab-e', __DIR__);

// Read all messaged into an array:
        $mailsIds = $mailbox->searchMailbox('ALL');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }

// Get the first message and save its attachment(s) to disk:
        //$mail = $mailbox->getMail($mailsIds[175]);
        $mail = $mailbox->getMail($mailsIds[175])->textPlain;

        echo '<pre>';
        var_dump(preg_replace( "/[\r\n]+/", "\n", $mail ));
        //var_dump(explode("\n",$mail));
        echo "\n\n\n\n\n";
        //var_dump($mail->getAttachments());

        // @TODO Send Email to User Email Address
        Mail::send('emails.useralert', ['key' => 'value'], function($message)
        {
            $message->to('prakash.kl@vackerglobal.com', 'DL Alert System')->subject('User Alert!');
        });

        // @TODO Send Email to SMS Alert Email Address
        Mail::send('emails.smsalert', ['key' => 'value'], function($message)
        {
            $message->to('prakash.kl@vackerglobal.com', 'DL Alert System')->subject('SMS Alert!');
        });

        // @TODO Send Email to Phone Call Alert Email Address
        Mail::send('emails.phonealert', ['key' => 'value'], function($message)
        {
            $message->to('prakash.kl@vackerglobal.com', 'DL Alert System')->subject('Phone Call Alert!');
        });
    }

}