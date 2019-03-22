<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Person extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('person_model', 'person');
        }

        public function index(){
            $data = array(  
                'pages'     => 'person/person_view',
                'title'     => 'List Person',
                'breadcrumb'=> 'Person',
                'js'       => 'person/person_js');

                $this->load->view('main_view', $data);
        }

        public function listPerson(){
            $list = $this->person->get_datatables();
            $data = array();
            $no = 1;
            foreach ($list as $person) {
                $no++;
                $row = array();
                $row[] = $person->nama;
                $row[] = $person->gender;
                $row[] = $person->alamat;
                $row[] = $person->tgl_lahir;
    
                //add html for action
                $row[] = '<a class="btn bg-purple btn-xs btn-flat" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn bg-maroon btn-xs btn-flat" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="fa fa-trash"></i> Hapus</a>';
            
                $data[] = $row;
            }
 
            $output = array("data" => $data);
            
            echo json_encode($output);
        }
 
        public function edit($id){
            $data = $this->person->get_by_id($id);
            $data->tgl_lahir = ($data->tgl_lahir == '0000-00-00') ? '' : $data->tgl_lahir; // if 0000-00-00 set tu empty for datepicker compatibility
            echo json_encode($data);
        }
 
        public function tambah(){
            $tgl = $this->input->post('tgl_lahir');
            $tgl = implode("-", array_reverse(explode("/", $tgl)));
            $this->_validate();
            $data = array(
                    'nama' => $this->input->post('nama'),
                    'gender' => $this->input->post('gender'),
                    'alamat' => $this->input->post('alamat'),
                    'tgl_lahir' => $tgl
                );
            $insert = $this->person->simpan($data);
            echo json_encode(array("status" => TRUE));
        }
 
        public function update(){
            $tgl = $this->input->post('tgl_lahir');
            $tgl = implode("-", array_reverse(explode("/", $tgl)));
            $this->_validate();
            $data = array(
                'nama' => $this->input->post('nama'),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat'),
                'tgl_lahir' => $tgl
                );
            $this->person->update(array('id' => $this->input->post('id')), $data);
            echo json_encode(array("status" => TRUE));
        }
    
        public function delete($id)
        {
            $this->person->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
        }
    
    
        private function _validate()
        {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;
    
            if($this->input->post('nama') == '')
            {
                $data['inputerror'][] = 'nama';
                $data['error_string'][] = 'Nama harus diisi';
                $data['status'] = FALSE;
            }
    
            if($this->input->post('tgl_lahir') == '')
            {
                $data['inputerror'][] = 'tgl_lahir';
                $data['error_string'][] = 'Tanggal lahir harus diisi';
                $data['status'] = FALSE;
            }
    
            if($this->input->post('gender') == '')
            {
                $data['inputerror'][] = 'gender';
                $data['error_string'][] = 'Gender harus diisi';
                $data['status'] = FALSE;
            }
    
            if($this->input->post('alamat') == '')
            {
                $data['inputerror'][] = 'alamat';
                $data['error_string'][] = 'Alamat harus diisi';
                $data['status'] = FALSE;
            }
    
            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }
        }
    }
    
?>