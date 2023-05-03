<?php

class Template

{

    protected $_ci;

    function __construct()

    {

        $this->_ci = &get_instance();
    }

    function loadViews($content, $data = NULL)

    {

        /*

     * */

        $data['header'] = $this->_ci->load->view('layout/Header', $data, TRUE);

        $data['content'] = $this->_ci->load->view($content, $data, TRUE);

        $data['js'] = $this->_ci->load->view('layout/Js', $data, TRUE);



        $this->_ci->load->view('layout/App', $data);
    }
}
