        public function resize($path, $file)
        {
            $config['image_library'] = 'gd2';
            $config['source_image']	= $path;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 200;
            $config['height'] = 200;
            $config['new_image'] = './images/'.$file;

            $this->image_lib->initialize($config);
            $this->image_lib->resize();

        }
        if( !$this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('picture', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload-data());
            
            $this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
            
            $this->load->view('upload_success', $data);
        }

