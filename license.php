<?php
// license.php
function check_license($license_key)
{
    // Memuat daftar kunci lisensi yang valid
    $valid_license_keys = require 'valid_licenses.php';

    return in_array($license_key, $valid_license_keys);
}
