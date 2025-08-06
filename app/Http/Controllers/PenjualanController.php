<?php
namespace App\Http\Controllers;

use App\Models\Penjualan;
use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan', ['title' => 'penjualan', 'data' => Penjualan::all()]);
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