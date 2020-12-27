<?php 
class Report_abs extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('report_abs_m');
    }

    function index(){  
      //echo $this->uri->segment(5);
      //echo $this->input->get('nik');
        // if('2020'=='2020'){
        //   $get_nik = $this->report_abs_m->get_data_all_where('2020')->result();
        // }else{
        //   $get_nik = $this->report_abs_m->get_data_all()->result();
        // }
        $get_nik = $this->report_abs_m->get_data_all()->result();
        $data['get_nik']      = $this->report_abs_m->get_data_all_nik()->result();
        $data['info_absensi'] = $this->report_abs_m->get_info_report_absensi()->row();
        $data['title']			  = "Reports Absensi".$this->uri->segment(3);
        $data['title_page']		= "Reports Absensi";
        $data['page_content'] = "report_absensi_v";
        $data['get_data']     = $get_nik;
        $this->load->view('utama_v', $data);
    }

    function generate_abs(){
      $nik = $this->input->post('nik');
      $date = $this->input->post('date');
      // echo $nik; 
      $this->report_abs_m->delete_templet_report_absensi();
      $this->report_abs_m->insert_templet_report_absensi($nik,$date);
      $this->report_abs_m->update_report_absensi($nik);
      $this->report_abs_m->update_report_cuti($nik);
      $this->report_abs_m->update_sick($nik);
      $this->report_abs_m->update_national_holiday($nik);
      $this->report_abs_m->update_remarks();
      redirect ('report_abs');
    }

    public function export(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
    
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
                     ->setLastModifiedBy('My Notes Code')
                     ->setTitle("Data Absensi")
                     ->setSubject("Absensi")
                     ->setDescription("Laporan Semua Data Absensi")
                     ->setKeywords("Data Absensi");
    
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
    
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
    
        // $objDrawing = new PHPExcel_Worksheet_Drawing();
        // $objDrawing->setName('Ceklis Img');
        // $objDrawing->setDescription('Ceklis');
        // $ceklis='./assets/img/logo.png';
        // $objDrawing->setPath($ceklis);

        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('test_img');
        $objDrawing->setDescription('test_img');
        $objDrawing->setPath('./assets/img/logo.png');
        $objDrawing->setCoordinates('A1');                      
        //setOffsetX works properly
        $objDrawing->setOffsetX(5); 
        $objDrawing->setOffsetY(5);                
        //set width, height
        $objDrawing->setWidth(208); 
        $objDrawing->setHeight(56); 
        $objDrawing->setWorksheet($excel->getActiveSheet());



        $excel->setActiveSheetIndex(0)->setCellValue('A4', "Professional Services - Timesheet"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A4:F4'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A4')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        $row_employee = $this->report_abs_m->get_data_employe()->row();
        // data karyawan
        $excel->setActiveSheetIndex(0)->setCellValue('A6', "Duration"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('B6', date('M Y', strtotime($row_employee->date))); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('A7', "Name"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('B7', $row_employee->name); // Set kolom A1 dengan tulisan "DATA SISWA"

        $excel->setActiveSheetIndex(0)->setCellValue('E6', "Client Name"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('F6', $row_employee->client_name); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('E7', "NIK"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('F7', "`".$row_employee->nik); // Set kolom A1 dengan tulisan "DATA SISWA"

        // Buat header tabel nya pada baris ke 3
        // $excel->setActiveSheetIndex(0)->setCellValue('A9', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('A9', "DATE"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('B9', "DAY"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('C9', "CLOCK IN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('D9', "CLOCK OUT"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('E9', "ACTIVITY"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F9', "REMARKS"); // Set kolom E3 dengan tulisan "ALAMAT"
        //$excel->setActiveSheetIndex(0)->setCellValue('H3', "REMARKS"); // Set kolom E3 dengan tulisan "ALAMAT"
    
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A9')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B9')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C9')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D9')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E9')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F9')->applyFromArray($style_col);
        // $excel->getActiveSheet()->getStyle('G9')->applyFromArray($style_col);
        //$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $absensi = $this->report_abs_m->get_data_all()->result();
    
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 10; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach($absensi as $data){ // Lakukan looping pada variabel siswa
          // $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->date);
          $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->day);
          $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->clock_in);
          $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->clock_out);
          $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->activity);
          $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->remarks);
          //$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->activity);
          
          
          // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
          // $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
          $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
          //$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);

          $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
    
        // Set width kolom
        // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(15); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom D
        //$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E

        // data karyawan
        $excel->setActiveSheetIndex(0)->setCellValue('B43', "Disetujui oleh"); // Set kolom A1 dengan tulisan "DATA SISWA"
        // $excel->setActiveSheetIndex(0)->setCellValue('B6', date('M Y', strtotime($row_employee->date))); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('E43', "Dibuat oleh"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('E46', $row_employee->name); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->setActiveSheetIndex(0)->setCellValue('E47', $row_employee->position); // Set kolom A1 dengan tulisan "DATA SISWA"
        
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Absensi");
        $excel->setActiveSheetIndex(0);
        
        $date = date("d-M-Y");
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Absensi.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
    
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');

        redirect ('report_abs');
      }
}


?>