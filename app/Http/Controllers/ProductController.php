<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Product;
use App\Models\Order;
use Auth;

class ProductController extends Controller
{
    public function getProduct($name) {
        $game = Game::where('nickname', '=', $name)->get();
        $products = Product::where('game_id', '=', $game[0]['id'])->get();
        return view('product', ['products'=>$products, 'game'=>$game[0]['name']]);
    }

    public function order(Request $request) {
        $validatedData = $request->validate([
            'product' => 'required',
        ]);

        $order = new Order();
        $id = strtoupper(Str::random(6));
        $order->id = $id;
        $order->product_id = $request->input('product');
        $order->in_game_uid = $request->input('uid');
        $order->phone_number = $request->input('phone');
        $order->save();

        return redirect()->route('pembayaran', ['id'=>$id]);
    }

    public function bayar($id) {
        $order = Order::where('id', '=', $id)->get();
        $product = Product::where('id', '=', $order[0]['product_id'])->get();
        $game = Game::where('id', '=', $product[0]['game_id'])->get();

        return view('pembayaran', [
            'id'=>$id,
            'game'=>$game[0]['name'],
            'product'=>$product[0]['type'],
            'price'=>$product[0]['price'],
        ]);
    }

    public function formUbah($id) {
        $order = Order::where('id', '=', $id)->get();
        $product = Product::where('id', '=', $order[0]['product_id'])->get();
        $game = Game::where('id', '=', $product[0]['game_id'])->get();
        $products = Product::where('game_id', '=', $game[0]['id'])->get();

        return view('ubah', ['products'=>$products, 'game'=>$game[0]['name'], 'id'=>$id]);
    }

    public function ubah(Request $request, $id) {
        $order = Order::findOrFail($id, 'id');

        $order->product_id = $request->input('product');
        $order->in_game_uid = $request->input('uid');
        $order->phone_number = $request->input('phone');
        $order->save();

        return redirect()->route('pembayaran', ['id'=>$id]);
    }

    public function cari(Request $request) {
        $id = $request->input('orderan');
        $order = Order::find($id, 'id');
        if ($order === null) {
            return view('gaorder');
        } else {
            return redirect()->route('pembayaran', ['id'=>$id]);
        }
    }

    public function cancel($id) {
        $order = Order::findOrFail($id, 'id');
        $order->delete();

        return redirect('');
    }

    public function index() {
        $prods = Product::where('game_id', '=', 1)->get();
        if (request()->segment(1) == 'api') return response()->json([
            'error' => false,
            'list' => $prods,
        ]);
        return 'asdadad';
    }

    public function getProduct_f($id) {
        $products = Product::where('game_id', '=', $id)->get();

        return response()->json($products);
    }

    public function order_f(Request $request) {
        $order = new Order();
        $id = strtoupper(Str::random(6));
        $order->id = $id;
        $order->product_id = $request->input('product');
        $order->in_game_uid = $request->input('uid');
        $order->user_id = $request->input('user');
        $order->save();

        return response()->json(['id' => $id, 'product_id' => $order->product_id, 'in_game_uid' => $order->in_game_uid, 'user_id' => $order->user_id]);
    }

    public function bayar_f($id) {
        $order = Order::where('id', '=', $id)->get();
        $product = Product::where('id', '=', $order[0]['product_id'])->get();
        $game = Game::where('id', '=', $product[0]['game_id'])->get();

        $response = [['order' => $order, 'product' => $product, 'game' => $game, 'order_id' => $id]];
        return response()->json($response);
    }

    public function ubah_f(Request $request, $id) {
        $order = Order::findOrFail($id, 'id');

        $order->product_id = $request->input('product');
        $order->in_game_uid = $request->input('uid');
        $order->user_id = $request->input('user');
        $order->save();

        return response()->json(['id' => $id, 'product_id' => $order->product_id, 'in_game_uid' => $order->in_game_uid, 'user_id' => $order->user_id]);
    }

    public function cancel_f($id) {
        $order = Order::findOrFail($id, 'id');
        $order->delete();

        $response = ['status'=>200, 'message'=>'Delete successfully'];
        return $response;
    }

    public function histori($id) {
        $order = Order::where('user_id', '=', $id)->get();
        
        foreach ($order as $or) {
            $product = Product::where('id', '=', $or['product_id'])->get();
            $game = Game::where('id', '=', $product[0]['game_id'])->get();

            $or->product = $product;
            $or->game = $game;
        }

        return response()->json($order);
    }
}
