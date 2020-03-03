<?php

namespace App\Http\Controllers;

use App\Category;
use App\Business;
use App\Bridge;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function __construct()
    {
        //i put authentication
        $this->middleware('auth:admin',['except' => ['index','search','show', 'view_count']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::orderBy('id', 'DESC')->get();
        $data = [
            'businesses' => $businesses
        ];
        return view('business.index')->with($data);
    }
    public function search()
    {
        return view('business.search');
    }
    public function process_search(Request $request){

        $search_keyword = $request->input('keyword');
        $name = $request->input('name');
        $description = $request->input('description');
        if($name != null && $description != null){
            $search_result = Business::where(
                                'name',
                                'like',
                                '%' . $search_keyword . '%'
                                )
                                ->orwhere(
                                    'description',
                                    'like',
                                    '%' . $search_keyword . '%'
                                )->orderBy('id', 'desc')->get();

        }elseif($name != null){
            $search_result = Business::where(
                'name',
                'like',
                '%' . $search_keyword . '%'
            )->orderBy('id', 'desc')->get();
        }elseif($description != null){
            $search_result = Business::where(
                    'description',
                    'like',
                    '%' . $search_keyword . '%'
                )->orderBy('id', 'desc')->get();
        }else{
            // default is searching by name
            $search_result = Business::where(
                'name',
                'like',
                '%' . $search_keyword . '%'
            )->orderBy('id', 'desc')->get();
        }
        return view('business.search-result')->with(['result'=>$search_result]);
        // return json_encode($search_result);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // i fetched the categories so that i can be able
        // to select one in the view
        $categories = Category::all();
        $data = ['categories' => $categories];
        return view('business.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:business|max:255',
            'email'=> 'required|max:255',
            'address'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'url' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $url = $request->input('url');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        // upload image here
        //Upload image1
        //Get just Filename with extension
        // $filenameWithExt = $request->file('image1')->getClientOriginalName();
        // //Get just Filename
        // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // //Get just extension
        // $extension = $request->file('image1')->getClientOriginalExtension();
        // $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        // $request->file('image1')->storeAs('business_images', $fileNameToStore);
        // no need to build this functionality
        // all businesses has a default image
        $save = Business::create(
            [
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'description' => $description,
                'url' => $url,
                'phone' => $phone,
                'mobile' => $mobile,
            ]);


        if($save){
            $business = Business::where('name',$name)->get();

            $business_id = $business[0]->id;
            Bridge::create(
                ['business_id'=> $business_id,
                'category_id'=> $category_id]
            );
            return redirect()->back()->with(['success' => 'Business Profile created Sucessfully']);
        } else {
            return redirect()->back()->with(['error' => 'Business Profile could not be created, Try again Later']);
        }
    }

    public function add_business_to_category(){
        $categories = Category::all();
        $businesses = Business::all();
        $data = [
            'categories' => $categories,
            'businesses' => $businesses
        ];
        return view('business.add-to-category')->with($data);
    }
    public function process_add_business_to_category(Request $request)
    {
        $this->validate($request, [
            'business_id' => 'required',
            'category_id' => 'required'
        ]);
        $business_id = $request->input('business_id');
        $category_id = $request->input('category_id');
        // check here checks whether we have the same business id and category id
        $check = Bridge::where('business_id','=',$business_id)
                            ->where('category_id', '=',$category_id )->get();

        if(count($check) > 0 ){
            // this means that the business is already allocated to the category
            return redirect()->back()->with(['error'=>'Business is already in that category']);
        }else{
            // here we assign the business to the category
            $save = Bridge::create(
                [
                    'business_id' => $business_id,
                    'category_id' => $category_id
                ]
            );
            if($save){
                return redirect()->back()->with(['success' => 'Business added to category Sucessfully']);
            } else {
                return redirect()->back()->with(['error' => 'Business could not be added to category, Try again Later']);
            }
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $business =  Business::find($id);
        if($business != null){
            return view('business.show')->with(['business' => $business]);
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories = Category::all();
        $business =  Business::find($id);
        $data = ['categories' => $categories,
                    'business' => $business
                ];

        return view('business.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        $this->validate($request, [
            'name' => 'required|unique:business|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'url' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
        ]);
        $business->name = $request->input('name');
        $business->email = $request->input('email');
        $business->address = $request->input('address');

        $business->description = $request->input('description');
        $business->url = $request->input('url');
        $business->phone = $request->input('phone');
        $business->mobile = $request->input('mobile');

        $save = $business->save();

        $category_id = $request->input('category_id');


        if ($save) {
            // i want to also update the bridge record
            $business = Bridge::where('business_id', $id)
                        ->where('category_id' , $category_id)->get();
            $business->category_id = $category_id;
            return redirect()->back()->with(['success' => 'Business Updated Sucessfully']);
        } else {
            return redirect()->back()->with(['error' => 'Business could not be updated, Try again Later']);
        }
    }
    public function view_count($id)
    {
        // view count business listing
        $business = Business::find($id);
        if ($business != null) {
            $business->views = $business->views + 1;
            $save_count = $business->save();
            if ($save_count == true) {
                return redirect('business/show/'. $id);
            }
        } else {
            return redirect('/')->back();
        }
    }
    public function activate(Request $request, $id)
    {
        // deactivate business listing
        $business = Business::find($id);
        if ($business != null) {
            $business->deactivate = false;
            $deactivate = $business->save();
            if ($deactivate == true) {
                $data = [
                    'success' => 'Business Activated Successfully'
                ];
                return redirect('/')->with($data);
            } else {
                $data = [
                    'error' => 'Could not activate, Try again later'
                ];
                return redirect('/')->with($data);
            }
        } else {
            return redirect()->back();
        }
    }
    public function deactivate(Request $request,$id){
        // deactivate business listing
        $business = Business::find($id);
        if ($business != null) {
            $business->deactivate = true;
            $deactivate = $business->save();
            if ($deactivate == true) {
                $data = [
                    'success' => 'Business Deactivated Successfully'
                ];
                return redirect('/')->with($data);
            } else {
                $data = [
                    'error' => 'Could not deactivate, Try again later'
                ];
                return redirect('/')->with($data);
            }
        } else {
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // i actually do soft delete
        $business = Business::find($id);
        if ($business != null) {
            $delete_data = $business->destroy($id);
            if ($delete_data == true) {
                $data = [
                    'success' => 'Business Deleted Successfully'
                ];
                return redirect('/')->with($data);
            } else {
                $data = [
                    'error' => 'Could not delete, Try again later'
                ];
                return redirect('/')->with($data);
            }
        } else {
            return redirect()->back();
        }
    }
}
