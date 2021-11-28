<?php

session_start();

if (isset($_POST['action'])) {
    $actionName = $_POST['action'];
    if (function_exists($actionName)) {
        $actionName();
    }
}


/**
 * Method for login
 */
function login()
{
    $user = findUser($_POST['username']);

    if (empty($user)) {
        redirect('User not exist', 'addUser');
    }

    if (!password_verify($_POST['password'], $user[4])) {
        redirect('Password not valid');
    }

    $_SESSION['registered_user'] = $_POST['username'];

    redirect('Login success');
}

/**
 * Method for register new user
 */
function register()
{
    $data = $_POST['data'];

    $user = findUser($data['firstname']);

    if (!empty($user)) {
        redirect('User exist!', 'addUser');
    }

    if ($data['password'] !== $data['password_confirm']) {
        redirect('Password and password confirm not equals!');
    }

    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    unset($data['password_confirm']);

    saveUserIntoFile($data)
        ? redirect('User registered with success')
        : redirect('User registered with error');
}

/**
 * Method for logout
 */
function logout()
{
    unset($_SESSION['registered_user']);
    redirect();
}

/**
 * Redirect to
 * @param string message Message content
 * @param string page Page to redirect. default return back;
 */
function redirect($message = '', $page = null)
{
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    }
    header('Location: ' . ($page ? "{$page}.php" : $_SERVER['HTTP_REFERER']));
    die();
}

/**
 * Save new line into file
 * 
 * @param array userData
 */
function saveUserIntoFile(array $userData)
{
    try {
        $file = fopen("users.txt", "a+") or redirect("Unable to open file!");
        $dataStr = str_put($userData);
        fwrite($file, $dataStr);
        fclose($file);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

/**
 * @param array fields 
 * @param string delimiter
 * @param string enclosure
 * @param string escape_char
 * @return string Content line
 */
function str_put(array $fields, $delimiter = ';', $enclosure = '"', $escape_char = '\\')
{
    foreach ($fields as &$field) {
        $field = str_replace($enclosure, $escape_char . $enclosure, $field);
        $field = $enclosure . $field . $enclosure;
    }
    return implode($delimiter, $fields) . "\n";
}

/**
 * @param string delimiter 
 * @param string enclosure
 * @return array of Users [
 *  0 => firstname,
 *  1 => lastname,
 *  2 => email,
 *  3 => phone,
 *  4 => password,
 *  5 => gender,
 *  6 => birthday,
 *  7 => country
 * ] 
 */
function getUsers($delimiter = ';', $enclosure = '"')
{
    $handle = fopen("users.txt", "r");
    $users = [];
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $line = str_replace(array("\n\r", "\n", "\r"), '', $line);
            $user = explode($delimiter, $line);
            $user = array_map(function ($item) use ($enclosure) {
                return trim($item, $enclosure);
            }, $user);
            $users[] = $user;
        }

        fclose($handle);
    }
    return $users;
}

/**
 * Find user by Username
 * @param string userName Username
 * @return array|null
 */
function findUser($userName)
{
    $users = getUsers();
    $user = array_filter($users, function ($item) use ($userName) {
        return strtolower($item[0]) === strtolower($userName);
    });
    return array_pop($user);
}
