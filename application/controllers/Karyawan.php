<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('karyawan_m');
    }

    public function index()
    {

        if ($this->session->userdata('authenticated')) {
            $data['data_karyawan'] = $this->db->get('data_karyawan')->result_array();

            $this->template->load('templates/index', 'data_karyawan/index', $data);
        } else {
            $this->load->view('auth/login');
        }
    }

    function tambah()
    {
        $this->db->insert(
            'data_karyawan',
            [
                'nm_karyawan' => $this->input->post('nama'),
                'usia_karyawan' => $this->input->post('usia'),
                'pendidikan' => $this->input->post('pendidikan'),
                'pengalaman' => $this->input->post('pengalaman'),
                'nilai_test' => $this->input->post('nilai_test')

            ]
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Calon Karyawan berhasil ditambah</div>');
        redirect('karyawan/index');
    }

    function hapus($id)
    {
        $tables = array('data_karyawan', 'nilai_derajat', 'rule_nilai');
        $this->db->where('id_karyawan', $id);
        $this->db->delete($tables);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Calon Karyawan berhasil diHapus Termasuk Nilai dan Proses Fuzzynya</div>');
        redirect('karyawan/index');
    }

    function edit($id)
    {
        $data['edit_karyawan'] = $this->karyawan_m->getId($id);

        $this->form_validation->set_rules('nm_karyawan', 'usia_karyawan', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/index', 'data_karyawan/editKaryawan', $data);
        } else {
            $this->karyawan_m->editKaryawan($id);
            $this->karyawan_m->hapusFuzzy($id);
            $this->karyawan_m->hapusNilaiFuzzy($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Edit Berhasil</div>');
            redirect('karyawan');
        }
    }

    public function pdf()
    {
        $pdf = new \TCPDF();
        $pdf->AddPage('L', 'mm', 'A4');
        $pdf->SetFont('', 'B', 14);
        $pdf->Cell(277, 10, "DATA CALON KARYAWAN", 0, 1, 'C');
        $pdf->SetAutoPageBreak(true, 0);

        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(20, 8, "No", 1, 0, 'C');
        $pdf->Cell(40, 8, "ID Karyawan", 1, 0, 'C');
        $pdf->Cell(50, 8, "Nama Karyawan", 1, 0, 'C');
        $pdf->Cell(40, 8, "Usia", 1, 0, 'C');
        $pdf->Cell(40, 8, "Pendidikan", 1, 0, 'C');
        $pdf->Cell(40, 8, "Pengalaman", 1, 0, 'C');
        $pdf->Cell(40, 8, "Nilai Test", 1, 1, 'C');



        $pdf->SetFont('', '', 12);
        $data['row'] = $this->karyawan_m->getExp()->result();
        $no = 0;
        foreach ($data['row'] as $lapItem) {
            $no++;
            $pdf->Cell(20, 8, $no, 1, 0, 'C');
            $pdf->Cell(40, 8, $lapItem->id_karyawan, 1, 0);
            $pdf->Cell(50, 8, $lapItem->nm_karyawan, 1, 0);
            $pdf->Cell(40, 8, $lapItem->usia_karyawan, 1, 0);
            $pdf->Cell(40, 8, $lapItem->pendidikan, 1, 0);
            $pdf->Cell(40, 8, $lapItem->pengalaman, 1, 0);
            $pdf->Cell(40, 8, $lapItem->nilai_test, 1, 1);
        }

        $pdf->SetFont('', 'B', 10);
        $pdf->Cell(277, 10, "Data Calon Pegawai PT. Global Fashion Garment", 0, 1, 'L');

        $pdf->Output('Laporan-DataCalon.pdf');
    }

    public function excel()
    {
        $data['row'] = $this->karyawan_m->getExp()->result();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("PT. Global Fashion Garment");
        $object->getProperties()->setLastModifiedBy("PT. Global Fashion Garment");
        $object->getProperties()->setTitle("Data Calon Karyawan");

        $object->setActiveSheetIndex(0);

        $object->getActiveSheet()->setCellValue('A1', 'Data Calon Karyawan PT. Global Fashion Garment');

        $object->getActiveSheet()->setCellValue('A3', 'No');
        $object->getActiveSheet()->setCellValue('B3', 'ID Karyawan');
        $object->getActiveSheet()->setCellValue('C3', 'Nama Karyawan');
        $object->getActiveSheet()->setCellValue('D3', 'Usia');
        $object->getActiveSheet()->setCellValue('E3', 'Pendidikan');
        $object->getActiveSheet()->setCellValue('F3', 'Pengalaman');
        $object->getActiveSheet()->setCellValue('G3', 'Nilai Test');

        $baris = 4;
        $no = 1;

        foreach ($data['row'] as $oKar) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $oKar->id_karyawan);
            $object->getActiveSheet()->setCellValue('C' . $baris, $oKar->nm_karyawan);
            $object->getActiveSheet()->setCellValue('D' . $baris, $oKar->usia_karyawan);
            $object->getActiveSheet()->setCellValue('E' . $baris, $oKar->pendidikan);
            $object->getActiveSheet()->setCellValue('F' . $baris, $oKar->pengalaman);
            $object->getActiveSheet()->setCellValue('G' . $baris, $oKar->nilai_test);

            $baris++;
        }

        $filename = "'Data_CalonKaryawan" . ".xlsx'";

        $object->getActiveSheet()->setTitle("Data CalonKaryawan");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Context-Disposition: attachment; filename"' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
