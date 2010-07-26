<?php
class Extension_IP_to_Location extends Extension {

		public function about() {
			return array(
				'name'			=> 'Data Source: IP to Location',
				'version'		=> '1.0',
				'release-date'	=> '2010-7-26',
				'author'		=> array(
					'name'			=> 'Andrew Shooner',
					'website'		=> 'http://andrewshooner.com'
				),
				'description'	=> 'Adds Location info as a datasource using the ipinfodb.com API.'
			);
		}
	}