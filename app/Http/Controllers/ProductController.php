<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Product;
use App\Models\Order;

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
}
