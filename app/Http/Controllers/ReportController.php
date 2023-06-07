<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Size;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getCustomer(){
        $com_code=auth()->user()->com_code;
        $customer=Customer::where('com_code',$com_code)->get();
        $data=Invoice::where('com_code',$com_code)->get();
        return view('reports.report-customer',['data'=>$data,'customer'=>$customer]);
    }

    public function ajaxCustomer (Request $request){
        if($request->ajax()){
            $com_code=auth()->user()->com_code;
            $code=$request->code;
            $name=$request->name;
            $start_at=$request->start_at;
            $end_at=$request->end_at;
            if ($start_at == null && $end_at==null) {
                if ($name != null) {
                    $data=Invoice::where('customer_id',$name)->where('com_code',$com_code)->get();
                    return view('reports.customerAjax',['data'=>$data]);
                } else {
                    $data=Invoice::where('com_code',$com_code)->get();
                    return view('reports.customerAjax',['data'=>$data]);
                }
            } else {

                if ($name != null) {
                    $data=Invoice::where('customer_id',$name)->where('com_code',$com_code)->whereBetween('date',[$start_at,$end_at])->get();
                    return view('reports.customerAjax',['data'=>$data]);

                } else {
                    $data=Invoice::whereBetween('date',[$start_at,$end_at])->where('com_code',$com_code)->get();
                    return view('reports.customerAjax',['data'=>$data]);
                }
            }
        }
    }
    public function getInvoice(){
        $com_code=auth()->user()->com_code;
        $data=Invoice::where('com_code',$com_code)->get();
        return view('reports.report-invoice',['data'=>$data]);
    }

    public function ajaxInvoice (Request $request){
        if($request->ajax()){
            $com_code=auth()->user()->com_code;
            $code=$request->code;
            $name=$request->name;
            $start_at=$request->start_at;
            $end_at=$request->end_at;
            if ($start_at == null && $end_at == null) {

            if ($name=='all') {
                $data=Invoice::where('com_code',$com_code)->get();

            return view('reports.invoiceAjax',['data'=>$data]);

            } else {
                    $data=Invoice::where('status',$name)->where('com_code',$com_code)->get();
                return view('reports.invoiceAjax',['data'=>$data]);
            }
            } else {
            if ($name=='all') {
                $data=Invoice::whereBetween('date',[$start_at,$end_at])->where('com_code',$com_code)->get();

            return view('reports.invoiceAjax',['data'=>$data]);

            } else {
                    $data=Invoice::whereBetween('date',[$start_at,$end_at])->where('status',$name)->where('com_code',$com_code)->get();
                return view('reports.invoiceAjax',['data'=>$data]);
            }
            }

        }
    }

    public function getFabrice(){
        $com_code=auth()->user()->com_code;
        $data=Invoice::where('com_code',$com_code)->get();
        return view('reports.report-fabrice',['data'=>$data]);
    }

    public function ajaxFabrice (Request $request){
        if($request->ajax()){
            $com_code=auth()->user()->com_code;
            $code=$request->code;
            $name=$request->name;
            $start_at=$request->start_at;
            $end_at=$request->end_at;
            $date=date('Y-m-d');
            if ($start_at == null && $end_at == null) {

            if ($name=='all') {
                $data=Invoice::where('com_code',$com_code)->get();

            return view('reports.fabrieAjax',['data'=>$data]);

            } else {
                if ($name==1) {
                    $data=Invoice::where('receved_data','<=',$date)->where('com_code',$com_code)->get();
                return view('reports.fabrieAjax',['data'=>$data]);
                } else {
                    $data=Invoice::where('receved_data','>',$date)->where('com_code',$com_code)->get();
                return view('reports.fabrieAjax',['data'=>$data]);
                }
            }
            } else {
            if ($name=='all') {
                $data=Invoice::whereBetween('date',[$start_at,$end_at])->where('com_code',$com_code)->get();

            return view('reports.fabrieAjax',['data'=>$data]);

            } else {
                if ($name==1) {
                    $data=Invoice::where('receved_data','<=',$date)->where('com_code',$com_code)->get();
                return view('reports.fabrieAjax',['data'=>$data]);
                } else {
                    $data=Invoice::where('receved_data','>',$date)->where('com_code',$com_code)->get();
                return view('reports.fabrieAjax',['data'=>$data]);
                }
            }


        }
    }


}
 }
