<?php

namespace App\Http\Controllers;

use Image;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AnnouncementController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $announcements = Announcement::orderBy('id','ASC')->paginate(10);
	return view('settings.announce.announceIndex',compact('announcements'))
	->with('i',($request->input('page',1)-1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.announce.announceCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	if(Input::file()){
	$image = Input::file('image');
	$fileName  = time() . '.' . $image->getClientOriginalExtension();
	$path = public_path('uploads/announcement/' . $fileName);
	Image::make(Input::file('image'))->resize(400,400)->save($path);
	$requestData = $request->all();
	$requestData['image'] = $fileName;
        Announcement::create($requestData);
	}
	else {
	Announcement::create($request->all());
	}
	return redirect()->route('announcement.index')->with('success','Announcement successfuly created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $announcement = Announcement::find($announcement->id);
	return redirect()->route('announcement.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        $announcement = Announcement::find($announcement->id);
	return view('settings.announce.announceEdit',compact('announcement'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        	if(Input::file()){
	$image = Input::file('image');
	$fileName  = time() . '.' . $image->getClientOriginalExtension();
	$path = public_path('uploads/announcement/' . $fileName);
	Image::make(Input::file('image'))->resize(400,400)->save($path);
	$requestData = $request->all();
	$requestData['image'] = $fileName;
        Announcement::create($requestData);
	}
	else {
	Announcement::create($request->all());
	}
	return redicrect()->route('annoucement.index')->with('success','Announcement successfuly created!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
         Announcement::find($announcement->id)->delete();
    return redirect()->back()
        ->with('success','Announce deleted successfuly');
    }
}
