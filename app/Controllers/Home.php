<?php

namespace App\Controllers;

use CodeIgniter\Models\Controller;
use App\Models\M_model;

class Home extends BaseController
{
	public function index()
	{
		if(session()->get('level')>0){
		$model = new M_model();
		echo view('header');
		echo view('menu');
		echo view('dash');
		echo view('footer');
		}else{
		return redirect()->to('Home/dashboard');
	}
	}
	public function editsetting()
{
    $model = new M_model();
    $a = $this->request->getPost('namaWeb');
    $icon = $this->request->getFile('iconTab');
    $dash = $this->request->getFile('logoDash');
    $login = $this->request->getFile('logoLogin');

    // Debugging: Log received data
    log_message('debug', 'Website Name: ' . $a);
    log_message('debug', 'Tab Icon: ' . ($icon ? $icon->getName() : 'None'));
    log_message('debug', 'Dashboard Icon: ' . ($dash ? $dash->getName() : 'None'));
    log_message('debug', 'Login Icon: ' . ($login ? $login->getName() : 'None'));

    $data = ['nama_website' => $a];

    if ($icon && $icon->isValid() && !$icon->hasMoved()) {
        $icon->move(ROOTPATH . 'public/img/', $icon->getName());
        $data['icon_logo'] = $icon->getName();
    }

    if ($dash && $dash->isValid() && !$dash->hasMoved()) {
        $dash->move(ROOTPATH . 'public/img/', $dash->getName());
        $data['logo_dashboard'] = $dash->getName();
    }

    if ($login && $login->isValid() && !$login->hasMoved()) {
        $login->move(ROOTPATH . 'public/img/', $login->getName());
        $data['logo_login'] = $login->getName();
    }

    $where = ['id_setting' => 1];
    
    $model->edit2('setting', $data, $where);
    $id_user = session()->get('id');
    $model = new M_model;
    $activityLog = [
        'id_user' => $id_user,
        'activity' => 'Edit Setting',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);

    return redirect()->to('home/setting');
}
	public function log_activity()
{
    $model = new M_model();
    $data['logs'] = $model->getLogs();
    $where = array('id_setting' => '1');
    $data['nah'] = $model->getwhere('setting', $where);
    $id_user = session()->get('id');
    $model = new M_model();
    $activityLog = [
        'id_user' => $id_user,
        'activity' => 'Masuk ke Log Activity',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
    echo view('header',$data);
    echo view('menu', $data);
    echo view('log_activity', $data);
    echo view('footer');
}
public function logout()
{
    $session = session();
    $id_user = session()->get('id');
    $model = new M_model;
    $activityLog = [
        'id_user' => $id_user,
        'activity' => 'Logout',
        'time' => date('Y-m-d H:i:s')
    ];
    $model->logActivity($activityLog);
  

    $session->destroy();
    return redirect()->to('home/login');
}
public function error404()
	{
			$model=new M_model;
			$where = array('id_setting' => 1);
			$data['nah'] = $model->getwhere('setting', $where);
		echo view('header', $data);
		echo view('menu'), $data;
		echo view('404');
		echo view('footer');
	}
	public function user()
	{
		$vira = new M_model(); // Pastikan kelas Vira menggunakan huruf besar untuk konvensi penamaan kelas
        $data['nah'] = $vira->tampil('user');
        
        echo view('header');
        echo view('user', $data);
        echo view('footer');
	}

	public function kalkulator()
	{
		
		$model = new M_model();
		echo view('header');
		echo view('menu');
		echo view('kalkulator');
		echo view('footer');
		
	}
	public function standard()
	{
		
		$model = new M_model();
		echo view('header');
		echo view('menu');
		echo view('standard');
		echo view('footer');
		
	}

	public function login()
	{
		echo view('login');
	}

	public function aksi_login()
	{
	$u=$this->request->getPost('username');
	$p=$this->request->getPost('password');

	$where=array(
		'username'=>$u,
		'password'=>$p,
	);
	$model = new M_model;
	$cek = $model->getWhere('user',$where);

	if ($cek>0) {
		session()->set('nama',$cek->username);
		session()->set('id',$cek->id_user);
		session()->set('level',$cek->level);
		return redirect()->to('home/');
	}else{
		return redirect()->to('home/dash');
	
	}
	}
	public function	dash()
	{
		echo view('header');
		echo view('menu');
		echo view('dash');
		echo view('footer');
		// 	
	}
	public function showRegisterForm()
    {
        return view('register');
    }
	// public function register()
	// {
	// 	$request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect('/login')->with('success', 'Registration successful.');
    // }
	public function profile()
	{
		if(session()->get('level')>''){
			$model = new M_model;
			$where = array('id_setting' => '1');
			$data['nah'] = $model->getwhere('setting', $where);
		$where = array('id_user' => session()->get('id'));
		$data['user'] = $model->getWhere('user', $where);
		echo view('header',$data); 
		echo view('menu',$data); 
		echo view('profile',$data); 
		echo view('footer');
		}else{
			return redirect()->to('home/login');
		}
	}
	public function setting()
	{
		if (session()->get('level') == 'Admin') {
			$model = new M_model();
			$where = array('id_setting' => 1);
			$data['darren2'] = $model->getwhere('setting', $where);
            $id_user = session()->get('id');
            $model = new M_model;
            $activityLog = [
                'id_user' => $id_user,
                'activity' => 'Masuk Menu Setting',
                'time' => date('Y-m-d H:i:s')
            ];
            $model->logActivity($activityLog);
			echo view('header', $data);
			echo view('menu', $data);
			echo view('setting', $data);
			echo view('footer');
		} else {
			return redirect()->to('home/error404');
		}
	}
	public function register()
	{
		$model = new M_model;
	$data['darren'] = $model->tampil('user');
		echo view('header');
		echo view('register');
		echo view('footer');
	}

	public function aksiregister()
{
	$username = $this->request->getPost('username');
	$password = $this->request->getPost('password');
	$email = $this->request->getPost('email');
	
		
	$tabel=array(
		'Username'=>$username,
		'Password'=>$password,
		'Email'=>$email,
		'Level'=>'Admin'

	);

	$model=new M_model;
	$model->tambah('user', $tabel);
	return redirect()->to('home/login');

}
}

