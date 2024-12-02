<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MhsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Form_mhs extends BaseController
{
    public function index()
    {
        $data = [
            'titles' => 'Form Input'
        ];
        return view('admin/form_mhs', $data);
    }
 
    public function store() {
        $Mhs_model = new MhsModel();

        $fileFoto = $this->request->getFile('image');
        $namaFile = $fileFoto->getRandomName();
        $fileFoto->move('img', $namaFile);
        // $namaFile = $fileFoto->getName();

        $data = [
            'npm' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => $namaFile,
            'create_date' => $this->request->getPost('create_date')
        ]; 


        

        
        $Mhs_model->insert($data);
        
        session()->setFlashdata('berhasil', 'Data Mahasiswa berhasil di tambahkan');

        return redirect()->to('admin/home');
    }
    

    public function edit($id_mhs){
        $Mhs_model = new MhsModel();

        $data = [
            'titles' => 'Edit Data',
            'mhs'   => $Mhs_model->find($id_mhs)
        ];
        return view('admin/edit_mhs', $data);
    }
    
    public function update($id_mhs){
        $Mhs_model = new MhsModel();


   // Cek apakah ada file gambar yang diunggah
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
       // Simpan file ke folder uploads
       $newName = $file->getRandomName();
       $file->move('img', $newName);



       // Hapus gambar lama jika ada
       $oldImage = $Mhs_model->find($id_mhs)['foto'];
       if ($oldImage && file_exists('img/' . $oldImage)) {
           unlink('img/' . $oldImage['foto']);
        }
    }


        $data = [
            'npm' => $this->request->getPost('npm'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'email' => $this->request->getPost('email'),
            'foto' => $newName,
            'create_date' => $this->request->getPost('create_date')
        ];


 

        $Mhs_model->update($id_mhs, $data);

        return redirect()->to('admin/home')->with('berhasil', 'data berhasil di update');

    }

    public function delete($id_mhs){
        $Mhs_model = new MhsModel();



        $data = $Mhs_model->find($id_mhs);
        // $mhs = $Mhs_model->where('email');

        if($data){
            unlink('img/' . $data['foto']);
            $Mhs_model->delete($id_mhs);
            return redirect()->to('admin/home')->with('delete', 'berhasil delete');
        }

       
    }

    public function export(){
        $Mhs_model = new MhsModel();
        $data_mhs = $Mhs_model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'NPM');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Alamat');
        $sheet->setCellValue('D1', 'Tanggal Lahir');
        $sheet->setCellValue('E1', 'Jenis Kelamin');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Tanggal Input');


        $row = 2;
        foreach ($data_mhs as $data) {
            $sheet->setCellValue('A' . $row, $data['npm']);
            $sheet->setCellValue('B' . $row, $data['nama']);
            $sheet->setCellValue('C' . $row, $data['alamat']);
            $sheet->setCellValue('D' . $row, $data['tanggal_lahir']);
            $sheet->setCellValue('E' . $row, $data['jenis_kelamin']);
            $sheet->setCellValue('F' . $row, $data['email']);
            $sheet->setCellValue('G' . $row, $data['create_date']);
            

            if (!empty($data['foto']) && file_exists('img/' . $data['foto'])) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setPath('img/' . $data['foto']); // Path gambar
                $drawing->setCoordinates('H' . $row); // Posisi gambar di Excel
                $drawing->setHeight(50); // Tinggi gambar (opsional)
                $drawing->setWorksheet($sheet); // Menambahkan gambar ke worksheet
                $sheet->getColumnDimension('H')->setWidth(15);
            }

            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $namaFile = 'Data Mahasiswa.xlsx';


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $namaFile . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
    public function pdf(){
        $Mhs_model = new MhsModel();
        $data_mhs = $Mhs_model->findAll();

        $html = '
        <h2>Data Mahasiswa</h2>
        <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Tanggal Input</th>
                </tr>
            </thead>
            <tbody>';
            foreach ($data_mhs as $data) {
                $foto = base_url('img/' . $data['foto']);
                $html .= '<tr>
                    <td>' . $data['npm'] . '</td>
                    <td>' . $data['nama'] . '</td>
                    <td>' . $data['alamat'] . '</td>
                    <td>' . $data['tanggal_lahir'] . '</td>
                    <td>' . $data['jenis_kelamin'] . '</td>
                    <td>' . $data['email'] . '</td>
                    <td><img src="'. $foto .'" width="50"></td>
                    <td>' . $data['create_date'] . '</td>
                </tr>';
            }

            $html .= '</tbody>
            </table>';


            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);


            $dompdf->setPaper('A4', 'landscape');

            $dompdf->render();

            $dompdf->stream("Data_Mahasiswa.pdf", ["Attachment" => false]);
    }


}

