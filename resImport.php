<?php
/**
 * Resource Import
 */
class resImport
{
	private $list_js = array();
	private $list_css = array();
	private $list_gfont = array();
	private $list_onload = array();
    	
	/**
	 * bundle
	 *
	 * @param  mixed $arr
	 * @return void
	 */
	function bundle($arr = array()){        
		$root = (isset($arr['root']) ? $arr['root'] : '');
		$css = (isset($arr['css']) ? $arr['css'] : '');
		$js = (isset($arr['js']) ? $arr['js'] : '');

		if (is_array($css)) {
			foreach ($css as $file) {
				if ($file != null) {
					array_push($this->list_css, $root . $file);
				}
			}
		} else {
			if ($css != null) {
				array_push($this->list_css, $root . $css);
			}			
		}

		if (is_array($js)) {
			foreach ($js as $file) {
				if ($file != null) {
					array_push($this->list_js, $root . $file);
				}
			}
		} else {
			if ($js != null) {
				array_push($this->list_js, $root . $js);
			}			
		}
	}

	/**
	 * Javascript import
	 * @param  String $url Path for the script
	 * @return none
	 */
	function js($url = false){
		if (!$url) {
			return;
		}
		if (is_array($url)) {
			foreach ($url as $key => $value) {
				array_push($this->list_js, $value);
			}
		}else{
			array_push($this->list_js, $url);
		}		
	}

	/**
	 * css style sheet import
	 * @param  String $url path for the script
	 * @return none
	 */
	function css($url = false){
		if (!$url) {
			return;
		}
		if (is_array($url)) {
			foreach ($url as $key => $value) {
				array_push($this->list_css, $value);
			}
		}else{
			array_push($this->list_css, $url);
		}		
	}

	/**
	 * Google font import
	 * @param  String $font fontname s mentioned in the Google Font website
	 * @return none
	 */
	function gfont($font = false){
		if (!$font) {
			return;
		}
		if (is_array($font)) {
			foreach ($font as $key => $value) {
				array_push($this->list_gfont, str_replace(" ", "+", $value));
			}
		}else{
			array_push($this->list_gfont, str_replace(" ", "+", $font));
		}
	}

	/**
	 * On page load function calls
	 * @param  String $call function name and arguments as string 
	 * @return none
	 */
	function onLoad($call = false){
		if (!$call) {
			return;
		}
		if (is_array($call)) {
			foreach ($call as $key => $value) {
				array_push($this->list_onload, $value);
			}
		}else{
			array_push($this->list_onload, $call);
		}	
	}



	function import(){
		echo "<section data-sect='resImport'>";

			/**
			 * CSS
			 */
			foreach ($this->list_css as $key => $value) {
				?>
					<link rel="stylesheet" type="text/css" href="<?php echo (preg_match('/(http:\/\/)|(https:\/\/)/', ucwords($value)) ? "" : 'http://'.$_SERVER['HTTP_HOST'].'/').$value; ?>">
				<?php
			}

			/**
			 * Google Font
			 */
			foreach ($this->list_gfont as $key => $value) {
				?>
					<link href="https://fonts.googleapis.com/css2?family=<?php echo $value ?>&display=swap" rel="stylesheet">
				<?php
			}

			/**
			 * Javascript
			 */
			foreach ($this->list_js as $key => $value) {
				echo $value;
				?>
					<script type="text/javascript" src="<?php echo (preg_match('/(http:\/\/)|(https:\/\/)/', $value) ? "" : 'http://'.$_SERVER['HTTP_HOST'].'/').$value; ?>"></script>
				<?php
			}

			/**
			 * Javacript on load sect
			 */
			?>
				<script type="text/javascript">
					document.onreadystatechange = function () {
					    if (document.readyState == "interactive") {
							<?php 
								foreach ($this->list_onload as $key => $value) {
									echo $value;
								}
							 ?>
					    }
					}
				</script>
			<?php

		echo "</section>";
	}
}


/*
	Uncomment to initiate class on import
*/
$resImport = new resImport();