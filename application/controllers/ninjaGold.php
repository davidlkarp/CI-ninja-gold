<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ninjaGold extends CI_Controller {

	public $gold;
	public $energy = 100;

	public function index()
	{
		
		$reset = $this->input->post('reset');
		if($this->input->post('reset'))
		{
			$this->session->unset_userdata('message');
			$this->session->unset_userdata('goldPerm');
			$this->session->unset_userdata('energy');
		}
		$this->load->view('ninjaGold');


	}

	public function farm()
	{
		$energy=$this->session->userdata('energy');
		var_dump($energy);
		if ($energy!==false)
		{
			$BigEnergy = $this->session->userdata('energy');
			$this->session->set_userdata('energy', $BigEnergy -10); //credit to chris
			var_dump($this->session->all_userdata());
		}
		else{
			$this->energy -=10;
			var_dump($this->energy);
			echo "here";
			$this->session->set_userdata('energy', $this->energy);
		}
		if( $this->session->userdata('energy')<= 0)
		{
			$this->session->set_userdata('message', 'You stole ran out of energy' .'<br>' . $this->session->userdata('message'). '<br>' );
			
			$this->session->set_userdata('energy',0);
			redirect('ninjaGold');
			/// object is to keep energy at 0;
		} 
		else
		{
			$this->gold = (rand(10,20));
			$goldPerm = $this->session->userdata('goldPerm');
			$this->session->set_userdata('goldPerm', $goldPerm + $this->gold);
			$this->session->set_userdata('message', 'You stole '.$this->gold.' gold' .'<br>' . $this->session->userdata('message'). '<br>' );
			redirect('ninjaGold');
		}
	}
	public function house()
	{
		$this->energy -=5;
		$this->gold = (rand(5,10));
		$goldPerm = $this->session->userdata('goldPerm');
		$this->session->set_userdata('goldPerm', $goldPerm + $this->gold);
		$this->session->set_userdata('message', 'You stole '.$this->gold.' gold' .'<br>' . $this->session->userdata('message'). '<br>' );
		redirect('ninjaGold');
	}
	public function cave()
	{
		$this->energy -=2;
		$this->gold = (rand(2,5));
		$goldPerm = $this->session->userdata('goldPerm');
		$this->session->set_userdata('goldPerm', $goldPerm + $this->gold);
		$this->session->set_userdata('message', 'You stole '.$this->gold.' gold' .'<br>' . $this->session->userdata('message'). '<br>' );
		redirect('ninjaGold');
	}
	public function casino()
	{
		$this->energy -=20;
		$this->gold = (rand(-50,50));
		$goldPerm = $this->session->userdata('goldPerm');
		$this->session->set_userdata('goldPerm', $goldPerm + $this->gold);
			if($this->gold < 0)
			{
				$this->session->set_userdata('message', 'You lost '.abs($this->gold).' gold' .'<br>' . $this->session->userdata('message'). '<br>' );
			}
			else
			{
				$this->session->set_userdata('message', 'You won '.$this->gold.' gold' .'<br>' . $this->session->userdata('message'). '<br>' );
			}
		redirect('ninjaGold');
	}
}