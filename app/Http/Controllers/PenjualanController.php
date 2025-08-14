<?php
namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Produk;
use App\Models\Pelanggan;
use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\BackupGlobals;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan', ['title' => 'penjualan', 'data' => Penjualan::latest()->get()]);
    }

    public function show(Penjualan $penjualan)
    {
        $data = [
            'penjualan' => $penjualan,
            'details' => $penjualan->DetailPenjualan,
            'title' => 'detail penjualan - ' . $penjualan->TanggalPenjualan
        ];
        return view('detail-penjualan', $data);
    }

    public function pdf()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('download-pdf', ['title' => 'penjualan','data' => Penjualan::all()]));
        $dompdf->render();
        $dompdf->stream('penjualan.pdf'); //, array('Attachment' => false)
    }

    public function create(){
        $data = [
            'title' => 'tambah penjualan',
            'pelanggan' => Pelanggan::all(),
            'produk' => Produk::all(),
            'penjualan' => Penjualan::all()
        ];

        return view('create-penjualan', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan' => ['required'],
            'produk' => ['required'],
            'jumlah' => ['required'],
            // 'satuan' => ['required']
        ]);
        // dd($request->satuan);

        // cek stok (chatgpt)
        // $produk = Produk::find($request->produk);
        // dd($produk);

        // if ($request->produk > $produk->Stok) {
        //     return back()->with('notif', 'stok tidak mencukupi');
        // }

        $produk = Produk::WHERE('id', $request->produk)->first();

        $penjualan = Penjualan::create([
            'TanggalPenjualan' => now(),
            'TotalHarga' => $request->jumlah * $produk->Harga,
            'PenggunaID' => $request->pengguna,
            'PelangganID' => $request->pelanggan,
        ]);


        DetailPenjualan::create([
            'PenjualanID' => $penjualan->id,
            'ProdukID' => $request->produk,
            'JumlahProduk' => $request->jumlah,
            'Subtotal' => $produk->Harga * $request->jumlah
        ]);

        return redirect('penjualan')->with('notif', 'tambah penjualan berhasil');

    }

    public function delete(Penjualan $penjualan)
    {
        Penjualan::WHERE('id', $penjualan->id)->DELETE();

        return redirect('penjualan')->with('success', 'Hapus Data Berhasil');
    }

    // public function view_pdf()
    // {
    //     try {
    //         // Opsi 1: Tanpa konfigurasi khusus
    //         $mpdf = new Mpdf();
            
    //         // Opsi 2: Dengan konfigurasi (jika diperlukan)
    //         // $mpdf = new Mpdf([
    //         //     'mode' => 'utf-8',
    //         //     'format' => 'A4',
    //         //     'orientation' => 'P'
    //         // ]);

    //         $html = '<h1>Hello world!</h1>';
    //         $mpdf->WriteHTML($html);
            
    //         // Output ke browser
    //         return $mpdf->Output('document.pdf', 'I');
            
    //         // Alternatif output:
    //         // $mpdf->Output('document.pdf', 'D'); // Download
    //         // $mpdf->Output('path/to/file.pdf', 'F'); // Save to file
            
    //     } catch (\Mpdf\MpdfException $e) {
    //         return response()->json(['error' => 'PDF generation failed: ' . $e->getMessage()], 500);
        // }
    // }
}