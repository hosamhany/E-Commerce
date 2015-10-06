<?php

public function isLoggedIn()
{
	return isset($_SESSION['user']);
}