<?php

class Usuarios extends ActiveRecord{

	public function encriptar($pass){
		return md5($pass);
	}
}