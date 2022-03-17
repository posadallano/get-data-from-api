<?php

// Add shortcode: [apiwines]
add_shortcode( 'apiwines', 'gdfa_get_data_api' );


// Fetch data from a public API
function gdfa_get_data_api(){
	$url = 'https://api.sampleapis.com/wines/port';
	$response = wp_remote_get($url);

    // If error connecting API, send the error message to the defined error handling and exit function
	if (is_wp_error($response)) {
		error_log("Error: ". $response->get_error_message());
		return false;
	}
	else {

        // Get the body
		$body = wp_remote_retrieve_body($response);
        // Takes the JSON encoded string and converts it into a PHP variable
		$data = json_decode($body);

        // Build the table headers
		$template = '<table class="table-data">
						<tr>
							<th></th>
							<th>Bodega</th>
							<th>Vino</th>
							<th>Calificacion</th>
							<th>País</th>
						</tr>
						{data}
					</table>';

        // If there is some data, loop the array and print fields
		if ( $data ){
			$str = '';
			foreach ($data as $wine) {
				$str .= "<tr>";
				$str .= "<td><img src='{$wine->image}' width='20'/></td>";
				$str .= "<td>{$wine->winery}</td>";
				$str .= "<td>{$wine->wine}</td>";
				$str .= "<td>{$wine->rating->average}</td>";
				$str .= "<td>{$wine->location}</td>";
				$str .= "</tr>";
			}
		}

		$html = str_replace('{data}', $str, $template);
		return $html;
	}
}

?>