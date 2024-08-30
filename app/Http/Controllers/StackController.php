<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\Stack;
use Illuminate\Support\Facades\Log;

class StackController extends Controller
{
    public function index(){
        $stack = new Stack(5);
        $stack->push("First");
        $stack->push("Second");
        $stack->push("Third");

        $topItem = $stack->peek();

        $poppedItem = $stack->pop();

        return response(['status'=>'success','topItem'=>$topItem,'poppedItem'=>$poppedItem],200);
    }

    public function test(){
        return "shjsg";
    }
}
