<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" contenteditable="true" class="form-control form-control-user" id="email" name="email" placeholder="Email address.." value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="number" contenteditable="true" class="form-control form-control-user" id="whatsapp" name="whatsapp" placeholder="No Whatsapp" value="<?= set_value('whatsapp'); ?>">
                                <?= form_error('whatsapp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="nim" name="nim" placeholder="Nomor Induk Pegawai">
                                    <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="departemen" name="departemen" placeholder="Departemen">
                                    <?= form_error('departemen', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control" id="plant" name="plant" aria-label="Default select example" style="font-size: 13px;">
                                        <option selected>Select Your Plant</option>
                                        <?php foreach ($plants as $plant) : ?>
                                            <option value="<?php echo $plant['id_plant']; ?>"><?php echo $plant['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('plant', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" id="role_id" name="role_id" aria-label="Default select example" style="font-size: 13px;">
                                        <option selected value="2">User</option>
                                    </select>
                                    <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    // Util function
    function addFormatter(input, formatFn) {
        let oldValue = input.value;

        const handleInput = event => {
            const result = formatFn(input.value, oldValue, event);
            if (typeof result === 'string') {
                input.value = result;
            }

            oldValue = input.value;
        }

        handleInput();
        input.addEventListener("input", handleInput);
    }

    // Example implementation
    // HOF returning regex prefix formatter
    function regexPrefix(regex, prefix) {
        return (newValue, oldValue) => regex.test(newValue) ? newValue : (newValue ? oldValue : prefix);
    }

    // Apply formatter
    const input = document.getElementById('whatsapp');
    addFormatter(input, regexPrefix(/62/, '62'));

    function postWhatsappApi($url, $requestBody) {
        $token = "YBLVkhi82_9QXgMpHfF8";

        $apiEndpoint = "https://api.fonnte.com/".$url;
        $httpHeader = array(
            'Authorization: '.$token
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

    function shortenLink($url) {
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
</script>