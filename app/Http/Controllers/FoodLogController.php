<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FoodLogController extends Controller
{
    /**
     * Menampilkan halaman tambah makanan.
     */
    public function create()
    {
        $foods = Food::orderBy('name')->get();

        return view('food-log.create', compact('foods'));
    }

    /**
     * Menyimpan log makanan.
     */
    public function store(Request $request)
    {
        Log::info('FoodLogController@store dipanggil', [
            'user_id' => Auth::id(),
            'time' => now()->toDateTimeString(),
        ]);

        $validated = $request->validate([
            'food_id'     => 'required|exists:foods,id',
            'quantity'    => 'required|numeric|min:1',
            'consumed_at' => 'required|date',
        ]);

        FoodLog::create([
            'user_id'     => Auth::id(),
            'food_id'     => $validated['food_id'],
            'quantity'    => $validated['quantity'],
            'consumed_at' => $validated['consumed_at'],
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Data makanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan seluruh riwayat makanan user.
     */
    public function index()
    {
        $logs = FoodLog::with('food')
            ->where('user_id', Auth::id())
            ->orderBy('consumed_at', 'desc')
            ->paginate(10);

        return view('food-log.index', compact('logs'));
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(FoodLog $foodLog)
    {
        // Pastikan hanya pemilik data yang bisa edit
        if ($foodLog->user_id != Auth::id()) {
            abort(403);
        }

        $foods = Food::orderBy('name')->get();

        return view('food-log.edit', [
            'foods' => $foods,
            'foodLog' => $foodLog,
        ]);
    }

    /**
     * Update riwayat makanan.
     */
    public function update(Request $request, FoodLog $foodLog)
    {
        if ($foodLog->user_id != Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'food_id'     => 'required|exists:foods,id',
            'quantity'    => 'required|numeric|min:1',
            'consumed_at' => 'required|date',
        ]);

        $foodLog->update([
            'food_id'     => $validated['food_id'],
            'quantity'    => $validated['quantity'],
            'consumed_at' => $validated['consumed_at'],
        ]);

        return redirect()
            ->route('food-log.index')
            ->with('success', 'Riwayat makanan berhasil diperbarui.');
    }

    /**
     * Menghapus riwayat makanan.
     */
    public function destroy(FoodLog $foodLog)
    {
        if ($foodLog->user_id != Auth::id()) {
            abort(403);
        }

        $foodLog->delete();

        return redirect()
            ->route('food-log.index')
            ->with('success', 'Riwayat makanan berhasil dihapus.');
    }
}