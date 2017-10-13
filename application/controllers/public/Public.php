<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Public extends Public_Controller {
public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
                        /* Load Template */
            $this->template->user_render('public/principal/index', $this->data);
            //redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('auth/login', 'refresh');
            /* Load Template */

            //$this->template->user_render('public/principal/index', $this->data);
        }
	}
}