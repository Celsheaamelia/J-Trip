<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use App\Models\DetailTiket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TiketController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->periode ?? 'harian';
        $search = $request->search;

        $query = Tiket::with(['user', 'wisata', 'detailTiket']);

        if ($periode == 'harian') {
            $query->whereDate('dibuat_pada', Carbon::today());
        } elseif ($periode == 'mingguan') {
            $query->whereBetween('dibuat_pada', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]);
        } elseif ($periode == 'bulanan') {
            $query->whereMonth('dibuat_pada', Carbon::now()->month)
                  ->whereYear('dibuat_pada', Carbon::now()->year);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_booking', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($user) use ($search) {
                      $user->where('name', 'like', "%{$search}%")
                           ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('wisata', function ($wisata) use ($search) {
                      $wisata->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $tickets = $query->latest('dibuat_pada')->paginate(10);

        $baseQuery = Tiket::query();

        $totalBooking = (clone $baseQuery)->count();
        $pending = (clone $baseQuery)->where('status', 'pending')->count();
        $paid = (clone $baseQuery)->where('status', 'paid')->count();
        $used = (clone $baseQuery)->where('status', 'used')->count();

        return view('admin.tiket.index', compact(
            'tickets',
            'totalBooking',
            'pending',
            'paid',
            'used',
            'periode',
            'search'
        ));
    }

    public function show($id)
    {
        $ticket = Tiket::with(['user', 'wisata', 'detailTiket'])
            ->where('id_tiket', $id)
            ->firstOrFail();

        return view('admin.tiket.show', compact('ticket'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,used',
        ]);

        $ticket = Tiket::where('id_tiket', $id)->firstOrFail();
        $ticket->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status tiket berhasil diperbarui');
    }

    public function destroy($id)
    {
        $ticket = Tiket::where('id_tiket', $id)->firstOrFail();

        DetailTiket::where('id_tiket', $ticket->id_tiket)->delete();
        $ticket->delete();

        return back()->with('success', 'Tiket berhasil dihapus');
    }
}
