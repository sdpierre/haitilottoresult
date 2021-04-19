<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class Webscraping extends Controller
{
    
	private $results = array();
	
	public function scraping(){
		
		$client = new Client();
		$url = "https://m.lotterypost.com/results/ny/";
		$page = $client->request('GET', $url);
		echo $page->filter('.lp-resultsstate-link-gamedetail h2')->text();
		
		$page->filter('.resultsNums li')->each(function($item){
			$this->results[] = $item->text();
		});
		return $this->results;
		
	
	}
}
