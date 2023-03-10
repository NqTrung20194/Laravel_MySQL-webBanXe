<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\slide;
use App\Models\products;
use App\Models\type_products;
use App\Models\bills;
use App\Models\bill_detail;
use App\Models\customer;
use App\Models\users;
use Hash;
use Auth;
use Mail;
use Validator;
use App\cart;
use Session;
use removeItem;
use reduceByOne;


class MyController extends Controller
{
    public function getindex()
    {
    	$slide = slide::where("id_type", 0)->get();
    	$new_products= products::where("new",1)->paginate(4);
    	$pro_products= products::where("promotion_price", "!=",0)->paginate(4);
    	$products= products::where("unit_price", "!=",0)->paginate(4);
    	return view("NQT.trangchu", compact("slide","new_products","pro_products","products"));
    }

    
    

    public function slider()
    {
        $slide = slide::All();
       
        return view("NQT.slider", compact("slide"));
    }

    public function san_pham(Request $rq)
    {
        
        $tt  = products::where("id",$rq->id)->first();
        $view = $tt->view + 1 ;
        $update =  products::where("id",$rq->id)->update(["view" => $view]);
        $tt_sanpham  = products::where("id",$rq->id)->first();
        $sp_lienquan = products::where("id_type",$tt_sanpham->id_type)->paginate(3);
        $sale = products::orderBy('sale', 'desc')->paginate(5);
        $view = products::orderBy('view', 'desc')->paginate(5);
    	return view("NQT.ctsanpham", compact("tt_sanpham","sp_lienquan","sale","view"));
    }

    public function postsanpham(Request $req)
    {
        $id=$req->id;
        $qty=$req->soluong;
        if ($qty<=0) 
            { $qty=1;}
        else
            {$qty=$req->soluong;}

        $product = products::find($id);
        $oldcart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($product, $id,$qty);
        $req->session()->put('cart', $cart);
        return redirect()->back();
        
    }


    public function loai_san_pham($type)
    {
        $slide = slide::where("id_type", $type)->get();
        $sp_theoloai=products::where("id_type", $type)->paginate(3);
        $tenloai=type_products::where("id", $type)->first();
        $sp_khac=products::where("id_type","!=", $type)->paginate(3);
        $phan_loai=type_products::all();
    	return view("NQT.loaisp", compact("sp_theoloai","tenloai","sp_khac","phan_loai","slide"));
    }
    public function gioi_thieu()
    {
    	return view("NQT.gioithieu");
    }
    public function lien_he()
    {
        return view("NQT.lienhe");
    }

    public function getAddtoCart(Request $req, $id)
    {
        $tt  = products::where("id",$req->id)->first();
        $view = $tt->view + 1 ;
        $update =  products::where("id",$req->id)->update(["view" => $view]);
        $a=1;
        $product = products::find($id);
        $oldcart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($product, $id,$a);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function deletecarts(Request $req, $id)
    {   
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart    = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart',$cart);
        }
        return redirect()->back();
    }

    public function delall()
    {
        $cart =Session::get('cart');
        Session::forget('cart',$cart);
        return redirect()->back();
    }

    
    public function deleteallcarts(Request $req, $id)
    {   
       $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart    = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart',$cart);
        }
        return redirect()->back();
    }

    public function dathang()
    {
        if(Auth::check())
        {
            $user=users::where("id",Auth::user()->id)->first() ;
            return view ("NQT.dathang", compact("user"));
            
        }
        else{
            return view ("NQT.dathang");
        }        
    }
    public function getdathang(Request $rq)
    {
        $cart =Session::get('cart');

        $cus = new customer;
                $cus->name = $rq->name;
                $cus->gender = $rq->gender;
                $cus->email = $rq->email;
                $cus->address = $rq->address;
                $cus->phone_number = $rq->phone;
                $cus->note = $rq->notes;
                $cus->gender=$rq->gender;
                
                if ($cus->save())
        {    
            Mail::send('NQT.success', ['email' => $rq->email], function ($message) use($rq)
            {    
                $message->from('793f0efd78-9afcbe@inbox.mailtrap.io', 'Goodness Kayode');
                $message->to($rq->email);
            });
            
        }else{
            return redirect()->back()->withErrors($validator);
        }

            
        

        $bill = new bills;
        $bill->id_customer= $cus->id;
        $bill->date_order=date('Y-m-d');
        $bill->total= $cart->totalPrice;
        $bill->payment= $rq->payment_method;
        $bill->save();

        foreach ($cart->items as $k => $v) {
            $bill_Detail= new bill_detail;
            $bill_Detail->id_bill= $bill->id;
            $bill_Detail->id_product= $k;
            $bill_Detail->quantity=$v['qty'];
            $bill_Detail->unit_price=$v['price']/$v['qty'];
            $bill_Detail->save();
            $tt  = products::where("id",$bill_Detail->id_product)->first();
            $sale = $tt->sale + 1 ;
            $update =  products::where("id",$bill_Detail->id_product)->update(["sale" => $sale]);
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','?????t h??ng th??nh c??ng');
    }
    public function getdangki()
    {
        return view ("NQT.dangki");
    }

    public function postdangki(Request $rq)
    {
        $rq-> validate(
            [
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password',
            'fullname'=>'required'
            ],[
            'email.required'=>'Vui l??ng nh???p ?????a ch??? th??',
            'email.email'=>'?????a ch??? th?? kh??ng ????ng ?????nh d???ng',
            'email.unique'=>'Email n??y ???? c?? ng?????i d??ng',
            'password.required'=>'Vui l??ng nh???p password',
            'password.min'=>'password t???i thi???u 6 k?? t???',
            'password.max'=>'password t???i ??a 20 k?? t???',
            're_password.required'=>'Vui l??ng nh???p l???i password',
            're_password.same'=>'Password nh???p l???i kh??ng ????ng',
            'fullname.required'=>'Vui l??ng nh???p t??n ng?????i d??ng'
            ]);
        $user= new users;
        $user->full_name = $rq->fullname;
        $user->email = $rq->email;
        $user->password = Hash::make($rq->password);
        $user->phone = $rq->phone;
        $user->address = $rq->address;
        $user->save();

        return redirect()->back()->with("thongbao","????ng k?? th??nh c??ng");
    }

    public function getdangnhap()
    { return view('NQT.login');}

    public function postdangnhap( Request $req)
    { 
        $this-> validate($req,
            [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
            ],[
            'email.required'=>'Vui l??ng nh???p ?????a ch??? th??',
            'email.email'=>'?????a ch??? th?? kh??ng ????ng ?????nh d???ng',
            'password.required'=>'Vui l??ng nh???p password',
            'password.min'=>'password t???i thi???u 6 k?? t???',
            'password.max'=>'password t???i ??a 20 k?? t???'
            ]);
        $xacnhan = array('email'=>$req->email,'password'=>$req->password);
        if (Auth::attempt($xacnhan)) {
            return redirect()->back()->with(['matb'=>'1','noidung'=>'????ng nh???p th??nh c??ng']);}
        else
            {return redirect()->back()->with(['matb'=>'0','noidung'=>'????ng nh???p th???t b???i']);}
    }

    public function getdangxuat()
    {
        Auth::logout();
        return view('NQT.login');
    }

    public function getsearch(Request $req)
    {
        $product_search=Products::where('name','like','%'.$req->search.'%')
                        ->orwhere('unit_price',$req->search)
                        ->get();
        return view ('NQT.timkiem',compact('product_search'));
    }

    public function adduser()
    {
        return view ("NQT.adduser");
    }

    public function postadduser(Request $rq)
    {

        $rq-> validate(
            [
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password',
            'fullname'=>'required',
            'level'=>'required'
            ],[
            'email.required'=>'Vui l??ng nh???p ?????a ch??? th??',
            'email.email'=>'?????a ch??? th?? kh??ng ????ng ?????nh d???ng',
            'email.unique'=>'Email n??y ???? c?? ng?????i d??ng',
            'password.required'=>'Vui l??ng nh???p password',
            'password.min'=>'password t???i thi???u 6 k?? t???',
            'password.max'=>'password t???i ??a 20 k?? t???',
            're_password.required'=>'Vui l??ng nh???p l???i password',
            're_password.same'=>'Password nh???p l???i kh??ng ????ng',
            'fullname.required'=>'Vui l??ng nh???p t??n ng?????i d??ng',
            'level.required'=>'Vui l??ng ph??n quy???n User'
            ]);


        $user= new users;
        $user->full_name = $rq->fullname;
        $user->email = $rq->email;
        $user->password = Hash::make($rq->password);
        $user->phone = $rq->phone;
        $user->address = $rq->address;
        $user->level = $rq->level;
        $user->save();

        return redirect()->back()->with("thongbao","Th??m ng?????i d??ng th??nh c??ng");
    }

    public function admin()
    {
        if(Auth::check())
        {
            if (Auth::user()->lever <=2) {
                return view ("NQT.admin");
            }
            else {
        $slide = slide::All();
        $new_products= products::where("new",1)->paginate(4);
        $pro_products= products::where("promotion_price", "!=",0)->paginate(4);
        $products= products::where("unit_price", "!=",0)->paginate(4);
        return view("NQT.trangchu", compact("slide","new_products","pro_products","products"));}
            
        }
        else
            {return view ("NQT.login");}
    }

    public function listuser()
    {
        $listuser=users::all();

        return view ("NQT.listuser",compact('listuser'));
    }

    public function getedituser(Request $rq)
    {
        
        $tt_user  = users::where("id",$rq->id)->first();

        return view ("NQT.edituser",compact("tt_user"));
    }

    public function postedituser(Request $rq)
    {

        $rq-> validate(
            [
            'email'=>'required|email',
            'fullname'=>'required',
            'level'=>'required'

            ],[
            'email.required'=>'Vui l??ng nh???p ?????a ch??? th??',
            'email.email'=>'?????a ch??? th?? kh??ng ????ng ?????nh d???ng',
            'fullname.required'=>'Vui l??ng nh???p t??n ng?????i d??ng',
            'level.required'=>'Vui l??ng ph??n quy???n User'
            ]);
        $update=users::where("id",$rq->id)->update(["full_name" => $rq->fullname,"phone" => $rq->phone ,"email" => $rq->email,"address" => $rq->address,"level" => $rq->level]);

        $listuser=users::all();

        return view ("NQT.listuser",compact('listuser'));
    }

    public function deluser(Request $rq)
    {

        $deluser=users::where("id",$rq->id)->delete();

        $listuser=users::all();

        return view ("NQT.listuser",compact('listuser'));
    }

    public function listsanpham()
    {
        $products=products::where("unit_price", "!=",0)->paginate(4);;

        return view ("NQT.listsanpham",compact('products'));
    }

    public function delsp(Request $rq)
    {

        $delsp=products::where("id",$rq->id)->delete();

        return redirect()->back();
    }

    public function addsp()
    {
    return view ("NQT.addsanpham");
    }

    public function postaddsp(Request $rq)
    {
        $rq-> validate(
            [
            'name'=>'required|unique:products',
            'id_type'=>'required',
            'unit_price'=>'required',
            'image'=> 'required|file|mimes:jpg,jpeg,bmp,png,gif'
            
            ],[
            'name.required'=>'Vui l??ng nh???p t??n s???n ph???m',
            'name.unique'=>'T??n s???n ph???m n??y ???? c??',
            'unit_price.required'=>'Vui l??ng nh???p gi??',
            'id_type.required'=>'Vui l??ng ch???n lo???i s???n ph???m',
            'image.required'=>'Ch??a ch???n t???p tin h??nh',
            'name.mimes'=>'ch??? ch???n c??c file c?? ph???n m??? r???ng l??: jpg,jpeg,bmp,png,gif.'
            
            ]);

        $products= new products;

        if ($rq->promotion_price==null) {
            $products->promotion_price = 0;
        }
        $products->promotion_price = $rq->promotion_price;

        if ($rq->hasFile('image')) {
            $file= $rq->file('image');
            $fn=$file-> getClientOriginalName();
            $fn=time()."_".$fn;
            $file->move("source/image/product",$fn);
            $products->image =$fn;
        }
        else
            $products->image = "";

        if ($rq->new == "on") {
            $products->new = 1;
        }
        else
        {$products->new = 0;}

        if ($products->description == null) {
            $products->description = "";
        }
        $products->description = $rq->description;
        $products->name = $rq->name;
        $products->id_type = $rq->id_type;
        $products->unit_price = $rq->unit_price;        
        
        $products->save();

        return redirect()->back()->with("thongbao","Th??m s???n ph???m m???i th??nh c??ng");
    }

    public function editsp(Request $rq)
    {
        $tt_sp  = products::where("id",$rq->id)->first();

        return view ("NQT.editsanpham",compact("tt_sp"));
    }

    public function posteditsp(Request $rq)
    {
        $rq-> validate(
            [
            'name'=>'required',
            'id_type'=>'required',
            'unit_price'=>'required',
            'image'=> 'required|file|mimes:jpg,jpeg,bmp,png,gif'
            
            ],[
            'name.required'=>'Vui l??ng nh???p t??n s???n ph???m',
            'unit_price.required'=>'Vui l??ng nh???p gi??',
            'id_type.required'=>'Vui l??ng ch???n lo???i s???n ph???m',
            'image.required'=>'Ch??a ch???n t???p tin h??nh',
            'name.mimes'=>'ch??? ch???n c??c file c?? ph???n m??? r???ng l??: jpg,jpeg,bmp,png,gif.'
            
            ]);

        if ($rq->promotion_price==null) {
            $rq->promotion_price = 0;
        }
        if ($rq->hasFile('image')) {
            $file= $rq->file('image');
            $fn=$file-> getClientOriginalName();
            $fn=time()."_".$fn;
            $file->move("source/image/product",$fn);
        }
        else
            $fn = "";

        if ($rq->new == "on") {
            $rq->new = 1;}
        else
        {$rq->new = 0;}

        if ($rq->description == null) {
            $rq->description = "";
        }
        

        $update=products::where("id",$rq->id)->update(["name" => $rq->name,"id_type" => $rq->id_type ,"description"=> $rq->description,"unit_price" => $rq->unit_price,"promotion_price"=> $rq->promotion_price,"image"=> $fn, "new"=> $rq->new]);

        return redirect()->back()->with("thongbao","Th??m s???n ph???m m???i th??nh c??ng");
    }

    public function listloaisp()
    {
        $list=type_products::all();
        return view("NQT.listloaisp",compact("list"));
    }

    public function dellistloaisp(Request $rq)
    {

        $delid_type=type_products::where("id",$rq->id)->delete();

        return redirect()->back();
    }

    public function addidtype()
    {
        return view ("NQT.addid_type");
    }

    public function postaddidtype(Request $rq)
    {

        $rq-> validate(
            [
            'name'=>'required|unique:type_products',
            'description'=>'required',
            'image'=> 'required|file|mimes:jpg,jpeg,bmp,png,gif'
            ],[
            'name.required'=>'Vui l??ng nh???p t??n lo???i ',
            'name.unique'=>'T??n lo???i n??y ???? t???n t???i ',
            'description.required'=>'Vui l??ng nh???p m?? t??? ',
            'image.required'=>'Vui l??ng nh???p h??nh ???nh ',
            'image.required'=>'Ch??a ch???n t???p tin h??nh',
            'name.mimes'=>'ch??? ch???n c??c file c?? ph???n m??? r???ng l??: jpg,jpeg,bmp,png,gif.'
            ]);


        $type_products= new type_products;
        $type_products->name = $rq->name;
         $type_products->description = $rq->description;

         if ($rq->hasFile('image')) {
            $file= $rq->file('image');
            $fn=$file-> getClientOriginalName();
            $fn=time()."_".$fn;
            $file->move("source/image/product",$fn);
            $type_products->image =$fn;
        }
        else
            $type_products->image = "";

        $type_products->save();

        return redirect()->back()->with("thongbao","Th??m th??nh c??ng");
    }

    public function editidtype(Request $rq)
    {
        
        $tt_idtype  = type_products::where("id",$rq->id)->first();


        return view ("NQT.editidtype",compact("tt_idtype"));
    }

    public function posteditidtype(Request $rq)
    {

        $rq-> validate(
            [
            'name'=>'required',
            'description'=>'required',
             'image'=> 'required|file|mimes:jpg,jpeg,bmp,png,gif'
            ],[
            'name.required'=>'Vui l??ng nh???p t??n lo???i ',
            'description.required'=>'Vui l??ng nh???p m?? t??? ',
            'image.required'=>'Vui l??ng nh???p h??nh ???nh ',
            'image.required'=>'Ch??a ch???n t???p tin h??nh',
            'name.mimes'=>'ch??? ch???n c??c file c?? ph???n m??? r???ng l??: jpg,jpeg,bmp,png,gif.'
            ]);
        if ($rq->hasFile('image')) {
            $file= $rq->file('image');
            $fn=$file-> getClientOriginalName();
            $fn=time()."_".$fn;
            $file->move("source/image/product",$fn);
            
        }
        else
            $fn = "";
        $update=type_products::where("id",$rq->id)->update(["name" => $rq->name,"description"=> $rq->description,"image"=> $fn]);

        $list=type_products::all();
        return view("NQT.listloaisp",compact("list"));
    }

    public function listdh()
    {
        $list=bills::all();
        foreach ($list as $l) {
            $ten=customer::where("id",$l->id_customer)->first();
            Arr::add($l,'customer',$ten->name);
        }
        return view("NQT.qlidonhang", compact("list"));
    }

    public function eddh(Request $rq)
    {
        $st= bills::where("id",$rq->id)->update(["status"=>$rq->status]);

        return redirect()->back();
    }

    public function deldh(Request $rq)
    {

        $del=bills::where("id",$rq->id)->delete();

        return redirect()->back();
    }

    
}
