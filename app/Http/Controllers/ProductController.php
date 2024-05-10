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
    public function getProduct_f($name) {
        $game = Game::where('nickname', '=', $name)->get();
        $products = Product::where('game_id', '=', $game[0]['id'])->get();

        $response = [
            'status' => 200,
            'user' => auth()->user(),
            'products' => $products,
            'game' => $game[0]['name'],
            'message' => 'Successful'
        ];
        if (request()->wantsJson()) {
            return response()->json($response);
        }
        return view('product', ['products'=>$products, 'game'=>$game[0]['name'], 'user'=>auth()->user()]);
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

    public function order(Request $request) {
        $validatedData = $request->validate([
            'product' => 'required',
        ]);

        $user = auth()->user();
        $order = new Order();
        $id = strtoupper(Str::random(6));
        $order->id = $id;
        $order->product_id = $request->input('product');
        $order->in_game_uid = $request->input('uid');
        $order->user_id = $user->id;
        $order->save();

        return redirect()->route('pembayaran', ['id' => $id, 'product_id' => $order->product_id, 'in_game_uid' => $order->in_game_uid, 'user_id' => $order->user_id, 'user' => auth()->user()]);
    }

    public function bayar($id) {
        $order = Order::where('id', '=', $id)->get();
        $product = Product::where('id', '=', $order[0]['product_id'])->get();
        $game = Game::where('id', '=', $product[0]['game_id'])->get();

        return view('pembayaran', [
            'id'=>$id,
            'uid'=>$order[0]['in_game_uid'],
            'game'=>$game[0]['name'],
            'product'=>$product[0]['type'],
            'price'=>$product[0]['price'],
            'user'=>auth()->user()
        ]);
    }

    public function formUbah($id) {
        $order = Order::where('id', '=', $id)->get();
        $product = Product::where('id', '=', $order[0]['product_id'])->get();
        $game = Game::where('id', '=', $product[0]['game_id'])->get();
        $products = Product::where('game_id', '=', $game[0]['id'])->get();

        return view('ubah', ['products'=>$products, 'game'=>$game[0]['name'], 'id'=>$id, 'user'=>auth()->user()]);
    }

    public function ubah(Request $request, $id) {
        $validatedData = $request->validate([
            'product' => 'required',
        ]);
        $order = Order::findOrFail($id, 'id');

        $order->product_id = $request->input('product');
        $order->in_game_uid = $request->input('uid');
        $order->save();

        return redirect()->route('pembayaran', ['id'=>$id]);
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

    public function histori() {
        $user = auth()->user();
        $order = Order::where('user_id', '=', $user->id)->get();
        
        foreach ($order as $or) {
            $product = Product::where('id', '=', $or['product_id'])->get();
            $game = Game::where('id', '=', $product[0]['game_id'])->get();

            $or->product = $product;
            $or->game = $game;
        }

        $response = ['status' => 200, 'user' => auth()->user(), 'order' => $order, 'message' => 'Successful'];
        if (request()->wantsJson()) {
            return response()->json($response);
        }
        return view('histori', [
            'order' => $order,
            'user' => auth()->user()
        ]);
    }
}
