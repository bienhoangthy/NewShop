<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Intro;
use App\ImagePages;
use App\Contact;
use App\Policy;
use File;

class DisplayController extends Controller
{

    public function getIntro() {
    	$intro = Intro::find(1);
    	$shopping = Intro::find(2);
    	return view('admin.display.intro', compact('intro','shopping'));
    }

    public function postIntroduction(Request $request) {
    	$this->validate($request, 
    		[
    			'txtIntro'=>'required|min:100'
    		],
	        [
	          'txtIntro.required' => 'Please Inter Intro Content!',
	          'txtIntro.min'=>'This Intro Is To Shot!'
	        ]);
    	$intro = Intro::find(1);
    	$intro->content = $request->txtIntro;
    	$intro->save();
    	return redirect()->route('admin.display.getIntro')->with(['flash_status'=>'success','flash_message'=>'Update Intro Content Complete!']);
    }

    public function postShopping(Request $r) {
    	$this->validate($r, 
    		[
    			'txtShopping'=>'required|min:50'
    		],
	        [
	          'txtShopping.required' => 'Please Inter Intro Content!',
	          'txtShopping.min'=>'This Shopping Guide Is To Shot!'
	        ]);
    	$shopping = Intro::find(2);
    	$shopping->content = $r->txtShopping;
    	$shopping->save();
    	return redirect()->route('admin.display.getIntro')->with(['flash_status'=>'success','flash_message'=>'Update Shopping Guide Content Complete!']);
    }

    public function getImagePageIndex() {
    	$index1 = ImagePages::find(1);
    	$index2 = ImagePages::find(2);
    	$index3 = ImagePages::find(3);
    	return view('admin.display.img-pages',compact('index1','index2','index3'));
    }

    public function postImagePageIndex(Request $request) {
        $this->validate($request, 
            [
                'fImages'=>'image'
            ],
            [
              'fImages.image'=>'This File Is Not Image!'
            ]);
    	$id = $request->idImgCurrent;
    	$index = ImagePages::find($id);
		$img_current = "upload/pages/index/$id/".$index->image;
		$img_new = $request->file('fImages');
		if (!empty($img_new)) {
    		$image_name = $img_new->getClientOriginalName();
    		$index->image = $image_name;
    		if (File::exists($img_current)) {
    			File::delete($img_current);
    		}
    		$img_new->move("upload/pages/index/$id",$image_name);
    		$index->save();
    	}
    	return redirect()->route('admin.display.getImagePageIndex')->with(['flash_status'=>'success','flash_message'=>'Update A Image Complete!']);
    }

    public function postImagePage(Request $request) {
        $this->validate($request, 
            [
                'fImages'=>'image'
            ],
            [
              'fImages.image'=>'This File Is Not Image!'
            ]);
    	$id = $request->idImgCurrent;
    	$page = ImagePages::find($id);
    	$page->filter = $request->radioFilter;
		$img_new = $request->file('fImages');
		if (!empty($img_new)) {
			$img_current = "upload/pages/$id/".$page->image;
    		$image_name = $img_new->getClientOriginalName();
    		$page->image = $image_name;
    		if (File::exists($img_current)) {
    			File::delete($img_current);
    		}
    		$img_new->move("upload/pages/$id",$image_name);
    	}
    	$page->save();
    	return redirect()->route('admin.display.getImagePage',$id)->with(['flash_status'=>'success','flash_message'=>'Update Image Header Complete!']);
    }

    public function getImagePage($id) {
    	$page = ImagePages::find($id);
    	return view('admin.display.img-all-pages',compact('page'));
    }

    public function contactPage() {
        $contact = Contact::find(1);
        return view('admin.display.contact', compact('contact'));
    }

    public function postContactPage(Request $request) {
        $this->validate($request, 
            [
                'txtAddress'=>'required',
                'txtPhone'=>['required','regex:/(\\01|0)\\d{9}/'],
                'txtEmail'=>'required',
                'txtSlogan'=>'required'
            ],
            [
              'txtAddress.required'=>'Please Inter Address',
              'txtPhone.required'=>'Please Inter Number Phone',
              'txtPhone.regex'=>'This Is Not Number Phone',
              'txtEmail.required'=>'Please Inter Email',
              'txtSlogan.required'=>'Please Inter Slogan'
            ]);
        $contact = Contact::find(1);
        $contact->email = $request->txtEmail;
        $contact->address = $request->txtAddress;
        $contact->tel = $request->txtPhone;
        $contact->slogan = $request->txtSlogan;
        $contact->save();

        return redirect()->route('admin.display.contactPage')->with(['flash_status'=>'success','flash_message'=>'Update Information Contact Complete!']);
    }

    public function getPolicy() {
        $policy = Policy::all();
        return view('admin.display.policy', compact('policy'));
    }

    public function postPolicy(Request $request) {
        $this->validate($request, 
            [
                'txtTitle'=>'required',
                'txtContent'=>'required'
            ],
            [
              'txtTitle.required'=>'Please Inter Title',
              'txtContent.required'=>'Please Inter Content'
            ]);
        $policy = Policy::find($request->txtStt);
        $policy->title = $request->txtTitle;
        $policy->content = $request->txtContent;
        $policy->save();
        return redirect()->route('admin.display.getPolicy')->with(['flash_status'=>'success','flash_message'=>'Update Policy Complete!']);
    }
}
