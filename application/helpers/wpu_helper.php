<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function login_cek()
{
    $ci = get_instance();
    if (!$ci->session->userdata('id')) {
        redirect('auth');
    }
}


function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function postWhatsappApi($url, $requestBody)
{
    $token = "QUifu8S_AZdvywj5HWvd";

    $apiEndpoint = "https://api.fonnte.com/" . $url;
    $httpHeader = array(
        'Authorization: ' . $token
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiEndpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $requestBody,
        CURLOPT_HTTPHEADER => $httpHeader,
    ));

    $response = curl_exec($curl);

    if ($response === false) {
        log_message('error', curl_error($curl));

        return;
    }

    log_message('info', $response);

    curl_close($curl);

    return $response;
}

function shortenLink($url)
{
    $apiEndpoint = "https://shrtlnk.dev/api/v2/link";
    $httpHeader = array(
        'api-key: kBRzdUNhOGfYNGvEtglrD4JupxjuAp3ilDhSKY17mNMKQ',
        'Accept: application/json',
        'Content-Type: application/json'
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiEndpoint,
        CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_SSL_VERIFYHOST => false,
        // CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
            'url' => $url
        )),
        CURLOPT_HTTPHEADER => $httpHeader,
    ));

    $response = curl_exec($curl);

    if ($response === false) {
        log_message('error', curl_error($curl));

        return;
    }

    log_message('info', $response);

    curl_close($curl);

    return $response;
}
