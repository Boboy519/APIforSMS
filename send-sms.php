<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $url = ''https://api.twilio.com/2010-04-01/Accounts/ACe147aba4329f21f9f5d3ab62b842dce8/Messages.json'';
    $data = array(
        'from' => '+12705137785',
        'text' => $message,
        'to' => $phone,
        'api_key' => 'ACe147aba4329f21f9f5d3ab62b842dce8:',
        'api_secret' => '3194344d0b014af1c085b898c1fd6d54'
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Check the response from the API and handle accordingly
    if ($response) {
        $responseData = json_decode($response, true);
        if ($responseData['messages'][0]['status'] == 0) {
            // SMS sent successfully
            $result = [
                'status' => 'success',
                'message' => 'SMS sent successfully!'
            ];
        } else {
            // SMS sending failed
            $result = [
                'status' => 'error',
                'message' => 'SMS sending failed. Error: ' . $responseData['messages'][0]['error-text']
            ];
        }
    } else {
        // API request failed
        $result = [
            'status' => 'error',
            'message' => 'Failed to send SMS. Please try again later.'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
