<?php

	require_once(TOOLKIT . '/class.datasource.php');
	
	Class datasourceip_to_location extends Datasource{
		
		public $dsParamROOTELEMENT = 'IP-to-location';
		public $dsParamURL = 'http://ipinfodb.com/ip_query.php?ip=';
		public $dsParamXPATH = '/';
		public $dsParamCACHE = '30';
		public $dsParamTIMEOUT = '6';
		public function __construct(&$parent, $env=NULL, $process_params=true){
			parent::__construct($parent, $env, $process_params);
			$this->_dependencies = array();
			$this->dsParamURL  .= $_SERVER['REMOTE_ADDR'];
		}
		
		public function about(){
			return array(
					 'name' => 'Ipinfodb.com IP Location Info',
					 'author' => array(
							'name' => '',
							'website' => '',
							'email' => 'andrew@andrewshooner.com'),
					 'version' => '1.0',
					 'release-date' => '2010-07-26T12:41:49-07:00');	
		}
		
		public function getSource(){
			return 'dynamic_xml';
		}
		
		public function allowEditorToParse(){
			return true;
		}
		
		public function grab(&$param_pool=NULL){
			$result = new XMLElement($this->dsParamROOTELEMENT);
				
			try{
				include(TOOLKIT . '/data-sources/datasource.dynamic_xml.php');
			}
			catch(FrontendPageNotFoundException $e){
				// Work around. This ensures the 404 page is displayed and
				// is not picked up by the default catch() statement below
				FrontendPageNotFoundExceptionHandler::render($e);
			}			
			catch(Exception $e){
				$result->appendChild(new XMLElement('error', $e->getMessage()));
				return $result;
			}	

			if($this->_force_empty_result) $result = $this->emptyXMLSet();
			return $result;
		}
	}



