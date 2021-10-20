<?php
$this->load->view('admin/common/admin_header');
$this->load->view('admin/common/admin_menu');
$this->load->view($subview);
$this->load->view('admin/common/admin_footer');
?>